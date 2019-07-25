@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-text-center">
            <i class="fas fa-qrcode"></i><br><span>Manage QR Codes</span>
        </h2>
        
        <ul class="uk-tab uk-child-width-expand">
            <li>
                <a class="qrky-tab" href="{{ route('manage-qrcs-ug') }}" disabled>Ungrouped (<span id="ug-count">2</span>)</a>
            </li>
            <li class="uk-active">
                <a class="qrky-tab">Grouped <span class="uk-margin-small-left" uk-icon="icon: triangle-down"></span></a>
                <div uk-dropdown="mode: click; pos: bottom-justify;">
                    <ul class="uk-nav uk-dropdown-nav">
                        <li class="uk-active"><a href="#">Guidance Office</a></li>
                        <li><a href="#">Org Fair</a></li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Sort by -->
        <button class="uk-button uk-button-default uk-button-small uk-float-right" type="button"><i class="fas fa-random"></i> Sort by: <span id="sort-mode">Alphabetical</span></button>
        <div uk-dropdown="pos: bottom-justify">
            <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-active"><a href="#"><i class="fas fa-sort-alpha-up"></i> Alphabetical</a></li>
                <li><a href="#"><i class="fas fa-crown"></i> Owned</a></li>
            </ul>
        </div>
        <br>

        <div class="uk-margin uk-flex uk-flex-middle uk-flex-center">
            <span class="uk-text-center uk-text-muted"><i class="fas fa-exclamation uk-margin-bottom" style="font-size: 52px;"></i> <br>No QR codes found</span>
        </div>
        
        @foreach($qrcs as $qrc)
            @include('elements.qrcard_edit')
        @endforeach
    </div>
</section>
@endsection