<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('headers')
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico')}}">

        <!-- Styles -->
        <link type="text/css" href="{{ asset('css/font.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('css/qrky.css') }}" rel="stylesheet">
    </head>

    <body>
        @yield('content')
    </body>

    <footer class="uk-section uk-section-small uk-text-center uk-position-bottom uk-position-relative ">
		<div class="uk-container">
            <span class="uk-text-muted" style="font-size: 12px;">An APPROJ1 Project by QUADRO | Learn more: <a href="https://facebook.com/projectqrky" title="Visit our Facebook page!" target="_blank" data-uk-tooltip><span data-uk-icon="facebook" class="qrky-icon"></span></a></span>
		</div>
    </footer>
    

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    @yield('scripts')
</html>