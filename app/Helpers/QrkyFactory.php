<?php

namespace App\Helpers;

use QrCode;
use Hashids\Hashids;
use App\Qrky;
use Auth;

class QrkyFactory {
    
    private static $PREVIEW_SIZE = 300;
    private static $FULL_SIZE = 700;

    public static function create($name, $content, $content_type, $desc, $loc) {
        $user = Auth::user();

        $qrc = Qrky::create([
            'id' => random_hash(),
            'name' => $name,
            'content' => $content,
            'content_type' => $content_type,
            'status' => 0,
            'description' => $desc,
            'location' => $loc,
            'owner_id' => $user->id
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
    public static function random_hash() {
        $hashids = new Hashids('', 5);
        return $hashids->encode(time());
    }
}