@extends('layouts/hisfa')

@section('content')
    <div class="profilesettings">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <p>Change profilepicture</p>
        </div>
        <div class="avatar_container">
            <div class="profimgcontainer">
                <img src="/uploads/avatars/{{$user->avatar}}" id="profimg">
            </div>
            <form enctype="multipart/form-data" action="/profile/changeavatar" method="POST" class="addform">
                <div class="addrow">
                    <label for="file" class="addsubmit" id="label">Select an image</label>
                    <input type="file" id="file" name="avatar"
                           onchange="document.getElementById('profimg').src = window.URL.createObjectURL(this.files[0])">


                </div>
                <div class="addrow">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit" id="sbmt">
                </div>
                @if(session('feedbackavatar'))
                    {{ session('feedbackavatar') }}<br>
                @endif
            </form>
        </div>
    </div>

    <div class="profilesettings">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <p>Change password</p>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/profile/changepassword" method="POST" class="addform">
                <div class="addrow">
                    <div class="addlabel">Current password</div>
                    <input type="password" name="password3" placeholder="current password" class="addinput">
                </div>
                <div class="addrow">
                    <div class="addlabel">New password</div>
                    <input type="password" name="password1" placeholder="new password" class="addinput">
                </div>
                <div class="addrow">
                    <div class="addlabel">Retype password</div>
                    <input type="password" name="password2" placeholder="repeat new password" class="addinput">
                </div>
                <div class="addrow">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit">
                </div>
                @if(session('feedbackpwd'))
                    {{ session('feedbackpwd') }}<br>
                @endif
            </form>
        </div>
    </div>
    <div class="profilesettings">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <p>Change userinformation</p>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/profile/changename" method="POST" class="addform">
                <div class="addrow">
                    <div class="addlabel">New name</div>
                    <input type="text" name="name" placeholder="new name" class="addinput">
                </div>
                <div class="addrow">
                    <div class="addlabel">New email</div>
                    <input type="email" name="email" placeholder="new email" class="addinput">
                </div>
                <div class="addrow">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit">
                </div>
                @if(session('feedbackname'))
                    {{ session('feedbackname') }}<br>
                @endif
            </form>
        </div>
    </div>
    <div class="resource_container">
        <form enctype="multipart/form-data" action="{{ url('/logout') }}" method="POST" class="addform">

            <div class="addrow">

                <input type="submit" value="Logout" class="deletebutton">
                {{ csrf_field() }}
            </div>
        </form>
    </div>

@endsection