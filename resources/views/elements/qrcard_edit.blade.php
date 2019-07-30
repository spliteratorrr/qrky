<div id="modal-{{$qrc['id']}}" class="uk-modal-container" uk-modal="bg-close: false;">
    <div class="uk-modal-dialog qrky-border">

        <div class="uk-modal-header">
            <h2 class="uk-modal-title"><i class="fas fa-qrcode"></i> Edit QR Code...</h2>
        </div>

        <div class="uk-modal-body">
            <div class="uk-flex" uk-grid>
                <div class="uk-width-expand@m">
                    <!-- Info panel -->
                    <div class="uk-card uk-card-default qrky-border">
                        <div class="uk-card-body">
                            <h4 class="uk-text-center">QR Code Information</h4>
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
                                            placeholder="Name of this QR code..."
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
                                            placeholder="Actual content of this QR code..."></textarea>
                                    </p>
                                </li>
                                
                                <!-- Description -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-quote-right"></i> Description
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <textarea class="qrky-form qrky-edit-field uk-textarea" id="form-stacked-area" rows="1" placeholder="Description of this QR code...">{{$qrc['desc']}}</textarea>
                                    </p>
                                </li>
                                
                                <!-- Location -->
                                <li>
                                    <span class="uk-text-meta uk-text-uppercase">
                                        <i class="fas fa-map-marked-alt"></i> Location
                                    </span>
                                    <p class="uk-margin-remove-top">
                                        <input class="qrky-form qrky-edit-field uk-input uk-form-medium" type="text" value="{{$qrc['loc']}}">
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Preview panel -->
                <div class="uk-width-1-5@m uk-flex-first">
                    <div class="uk-card uk-card-default qrky-border" style="min-width: 200px; padding-top: 30px; padding-bottom: 1px;" class="uk-align-center">    
                        <h4 class="uk-text-center">
                            <span class="uk-visible@m">Preview</span>
                            <span class="uk-hidden@l">{{$qrc['name']}}</span>
                        </h4>
                        <p class="uk-text-center uk-margin-remove">
                            <span class="uk-text-small" style="color: #D4AF37;"><i class="fas fa-crown"></i> jarivera</span><br>
                        </p>
                        <img id="preview" class="uk-align-center" src="data:image/png;base64, {!! base64_encode($qrc['preview']) !!}" style="max-width: 170px; margin-top: 8px; margin-bottom: 6px;" uk-img>
                        <p class="uk-text-center uk-margin-remove">
                            <i class="fas fa-hashtag"></i><code style="color: #9F6DA6;">{{$qrc['id']}}</code>
                        </p>
                        <hr>
                        <p class="uk-text-center uk-text-muted">
                            <span class="uk-text-center"><i class="fas fa-clock" style="font-size: 24px"></i></span><br>
                            <span class="uk-text-small"><i class="fas fa-star"></i>  07/06/19, 10:00AM <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Creation time.; pos: right;"></i></span><br>
                            <span class="uk-text-small" uk-tooltip="title: Deployment time.; pos: right;"><i class="fas fa-sign"></i> 07/06/19, 10:00AM <i class="far fa-question-circle qrky-icon" uk-tooltip="title: Deployment time.; pos: right;"></i></span>
                        </p>
                        <p class="uk-text-center">
                            <span class="uk-text-muted uk-text-small"> <i class="fas fa-eye" style="font-size: 24px"></i>
                                <br>Total scans: -
                                <br>Unique scans: -
                            </span>
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