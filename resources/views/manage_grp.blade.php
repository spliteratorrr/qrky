@extends('layouts.app') 

@section('content')
<section id="content" class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-text-center">
            <i class="fas fa-layer-group"></i><br><span>Manage Groups</span>
        </h2>
        
        <br>
        <div class="uk-child-width-1-2@m" uk-grid>
            @foreach($grps as $grp)
                @include('elements.groupcard')
            @endforeach
        </div>
    </div>
</section>
@endsection