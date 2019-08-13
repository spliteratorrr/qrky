<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $qd = array();

            // Retrieve ID and preview
            $id = $qrc['id'];
            $qd['id'] = $id;
            $qd['preview'] = QrkyFactory::preview($id);

            // Retrieve owner
            $qd['owner'] = User::where('owner_id', $uid)['username'];
            
            // Retrieve other attributes
            $qd['name'] = $qrc['name'];
            $qd['content'] = $qrc['content'];
            $qd['type'] = $qrc['content_type'];
            $qd['loc'] = $qrc['location'];
            $qd['desc'] = $qrc['description'];
            $qd['u_scans'] = $qrc['unique_scans'];
            $qd['t_scans'] = $qrc['total_scans'];
            $qd['c_date'] = $qrc['created_at'];
            $qd['u_date'] = $qrc['updated_at'];
            $qd['d_date'] = $qrc['deployed_at'];

            // Calculate status
            $status = $qrc_status;
            $qd['status'] = $status;
            $qd['status_class'] = $status == 0 ? 'uk-text-danger' : 'uk-text-success';

            array_push($qd, $qrcs_data);
        }
        
        // Calculate count
        $ug_qr_count = sizeof($qrcs_data);
        $g_grp_count = 0;
        $g_qr_count = 0;

        return view('manage_qrc_ug', [
            'ug_qr_count' => $ug_qr_count,
            'g_grp_count' => $g_grp_count,
            'g_qr_count' => $g_qr_count,
            'qrcs' => [
                [
                    'name' => 'Guidance Feedback Form', 
                    'status' => 'Not Deployed',
                    'status_class' => 'uk-text-danger',
                    'owner' => 'walbert',
                    'id' => QrkyUtils::get_hash(), 
                    'type' => 'Static',
                    'content' => 'The content is real.', 
                    'loc' => '11F, RM1106', 
                    'desc' => 'Allows routine interviewees to instantly access the guidance feedback form after their interview.',
                    'preview' => QrkyUtils::get_static_code(true, 'ewew31'),
                    'u_scans' => '13232323',
                    't_scans' => '2323232',
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
