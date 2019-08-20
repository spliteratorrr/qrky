@extends('layouts.appcontent')

@php
    
@endphp

@section('headers')
    <meta http-equiv='refresh' content='4; URL={{ $content }}'>
@endsection

@section('content')
<div class="uk-container">
    <nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
        <div class="uk-navbar-center">
            <a class="uk-logo" title="Logo" href="">
                <img src="{{ asset('img/logo.png')}}" draggable="false" alt="Logo" style="width: 100px; margin-top: 20px;">
            </a>
        </div>
        
    </nav>
</div>

<section id="content" class="uk-section uk-section-small">
    <div class="uk-container uk-text-center">
        <h4 class="uk-text-muted"><div style="margin-right: 6px;" uk-spinner="ratio: 0.75"></div> Redirecting to<span id="wait"></span></h4>
        <h2>{{ $name }}</h2>
        <p class="uk-text-muted">{{ $desc }}</p>
    </div>
</section>

@endsection

@section('scripts')
<script>
    window.dotsGoingUp = true;
    var dots = window.setInterval( function() {
    var wait = document.getElementById("wait");
     if ( window.dotsGoingUp ) 
        wait.innerHTML += ".";
    else {
        wait.innerHTML = wait.innerHTML.substring(1, wait.innerHTML.length);
        if ( wait.innerHTML === "")
             window.dotsGoingUp = true;
    }
    if ( wait.innerHTML.length > 2 )
        window.dotsGoingUp = false;
    }, 150);
</script>    
@endsection