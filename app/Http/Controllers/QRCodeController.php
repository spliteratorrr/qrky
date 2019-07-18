<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use QrkyUtils;

class QRCodeController extends Controller
{
    public function show() {
        return QrkyUtils::get_qrky_code();
    }

    public function create() {
        return view('create', [
            'qrc' => QrkyUtils::get_qrky_code()
        ]);
    }

    public function preview(Request $request) {
        $type = $request->input('cType');
        $content = $request->input('c');
        $qrc = NULL;

        switch($type) {

            // Static
            case 0:
                $qrc = QrkyUtils::get_static_code(true, $content);
                break;

            // Dynamic
            case 1:
                $qrc = QrkyUtils::get_dynamic_code(true, $content);
                break;

            // Portal
            case 2:
                $qrc = QrkyUtils::get_static_code(true, $content);
                break;
        }
        
        
        return base64_encode($qrc);
    }
}
