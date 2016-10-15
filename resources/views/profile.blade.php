@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px ; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <h2>{{$user->name}}'s profile</h2>
                <form enctype="multipart/form-data" action="/profile/changeavatar" method="POST">
                    <label>Update profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                    @if(session('feedbackavatar'))
                        {{ session('feedbackavatar') }}<br>
                    @endif
                </form>
                </br>
              


                </div>
            <div class="col-md-6 col-md-offset-2">
            <form enctype="multipart/form-data" action="/profile/changepassword" method="POST">
                <label>Change password</label>
                <input type="password" name="password1" placeholder="new password">
                <input type="password" name="password2" placeholder="repeat new password">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="btn btn-sm btn-primary">
                @if(session('feedbackpwd'))
                    {{ session('feedbackpwd') }}<br>
                @endif

            </form>
            </div>

            <div class="col-md-6 col-md-offset-2 " style="margin-top: 50px">
                <form enctype="multipart/form-data" action="/profile/changename" method="POST">
                    <label>Change user infromation</label>
                    <input type="text" name="name" placeholder="new name">
                    <input type="email" name="email" placeholder="new email">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="btn btn-sm btn-primary">
                    @if(session('feedbackname'))
                        {{ session('feedbackname') }}<br>
                    @endif


                </form>
            </div>
        </div>
    </div>
@endsection
