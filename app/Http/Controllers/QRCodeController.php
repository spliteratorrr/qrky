<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qrky;
use App\Group;
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

    /**
     * Manage ungrouped QRCs view.
     */
    public function manage_qrcs_ug(Request $req) {
        $user = auth()->user();
        $uid = $user->id;
        // Retrieve QRCs owned by the user
        $qrcs = Qrky::where('owner_id', $uid)->get();

        return view('manage_qrc_ug', [
            'ug_qr_count' => 1,
            'g_grp_count' => 1,
            'g_qr_count' => 2,
            'qrcs' => [
                [
                    'name' => 'Guidance Feedback Form', 
                    'status' => 'Deployed',
                    'id' => QrkyUtils::get_hash(), 
                    'type' => 'Static',
                    'content' => 'The content is real.', 
                    'loc' => '11F, RM1106', 
                    'desc' => 'Allows routine interviewees to instantly access the guidance feedback form after their interview.',
                    'preview' => QrkyUtils::get_static_code(true, 'ewew31'),
                    'c_date' => '-',
                    'm_date' => 'oof',
                    'd_date' => 'd'
                ]
            ],
            'grps' => [
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ]
            ]
        ]);
    }

    /**
     * Manage grouped QRCs view.
     */
    public function manage_qrcs_g(Request $request) {
        $join_code = $request->id;

        // Retrieve QRCs within this group.
        $gid = Group::where('join_code', $join_code)->first();
        $qrcs = Qrky::where('group_id', $gid)->get();
        
        return view('manage_qrc_g', [
            'qrcs' => []
        ]);
    }

    public function manage_grps() {
        return view('manage_grp', [
            'grps' => [
                [
                    'name' => 'Guidance Office',
                    'id' => '1',
                    'desc' => 'A group dedicated for guidance office faculty members.'
                ]
            ]
        ]);
    }

    /**
     * Generates a QR code preview.
     */
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
