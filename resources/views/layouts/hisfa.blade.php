<!-- hier komt de basic layout die op de meeste pagina's terugkomt -->
<!doctype html>
<html lang="en">
<head>
    <title>Hisfa</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/manage.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/prime.css') }}">
    <script src="{{ URL::asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ URL::asset('js/dragscroll.js') }}" defer></script>
    <script src="{{ URL::asset('js/main.js') }}" defer></script>
</head>
<body>
<div class="dash">
    <div class="dash_container">
        @yield('content')
    </div>
</div>
<div class="menu">
    <div class="menu_container">
        <div class="menu_user">
            <a href="{{ url('/profile') }}">
                <div id="user">
                    <img src="/uploads/avatars/{{Auth::user()->avatar}}" id="profileimage">
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </a>
        </div>
        <hr>
        <div class="menu_navlist">
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: #00db4c;"></div>
                <a href="{{ url('/') }}" class="nav_title">Dashboard</a>
            </div>
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
                <a href="{{ url('/primesilos') }}" class="nav_title">Primesilo's</a>
            </div>
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: #e14c27;"></div>
                <a href="{{ url('/wastesilos') }}" class="nav_title">Wastesilo's</a>
            </div>
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: #eddb48;"></div>
                <a href="{{ url('/foam') }}" class="nav_title">Foam stock</a>
            </div>
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: #2389ce;"></div>
                <a href="{{ url('/resources') }}" class="nav_title">Resources</a>
            </div>
            <div class="nav_item">
                <div class="nav_dot" style="width: 10px; height: 10px; background-color: purple;"></div>
                <a href="{{ url('/logs') }}" class="nav_title">Logs</a>
            </div>
        </div>
        <hr>
        <div class="settings">
            <a href="{{ url('/settings') }}" class="settings_link">
                <div class="settings_icon"><img src="http://www.freeiconspng.com/uploads/settings-icon-13.png"
                                                alt="settings" style="width: 20px; margin-right: 10px;"></div>
                <div class="settings_text">Settings</div>
            </a>
        </div>

    </div>

</div>
</body>
</html>