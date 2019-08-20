<div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-small qrky-border">
            <div class="uk-card-body">
                <div class="uk-grid uk-grid-small"> 
                    <div class="uk-width-auto">
                        <h4>{{$qrc['name']}}</h4>
                    </div>
                    
                    <div class="uk-card-badge uk-margin-remove uk-label qrky-bg uk-visible@s" style="text-transform: none;">
                        <i class="fas fa-hashtag"></i>{{$qrc['id']}}
                    </div>
                </div>
                <p class="uk-text-meta uk-margin-remove-top">
                    [ <i class="fas fa-sign"></i> {{$qrc['status']}},
                    <i class="fas fa-dna"></i> {{$qrc['type']}},
                    <i class="fas fa-map-marked-alt"></i> {{$qrc['loc']}} ]
                </p>
                
                <p>{{$qrc['desc']}}</p>
            </div>

            <div class="uk-card-footer">
                <a href="/qr/{{$qrc['id']}}" target="_blank" class="uk-button uk-button-text"><i class="fas fa-eye"></i> Visit</a>
                <a href="" class="uk-button uk-button-text uk-float-right uk-margin-small-left" uk-toggle="target: #modal-del-{{$qrc['id']}}"><i class="fas fa-trash-alt"></i> Delete</a>
                <a href="" class="uk-button uk-button-text uk-float-right uk-margin-small-left" uk-toggle="target: #modal-grp-{{$qrc['id']}}"><i class="fas fa-layer-group"></i> Group</a>
                <a href="" class="uk-button uk-button-text uk-float-right uk-margin-left" uk-toggle="target: #modal-{{$qrc['id']}}"><i class="fas fa-pencil-alt"></i> Edit</a>
            </div>
        </div>        
    </div>

    