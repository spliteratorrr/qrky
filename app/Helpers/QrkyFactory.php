<?php

namespace App\Helpers;

use QrCode;
use Hashids\Hashids;
use App\Qrky;
use App\User;
use Auth;

class QrkyFactory {
    
    private static $PREVIEW_SIZE = 300;
    private static $FULL_SIZE = 700;

    private static $types = [
        'Plaintext',
        'URL Redirect'
    ];

    private static $statuses = [
        'Not Deployed',
        'Deployed'
    ];

    private static $status_styles = [
        'uk-text-danger',
        'uk-text-success'
    ];

    public static function create($name, $content, $content_type, $desc, $loc, $d_date) {
        $user = Auth::user();
        $id = self::random_hash($user->username);
        $owner_id = $user->id;

        if (empty($d_date))
            $d_date = NULL;
            
        $qrc = Qrky::create([
            'id' => $id,
            'name' => $name,
            'content' => $content,
            'content_type' => $content_type,
            'status' => 0,
            'description' => $desc,
            'location' => $loc,
            'owner_id' => $owner_id,
            'deployed_at' =>  $d_date
        ]);
    }

    /**
     * Generates a preview image of the QR code; provided the hash ID.
     */
    public static function preview($id) {
        $url = env("APP_URL", "https://qrky.apc.edu.ph");
        $content = $url . '/' . $id;
        return QrCode::format('png')->size(self::$PREVIEW_SIZE)->margin(0)->generate($content);
    }
    
    /**
     * Generate a random unique hash ID based on the timestamp and username.
     */
    public static function random_hash($username) {
        $hashids = new Hashids($username, 5);
        return $hashids->encode(time());
    }

    public static function format($date) {
        if (!is_null($date)) {
            $date = date_create($date);
            return date_format($date, 'M d, Y; h:i A');
        }
        return '';
    }

    public static function get_type($type) {
        return self::$types[$type];
    }

    public static function get_status($status) {
        return self::$statuses[$status];
    }

    public static function get_status_style($status) {
        return self::$status_styles[$status];
    }

    /**
     * Retrieves data from a Qrky model.
     */
    public static function retrieve($uid, $qrc) {
        $qd = array();

        // Retrieve ID and preview
        $id = $qrc['id'];
        $qd['id'] = $id;
        $qd['preview'] = self::preview($id);

        // Retrieve owner
        $qd['owner'] = User::where('id', $uid)->first()['username'];
            
        // Retrieve other attributes
        $qd['name'] = $qrc['name'];
        $qd['content'] = $qrc['content'];
        $qd['loc'] = $qrc['location'];
        $qd['desc'] = $qrc['description'];
        
        $qd['u_scans'] = $qrc['unique_scans'];
        $qd['t_scans'] = $qrc['total_scans'];

        $qd['c_date'] = self::format($qrc['created_at']);
        $qd['m_date'] = self::format($qrc['updated_at']);
        $qd['d_date'] = self::format($qrc['deployed_at']);

        // Calculate status
        $status = $qrc['status'];
        $type = $qrc['content_type'];
        $qd['type'] = self::get_type($type);
        $qd['status'] = self::get_status($status);
        $qd['status_class'] = self::get_status_style($status);

        return $qd;
    }
}