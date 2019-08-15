<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Qrky;
use App\Group;
use QrkyUtils;
use QrkyFactory;

class QRCodeController extends Controller
{
    public function show() {
        return QrkyUtils::get_qrky_code();
    }

    /**
     * Manage ungrouped QRCs view.
     */
    public function manage_qrcs_ug(Request $req) {
        $user = auth()->user();
        $uid = $user->id;

        // Retrieve QRCs owned by the user
        $qrcs = Qrky::where('owner_id', $uid)->get();

        $qrcs_data = array();
        foreach($qrcs as $qrc) {
            array_push($qrcs_data, QrkyFactory::retrieve($uid, $qrc));
        }

        // Calculate count
        $ug_qr_count = sizeof($qrcs_data);
        $g_grp_count = 0;
        $g_qr_count = 0;

        return view('manage_qrc_ug', [
            'ug_qr_count' => $ug_qr_count,
            'g_grp_count' => $g_grp_count,
            'g_qr_count' => $g_qr_count,
            'qrcs' => $qrcs_data,
            'grps' => [
                [
                    'name' => 'Guidance Office',
                    'qr_count' => 5
                ],
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

    public function qrc_preview(Request $request) {
        $id = $request->input('id');
        $qrc = QrkyFactory::preview($id);
        return base64_encode($qrc);
    }

    public function qrc_create(Request $request) {
        $name = $request->input('name');
        $content = $request->input('content');
        $content_type = $request->input('contentType');
        $desc = $request->input('desc');
        $loc = $request->input('loc');
        $deploy_date = $request->input('deployDate');

        // Creates the QR code
        $id = QrkyFactory::create(
            $name,
            $content,
            $content_type,
            $desc,
            $loc,
            $deploy_date
        );
    }
}
