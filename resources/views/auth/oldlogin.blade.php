@extends('layouts.app')

@section('content')

                        <form class="login" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="legend">Login</div>
                            <div class="inputfield{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <span><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>

                            <div class="inputfield{{ $errors->has('password') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <input placeholder="Password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    <span><i class="fa fa-lock"></i></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i>
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>

@endsection


@extends('layouts.app')

@section('content')
    <form class="login" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}


        <div class="legend">Login</div>

        <div class="inputfield{{ $errors->has('email') ? ' has-error' : '' }}">
            <input placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
            <span><i class="fa fa-envelope-o"></i></span>
        </div>

        <div class="inputfield"{{ $errors->has('password') ? ' has-error' : '' }}>
            <input type="password" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
            <span><i class="fa fa-lock"></i></span>
        </div>

        <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>

    </form>

@endsection