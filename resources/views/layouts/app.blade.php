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

    <footer class="uk-section uk-section-small uk-section-muted uk-text-center">
		<div class="uk-container">
            <span class="uk-text-small uk-text-muted">An APPROJ1 Project by Team Quadro (1st Term 2019-2020) | Built with <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip><span data-uk-icon="uikit" class="qrky-icon"></span></a></span>
		</div>
    </footer>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    @yield('scripts')
</html>