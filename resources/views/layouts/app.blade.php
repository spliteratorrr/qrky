<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico')}}">

        <!-- Styles -->
        <link href="{{ asset('css/font.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/qrky.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>
        @include('nav')
        
        @yield('content')
    </body>

    <footer class="uk-section uk-section-small uk-text-center uk-position-bottom uk-position-relative ">
		<div class="uk-container">
            <span class="uk-text-muted" style="font-size: 12px;">An APPROJ1 Project by TEAM QUADRO (1st Term 2019-2020) | Social Links: <a href="https://facebook.com/projectqrky" title="Visit our Facebook page!" target="_blank" data-uk-tooltip><span data-uk-icon="facebook" class="qrky-icon"></span></a></span>
		</div>
    </footer>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    @yield('scripts')
</html>