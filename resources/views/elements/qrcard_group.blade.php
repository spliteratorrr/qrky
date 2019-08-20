@php
    $qr_id = $qrc['id'];
    $qr_name = $qrc['name'];
@endphp

<div id="modal-grp-{{ $qr_id }}" class="uk-modal" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">
        <div class="uk-modal-header">
            <h2 class="uk-modal-title uk-text-truncate">
                <i class="fas fa-layer-group"></i> Assign Group
            </h2>
        </div>

        <div class="uk-modal-body">
            <p>Assign <span class="qrky-sec">{{ $qr_name }}</span> to a group. This QR code would be shared among the members of that group. It would also be relocated to the group's QR codes tab.</p>
            <div class="uk-text-meta uk-text-uppercase" style="margin-bottom: 12px;">
                <i class="fas fa-layer-group"></i> Available groups: 
            </div>
            <div class="uk-overflow-auto uk-height-small">
                <ul class="uk-list">
                @for($i = 0; $i < 7; $i++)
                    <li>
                        <label>
                            <input class="uk-radio" type="radio" name="jpcs"> Junior Philippine Computer Society
                        </label>
                    </li>
                @endfor
                </ul>
            </div>
        </div>

        <div class="uk-modal-footer">
            <div class="uk-float-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button" target="{{ $qr_id }}">
                <i class="fas fa-times"></i> 
                <span class="uk-visible@s">Cancel</span>
            </button>
            <button class="uk-button uk-button-secondary assign-btn" type="button" target="{{ $qr_id }}">
                <i class="fas fa-layer-group"></i> 
                <span class="uk-visible@s">Assign</span>
            </button>
            </div>
        </div>
    </div>
</div>