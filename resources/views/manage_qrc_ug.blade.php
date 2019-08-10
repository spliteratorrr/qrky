@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-text-center">
            <i class="fas fa-qrcode"></i><br><span>Manage QR Codes</span>
        </h2>
        
        <ul class="uk-child-width-expand" uk-tab="media: @m" uk-switcher="animation: uk-animation-slide-left-medium">
            <!-- Ungroup tab -->
            <li class="uk-active">
                <a class="qrky-tab" href="#">Ungrouped 
                    <span id="ug-count" class="uk-visible@s">[ <i class="fas fa-qrcode"></i> {{ $ug_qr_count }} ]</span>
                </a>
            </li>
            <li>
                <!-- Group tab -->
                <a class="qrky-tab" disabled>
                    Grouped <span id="g-count" class="uk-visible@s">[ <i class="fas fa-qrcode"></i> {{ $g_qr_count }}, <i class="fas fa-layer-group"></i> {{ $g_grp_count }} ]</span>
                    <span class="uk-margin-small-left" uk-icon="icon: triangle-down"></span>
                </a>
                <!-- Groups dropdown -->
                <div uk-dropdown="mode: click; pos: bottom;">
                    <ul class="uk-nav uk-dropdown-nav">
                        @foreach($grps as $grp)
                            <li>
                                <a href="#"><i class="fas fa-layer-group"></i> {{ $grp['name'] }} [ <i class="fas fa-qrcode"></i> {{ $grp['qr_count'] }} ]</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Sort by -->
        <div class="uk-margin-bottom">
            <!-- Create new -->
            <button class="uk-button uk-button-default uk-button-small uk-float-left" type="button" uk-toggle="target: #modal-create">
                <i class="fas fa-plus-square"></i> Create new QRC</span>
            </button>
            
            <!-- Sort by -->
            <button class="uk-button uk-button-default uk-button-small uk-float-right" type="button">
                <i class="fas fa-random"></i> Sort by<span id="sort-mode" class="uk-visible@s">: Alphabetical</span>
            </button>
            
            <div uk-dropdown="pos: bottom-justify">
                <ul class="uk-nav uk-dropdown-nav">
                    <li class="uk-active"><a href="#"><i class="fas fa-sort-alpha-up"></i> Alphabetical</a></li>
                    <li><a href="#"><i class="fas fa-crown"></i> Owned</a></li>
                </ul>
            </div>
        </div>
        <br>

        <div class="uk-margin">
            <div class="uk-child-width-1-2@m" uk-grid>
                @foreach($qrcs as $qrc)
                    @include('elements.qrcard')
                @endforeach
            </div>
        </div>

        @foreach($qrcs as $qrc)
            @include('elements.qrcard_edit')
        @endforeach

        @include('elements.qrcard_create')
    </div>
</section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/qrcard_edit.js') }}"></script>
@endsection