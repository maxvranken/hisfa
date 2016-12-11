<!doctype html>
<html lang="en">
    <head>
        <title>Hisfa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}">
        <script src="{{ URL::asset('js/jquery.min.js') }}" defer></script>
        <script src="{{ URL::asset('js/dragscroll.js') }}" defer></script>
        <script src="{{ URL::asset('js/main.js') }}" defer></script>
        @yield('assets')
    </head>
    <body>
        <header>
            <a class="logo" href="{{ url('/') }}"></a>
            <div class="nav_button"><span></span><span></span><span></span></div>
        </header>

        <main>
            @if(Session::has('flash_error'))
                <div class="flash_error">{{ Session::get('flash_error') }}</div>
            @endif
                <br>
            @if(Session::has('flash_message'))
                <div class="flash_success">{{ Session::get('flash_message') }}</div>
            @endif
                <br>
            @yield('content')
        </main>

        <nav>
            <ul>
                <li class="profile_link">
                    <a href="{{ url('/profile') }}"><img src="/uploads/avatars/{{Auth::user()->avatar}}" id="profileimage"><span>{{ Auth::user()->name }}</span></a>
                </li>

                @if( Auth::user()->can('view dashboard') )
                <li>
                    <a href="{{ url('/') }}" class="nav_title"><span class="dot green"></span>Dashboard</a>
                </li>
                @endif

                @if( Auth::user()->can('view prime silos') )
                <li>
                    <a href="{{ url('/primesilos') }}" class="nav_title"><span class="dot bluegreen"></span>Primesilo's</a>
                </li>
                @endif

                @if( Auth::user()->can('view waste silos') )
                <li>
                    <a href="{{ url('/wastesilos') }}" class="nav_title"><span class="dot orange"></span>Wastesilo's</a>
                </li>
                @endif

                @if( Auth::user()->can('view foam stock') )
                <li>
                    <a href="{{ url('/foam') }}" class="nav_title"><span class="dot yellow"></span>Foam stock</a>
                </li>
                @endif

                <li>
                    <a href="{{ url('/resources') }}" class="nav_title"><span class="dot blue"></span>Resources</a>
                </li>

                <li>
                    <a href="{{ url('/logs') }}" class="nav_title"><span class="dot purple"></span>Logs</a>
                </li>

                <li class="settings_link">
                    <a href="{{ url('/settings') }}" class="settings_link"><span></span>Settings</a>
                </li>
            </ul>
        </nav>
    </body>
</html>