<?php

namespace App\Helpers;

use QrCode;
use Hashids\Hashids;
use App\Qrky;
use Auth;

class QrkyFactory {

    public static function create($name, $content, $content_type, $desc, $loc) {
        $user = Auth::user();

        $qrc = Qrky::create([
            'id' => random_hash(),
            'name' => $name,
            'content' => $content,
            'content_type' => $content_type,
            'description' => $desc,
            'location' => $loc,
            'owner_id' => $user->id
        ]);
    }

    /**
     * Generate a random unique hash ID based on the time
     */
    public static function random_hash() {
        $hashids = new Hashids('', 5);
        return $hashids->encode(time() - time() / 2);
    }
}