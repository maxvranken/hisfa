@extends('../layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/settings.css') }}">
@endsection

@section('content')
    <ul class="profile">

        @if(session('feedbackavatar'))
            <p class="message">{{ session('feedbackavatar') }}</p>
        @endif
        @if(session('feedbackpwd'))
            <p class="message">{{ session('feedbackpwd') }}</p>
        @endif
        @if(session('feedbackname'))
            <p class="message">{{ session('feedbackname') }}</p>
        @endif

        <li>
            <div class="user_profile">
                <div class="profile_picture">
                    <div class="picture"><img src="/uploads/avatars/{{$user->avatar}}"></div>
                    <span class="change_picture">Change image</span>
                    <form enctype="multipart/form-data" action="/profile/changeavatar" method="POST" class="picture_form">
                        {{ csrf_field() }}
                        <span class="overlay_button"></span>
                        <input type="file" name="avatar" class="choose_file">
                    </form>
                </div>
                <div class="user_info">
                    <p>{{$user->name}}</p>
                    <p>{{$user->email}}</p>
                    <form enctype="multipart/form-data" action="{{ url('/logout') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" value="Logout" class="deletebutton">
                    </form>
                </div>
            </div>
        </li>

        <li>
            <p class="title"><span class="dot white"></span>Change userinformation</p>
            <form enctype="multipart/form-data" action="/profile/changename" method="POST">
                {{ csrf_field() }}
                <label for="name">Edit name:</label>
                <input type="text" name="name" placeholder="new name" value="{{$user->name}}" id="name">
                <label for="email">Edit email:</label>
                <input type="email" name="email" placeholder="new email" value="{{$user->email}}" id="email">
                <input type="submit" name="confirm" value="save" class="submit">
            </form>
        </li>

        <li>
            <p class="title"><span class="dot white"></span>Change password</p>
                <form enctype="multipart/form-data" action="/profile/changepassword" method="POST">
                    {{ csrf_field() }}
                    <label>Current password</label>
                    <input type="password" name="password3" placeholder="current password">
                    <label>New password</label>
                    <input type="password" name="password1" placeholder="new password">
                    <label>Retype password</label>
                    <input type="password" name="password2" placeholder="repeat new password">
                    <input type="submit" name="confirm" value="save" class="submit">
                </form>
            </div>
        </li>
    </ul>
@endsection