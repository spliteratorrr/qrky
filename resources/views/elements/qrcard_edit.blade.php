<div id="modal-{{$qrc['id']}}" class="uk-modal-container" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">

        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><i class="fas fa-qrcode"></i> Edit QR Code...</h2>
        </div>

        <div class="uk-modal-body">
            <div class="uk-flex" uk-grid>
                <div class="uk-width-expand@m" >
                    <!-- Info panel -->
                    <div class="uk-card uk-card-default qrky-border">
                        <div class="uk-card-body">
                            <h4 class="uk-text-center">QR Code Information</h4>
                            <form>
                            <ul class="uk-list">
                                <!-- Name -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-tag"></i> Name
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <input
                                            class="qrky-form qrky-edit-field uk-input uk-form-medium"
                                            type="text"
                                            placeholder="Who is this QR code?"
                                            value="{{$qrc['name']}}">
                                    </p>
                                </li>
                                
                                <!-- Content type -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-dna"></i> Content Type 
                                        <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Content type determines the visual style of the QR code.; pos: right;"></i>
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <select
                                            class="qrky-form qrky-edit-field uk-select"
                                            id="form-stacked-select">
                                                <option>Plaintext</option>
                                                <option>URL Redirect</option>
                                        </select>
                                    </p>
                                </li>

                                <!-- Content -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase"><i class="fas fa-box-open"></i> Content</span>
                                    <p class="uk-margin-remove-top">
                                        <textarea 
                                            class="qrky-form qrky-edit-field uk-textarea"
                                            id="form-stacked-area"
                                            rows="2"
                                            placeholder="What does this QR code contain?">{{$qrc['content']}}</textarea>
                                    </p>
                                </li>
                                
                                <!-- Description -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-quote-right"></i> Description
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <textarea class="qrky-form qrky-edit-field uk-textarea" id="form-stacked-area" rows="1" placeholder="What is this QR code for?">{{$qrc['desc']}}</textarea>
                                    </p>
                                </li>
                                
                                <!-- Location -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-map-marked-alt"></i> Location
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <input class="qrky-form qrky-edit-field uk-input uk-form-medium" placeholder="Where is this QR code?" type="text" value="{{$qrc['loc']}}">
                                    </p>
                                </li>

                                <!-- Deployment Status -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-sign"></i> Deployment Date
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <input class="qrky-form qrky-edit-field uk-input uk-form-medium" name="dep" type="text" readonly>
                                    </p>
                                </li>

                            </ul>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preview panel -->
                <div class="uk-width-1-5@m uk-flex-first">
                    <div class="uk-card uk-card-default qrky-border uk-align-center uk-height-1-1" style="min-width: 200px; padding-top: 30px; padding-bottom: 1px;">    
                        <h4 class="uk-text-center">
                            <span class="uk-visible@m">Preview</span>
                            <span class="uk-hidden@l">{{$qrc['name']}}</span>
                        </h4>
                        <p class="uk-text-center uk-margin-remove">
                            <span class="uk-text-small" style="color: #D4AF37;"><i class="fas fa-crown"></i> jarivera</span><br>
                        </p>
                        <img id="preview" class="uk-align-center" src="data:image/png;base64, {!! base64_encode($qrc['preview']) !!}" style="max-width: 170px; margin-top: 8px; margin-bottom: 6px;" uk-img>
                        <p class="uk-text-center uk-margin-remove">
                            <i class="fas fa-flag uk-text-success"></i> <span class="uk-text-small uk-text-success">{{$qrc['status']}}</span><br>
                            <i class="fas fa-hashtag" style="color: #9F6DA6;"></i><code style="color: #9F6DA6;">{{$qrc['id']}}</code>
                        </p>
                        <hr>
                        <p class="uk-text-center">
                            <span class="uk-text-center">Scan Information</span>
                            <span class="uk-text-small uk-text-muted"> 
                                <br>Total scans: -
                                <br>Unique scans: -
                            </span>
                        </p>
                        <hr>
                        <p class="uk-text-center">
                            <span class="uk-text-center">Date Information</span><br>
                            <span class="uk-text-small uk-text-muted"><i class="fas fa-edit"></i> {{ $qrc['m_date'] }} <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Last modified date of this QRC.; pos: right;"></i></span><br>
                            <span class="uk-text-small uk-text-muted"><i class="fas fa-star"></i> {{ $qrc['c_date'] }} <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Creation date of this QRC.; pos: right;"></i></span><br>
                            <span class="uk-text-small uk-text-muted" uk-tooltip="title: Deployment time.; pos: right;"><i class="fas fa-sign"></i> {{ $qrc['d_date'] }} <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Deployment date of this QRC.; pos: right;"></i></span>
                        </p>
                    </div>
                </div>
            </div>  
        </div>

        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-secondary" type="button">Save</button>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(function() {
            $('input[name="dep"]').daterangepicker({
                opens: 'center',
                drops: 'up',
                autoApply: true,
                timePicker: true,
                singleDatePicker: true,
                showDropdowns: false,
                buttonClasses: 'uk-button uk-button-default uk-button-small',
                applyButtonClasses: 'uk-button-secondary',
                locale: {
                    format: 'MMM DD, YYYY; hh:mm A'
                }
            }, function(start, end, label) {
            });
            });
    </script>
@endsection