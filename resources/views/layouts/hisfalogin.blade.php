<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}">

    <script src="{{ URL::asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ URL::asset('http://s.codepen.io/assets/libs/modernizr.js') }}" defer></script>
    <script src="{{ URL::asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/login.js') }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>

    </script>
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/login.js"></script>

</body>
</html>
