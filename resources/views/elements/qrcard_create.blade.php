@php
    $qr_name = NULL;
    $qr_content = NULL;
    $qr_desc = NULL;
    $qr_status = 'Not Deployed';
    $qr_status_class = 'uk-text-danger';
    $qr_loc = NULL;

    $qr_u_scans = 0;
    $qr_t_scans = 0;
    $qr_m_date = 'No data';
    $qr_c_date = 'No data';
    $qr_d_date = '';
    $form_name = 'create';
    $dep_name = 'create-dep';

    $edit_mode = false;
@endphp

<div id="modal-create" class="uk-width-auto" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">
        <form id="form-{{ $form_name }}">
            <div class="uk-modal-header">
                <h2 class="uk-modal-title"><i class="fas fa-qrcode"></i> Create new QR Code...</h2>
            </div>

            <div class="uk-modal-body">
                <div class="uk-flex" uk-grid>
                    <div class="uk-width-expand@m">
                        @include('elements.qrcard_modal_panel')
                    </div>
                </div>
            </div>

            <div class="uk-modal-footer uk-text-center">
                <button class="uk-button uk-button-default uk-modal-close cancel-create-btn" type="button"><i class="fas fa-times"></i> Cancel</button>
                <button class="uk-button uk-button-secondary create-btn" type="submit"><i class="far fa-star"></i> Create this QR code</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
@parent
    <script type="text/javascript" src="{{ asset('js/qrcard_create.js') }}"></script>    
@endsection