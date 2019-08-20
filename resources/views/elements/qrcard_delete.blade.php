@php
    $qr_id = $qrc['id'];
    $qr_name = $qrc['name'];
@endphp

<div id="modal-del-{{ $qr_id }}" class="uk-modal" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">
        <div class="uk-modal-header">
            <h2 class="uk-modal-title uk-text-truncate">
                <i class="fas fa-trash-alt uk-text-danger"></i> Delete QR Code
            </h2>
        </div>

        <div class="uk-modal-body">
            <p>Are you sure you want to delete <span class="uk-text-danger">{{ $qr_name }}</span> ?</p>
        </div>

        <div class="uk-modal-footer">
            <div class="uk-float-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button" target="{{ $qr_id }}">
                <i class="fas fa-times"></i> 
                <span class="uk-visible@s">Cancel</span>
            </button>
            <button class="uk-button uk-button-danger delete-btn" type="button" target="{{ $qr_id }}">
                <i class="fas fa-trash-alt"></i> 
                <span class="uk-visible@s">Delete</span>
            </button>
            </div>
        </div>
    </div>
</div>