@php
    $qr_id = $qrc['id'];
    $qr_owner = $qrc['owner'];
    $qr_name = $qrc['name'];
    $qr_content = $qrc['content'];
    $qr_c_type = $qrc['c_type'];

    $qr_desc = $qrc['desc'];
    $qr_status = $qrc['status'];
    $qr_status_class = $qrc['status_class'];
    $qr_loc = $qrc['loc'];
    $qr_preview = $qrc['preview'];

    $qr_u_scans = $qrc['u_scans'];
    $qr_t_scans = $qrc['t_scans'];
    $qr_m_date = $qrc['m_date'];
    $qr_c_date = $qrc['c_date'];
    $qr_d_date = $qrc['d_date'];
    $form_name = $qr_id;
    $dep_name = 'edit-dep';
    
    $edit_mode = true;
@endphp

<div id="modal-{{ $qr_id }}" class="uk-modal-container" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">
        <form id="form-{{ $form_name }}">
            <div class="uk-modal-header">
                <h2 class="uk-modal-title uk-text-center uk-text-truncate">
                    <i class="fas fa-pencil-alt qrky-icon"></i>
                    <span class="qrky-icon">...</span> {{ $qr_name }} </h2>
            </div>

            <div class="uk-modal-body">
                <div class="uk-flex" uk-grid>
                    <div class="uk-width-expand@m">
                        @include('elements.qrcard_modal_panel')
                    </div>
                </div>  
            </div>

            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close cancel-btn" type="button" target="{{ $qr_id }}">
                    <i class="fas fa-times"></i> 
                    <span class="uk-visible@s">Cancel</span>
                </button>
                <button class="uk-button uk-button-primary print-btn" type="button" target="{{ $qr_id }}">
                    <i class="far fa-file-image"></i> 
                    <span class="uk-visible@s">Get printable</span>
                </button>
                <button class="uk-button uk-button-secondary save-btn" type="button" target="{{ $qr_id }}">
                    <i class="far fa-save"></i> 
                    <span class="uk-visible@s">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>