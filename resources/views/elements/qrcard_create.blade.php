@php
    $qr_id = QrkyFactory::random_hash();
    $qr_owner = Auth::user()->username;
    $qr_name = NULL;
    $qr_content = NULL;
    $qr_desc = NULL;
    $qr_status = 'Not Deployed';
    $qr_loc = NULL;
    $qr_preview = QrkyFactory::preview($qr_id);

    $qr_u_scans = 0;
    $qr_t_scans = 0;
    $qr_m_date = 'No data';
    $qr_c_date = 'No data';
    $qr_d_date = 'No data';       
@endphp

<div id="modal-create" class="uk-modal-container" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">
        
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

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close cancel-btn" type="button" target="{{ $qr_id }}">Cancel</button>
            <button class="uk-button uk-button-secondary" type="button" target="{{ $qr_id }}">Create</button>
        </div>
    </div>
</div>

@section('scripts')
@parent
    <script type="text/javascript" src="{{ asset('js/qrcard_create.js') }}"></script>
    <script>
        //var deployDate = 'Jun 12, 2019; 12:10 PM';
        var deployDate = '{{ $qr_d_date }}';
        var ModalCreate = new ModalCreate(deployDate);
    </script>
    
@endsection