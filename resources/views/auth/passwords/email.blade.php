@extends('layouts/login')

@section('content')
    <div class="reset">
        <div class="panel-body">
            <div class="legend">Reset password</div>
            <div class="forgotlinkclass">
                @if (session('status'))
                    <p>{{ session('status') }}</p>
                @endif
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="inputfield">
                        <input placeholder="email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        <span><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <div class="forgotlinkclass">
                        <a class="forgotlink" href="{{ url('/login') }}">Back to login.</a>
                    </div>
                    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

