<?php

namespace App\Helpers;

use QrCode;
use Hashids\Hashids;

class QrkyUtils
{

    // QRC Sizes
    private static $PREVIEW_SIZE = 300;
    private static $FULL_SIZE = 700;

    public static function get_qrky_code() {
        return self::make_qrky_code(self::get_hash());
    }

    public static function get_static_code($preview, $content) {
        return self::make_static_code($preview, $content);
    }

    public static function get_dynamic_code($preview, $content) {
        return self::make_dynamic_code($preview, $content);
    }
    
    /**
     * Generate a dynamic qrky code with an ID param
     */
    private static function make_qrky_code($id) {
        $url = env("APP_URL", "https://qrky.apc.edu.ph");
        return QrCode::format('png')->size(300)->margin(0)->color(55, 90, 145)->generate($url . '/' . $id);
    }

    /**
     * Generate a static qrky code with content param
     */
    private static function make_static_code($preview, $content) {
        $size = $preview ? self::$PREVIEW_SIZE : self::$FULL_SIZE;
        return QrCode::format('png')->size($size)->margin(0)->generate($content);
    }

    /**
     * Generate a static qrky code with content param
     */
    private static function make_dynamic_code($preview, $content) {
        $size = $preview ? self::$PREVIEW_SIZE : self::$FULL_SIZE;
        return QrCode::format('png')->size($size)->margin(0)->color(55, 90, 145)->generate($content);
    }

    /**
     * Generate a unique hash ID
     */
    public static function get_hash() {
        $hashids = new Hashids('', 5);
        return $hashids->encode(time());
    }
}