@extends('layouts.hisfalogin')

@section('content')

    <form class="login" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="legend">Login</div>
        <div class="inputfield{{ $errors->has('email') ? ' has-error' : '' }}">

                <input type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span id="feedbackmessage">
                                       {{ $errors->first('email') }}
                    </span>
            @endif
                <span><i class="fa fa-envelope-o"></i></span>

        </div>


        <div class="inputfield{{ $errors->has('password') ? ' has-error' : '' }}">


            <div class="col-md-6">
                <input placeholder="Password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span id="feedbackmessage">
                                        {{ $errors->first('password') }}
                                    </span>
                @endif
                <span><i class="fa fa-lock"></i></span>
            </div>
        </div>


                <div class="checkbox">
                    <label class="check">
                        <input type="checkbox" name="remember"> remember
                    </label>
                </div>
        <div class="forgotlinkclass">
        <a class="forgotlink" href="{{ url('/password/reset') }}">
            Forgot Your Password?
        </a>
        </div>



                <button type="submit" class="submit"><i class="fa fa-long-arrow-right"></i>
                </button>

    </form>
@endsection
