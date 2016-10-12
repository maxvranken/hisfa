@extends('layouts/hisfa')

@section('content')
    <head>
        <link a href="/public/css/settings.css" type="text/css">
    </head>
    <body class="settingsbody">
    <div class="container">


    <form>
        <section>

            <ul class="input-list style-1 clearfix">
                <h2>Settings page</h2>
                <h2>Add user</h2>
                <li>
                    <input type="text" placeholder="email">
                </li>
                <input type="submit" value="Submit">
            </ul>

        </section>

    </form>
    </div>
    </body>
@endsection