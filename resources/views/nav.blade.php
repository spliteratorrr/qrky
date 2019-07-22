<div class="uk-container">
<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar>
        <div class="uk-navbar-left">
            <div class="uk-navbar-item">
            <a class="uk-logo" title="Logo" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png')}}" draggable="false" alt="Logo" style="width: 100px; margin-top: 20px;">
            </a>
        </div>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav uk-visible@m">
                <li>
                    @guest
                        <div class="uk-button-group">
                            <a href="{{ route('login') }}">
                                <button class="uk-button uk-button-default qrky-nav-btn uk-button-small">Login</button>
                            </a>
                            <a href="{{ route('register') }}">
                                <button class="uk-button uk-button-default qrky-nav-btn uk-button-small">Register</button>
                            </a>
                        </div>
                    @else
                        <div class="uk-button-group">
                            <a href="{{ route('create') }}">
                                <button class="uk-button uk-button-secondary uk-button-small">Create a QR Code</button>
                            </a>
                            <button class="uk-button uk-button-default uk-button-small">My QR Codes</button>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    </nav>
    <hr>
</div>