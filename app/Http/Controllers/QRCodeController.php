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
            'qrc' => QrkyUtils::get_static_code(true, 'Preview')
        ]);
    }

    public function manage() {

        return view('manage', [
            'qrcs' => [
                [
                    'name' => 'Oof', 
                    'status' => 'Deployed',
                    'id' => QrkyUtils::get_hash(), 
                    'type' => 'Static', 
                    'loc' => '11F, RM1106', 
                    'desc' => 'Oofsie',
                    'preview' => QrkyUtils::get_static_code(true, 'ewew31')
                ],
                [
                    'name' => 'Jobert',
                    'status' => 'Deployed',
                    'id' => 'fkeose', 
                    'type' => 'Static', 
                    'loc' => '11F, RM1106', 
                    'desc' => 'Oofsie',
                    'preview' => QrkyUtils::get_static_code(true, 'fkeose')
                ],
                [
                    'name' => 'Mekomeko',
                    'status' => 'Deployed',
                    'id' => 'wieuad', 
                    'type' => 'Static', 
                    'loc' => '11F, RM1106', 
                    'desc' => 'Oofsie',
                    'preview' => QrkyUtils::get_static_code(true, 'wieuad')
                ]
            ]
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
