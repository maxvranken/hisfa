@extends('layouts/login')

@section('content')
    <div class="reset">
        <div class="panel-body">
            <div class="legend">Reset password</div>
            <div class="forgotlinkclass">
                @if ($errors->has('password'))
                    <p>{{ $errors->first('password') }}</p>
                @endif
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="inputfield">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                        <span><i class="fa fa-envelope-o"></i></span>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="inputfield">
                        <input id="password" type="password" class="form-control" name="password" required>
                        <span><i class="fa fa-lock"></i></span>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="inputfield">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <span><i class="fa fa-lock"></i></span>
                    </div>
                    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
