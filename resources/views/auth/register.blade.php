@extends('layouts/hisfa')

@section('content')
    <div>
        <h1>Create new user</h1>
        <form class="register_form" method="POST" action="{{ url('register') }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="name" >Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif

            <label for="email" >E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif

            <label for="password" >Password</label>
            <input id="password" type="password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif

            <label for="password-confirm" >Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
            @endif

            <label for="admin" >Make admin</label>
            <input id="admin" type="checkbox" name="admin">

            <button type="submit">
                Register User
            </button>
        </form>
    </div>
@endsection