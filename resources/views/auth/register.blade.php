@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/settings.css') }}">
@endsection

@section('content')
    @if ($errors->has('name'))
        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
    @endif
    @if ($errors->has('email'))
        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
    @endif
    @if ($errors->has('password'))
        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
    @endif

    <form class="register_form" method="POST" action="{{ url('register') }}">
        <p class="title"><span class="dot white"></span>Create new user</p>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label for="name" >Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email" >E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        <label for="password" >Password</label>
        <input id="password" type="password" name="password" required>

        <label for="password-confirm" >Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>

        <button type="submit" class="submit">
            Register User
        </button>
    </form>
@endsection