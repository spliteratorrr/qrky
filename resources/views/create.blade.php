@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <!-- Grid -->
        <div class="uk-grid uk-grid-medium uk-flex uk-flex-center" data-uk-grid>
            <div class="uk-width-1-1@l">
                
                <div class="uk-card uk-card-default uk-card-small" style="border-top: 3px solid #9F6DA6;">
                    <!-- Card header -->
                    <div class="uk-card-header">
                        <div class="uk-grid uk-grid-small">
                            
                            <div class="uk-width-auto">
                                <h4>Create a new QR code...</h4>
                            </div>
                            <div class="uk-width-expand uk-text-right">
                                <i class="fas fa-qrcode"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="uk-card-body">
                        <div class="uk-column-1-2@l uk-column-divider">
                            <div>
                                <form id="generator" class="uk-form-stacked">
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Name</label>
                                        <div class="uk-form-controls">
                                            <input class="qrky-form uk-input" id="form-stacked-text" type="text" placeholder="Tracking name...">
                                        </div>
                                    </div>
                                        
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-select">Content Type</label>
                                        <div class="uk-form-controls">
                                            <select class="qrky-form uk-select" id="form-stacked-select">
                                                <option>Static</option>
                                                <option>Dynamic</option>
                                                <option>Portal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-area">Content</label>
                                        <div class="uk-form-controls">
                                            <textarea class="qrky-form uk-textarea" id="form-stacked-area" rows="5" placeholder="What will this QR code contain?"></textarea>
                                        </div>
                                    </div>
                                        
                                    <div class="uk-margin">
                                        <button type="submit" class="uk-button uk-button-default">Generate</button>
                                        <button class="uk-button uk-button-default">Save for Printing</button>
                                    </div>
                                </form>
                            <div>
                                <h5 class="uk-text-center">Preview</h5>
                                <img id="preview" src="data:image/png;base64, {!! base64_encode($qrc) !!}" class="uk-align-center" uk-img>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>

        $("#generator").submit(function(e) {

        e.preventDefault();
        
        var contentType = $('#form-stacked-select').prop('selectedIndex');
        var content = $('#form-stacked-area').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/preview",
            data: { cType: contentType, c: content},
            success: function(data) {
                $('#preview').prop('src', 'data:image/png;base64, ' + data);
            }
            });
        });
        
    </script>
@endsection