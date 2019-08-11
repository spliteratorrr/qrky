<?php

namespace App\Helpers;

use QrCode;
use Hashids\Hashids;
use App\Qrky;
use Auth;

class QrkyFactory {
    
    private static $PREVIEW_SIZE = 300;
    private static $FULL_SIZE = 700;

    public static function create($name, $content, $content_type, $desc, $loc, $d_date) {
        $user = Auth::user();
        $id = self::random_hash($user->username);
        $owner_id = $user->id;

        $qrc = Qrky::create([
            'id' => $id,
            'name' => $name,
            'content' => $content,
            'content_type' => $content_type,
            'status' => 0,
            'description' => $desc,
            'location' => $loc,
            'owner_id' => $owner_id,
            'deployed_at' =>  $d_date,
            'total_scans'
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
     * Generate a random unique hash ID based on the time
     */
    public static function random_hash($username) {
        $hashids = new Hashids($username, 5);
        return $hashids->encode(time());
    }
}