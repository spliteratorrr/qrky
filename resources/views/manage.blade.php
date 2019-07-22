@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-text-center"><i class="fas fa-layer-group"></i> <span>Guidance Office</span></h2>
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