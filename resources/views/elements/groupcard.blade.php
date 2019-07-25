<div>
        <div class="uk-card uk-card-default uk-card-hover uk-card-small qrky-sec-border">
            <div class="uk-card-body">
                <div class="uk-grid uk-grid-small"> 
                    <div class="uk-width-auto">
                        <h4><i class="fas fa-layer-group"></i> {{$grp['name']}}</h4>
                    </div>
                </div>
                <p class="uk-text-meta uk-margin-remove-top">
                    <i class="fas fa-qrcode"></i> 2 QRCs |
                    <i class="fas fa-user-friends"></i> 3 members
                </p>
                <p>{{$grp['desc']}}</p>
            </div>
            <div class="uk-card-footer">
                <a href="#modal-{{$grp['id']}}" class="uk-button uk-button-text" uk-toggle="target: #modal-{{$grp['id']}}"><i class="fas fa-sign-in-alt"></i> Join Group</a>
            </div>
            
        </div>        
    </div>

    