@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-text-center">
            <i class="fas fa-qrcode"></i> <span>My QR Codes</span>
        </h2>
        
        <div>
            <ul class="uk-child-width-expand" uk-tab>
                <li class="uk-active"><a class="qrky-tab" href="#">Guidance Office</a></li>
                <li><a class="qrky-tab" href="#">ITRO</a></li>
            </ul>
        </div>
        <br>
        <div class="uk-child-width-1-2@m" uk-grid>
            @foreach($qrcs as $qrc)
                @include('elements.qrcard')
            @endforeach
        </div>

        @foreach($qrcs as $qrc)
            @include('elements.qrcard_edit')
        @endforeach
    </div>
</section>
@endsection