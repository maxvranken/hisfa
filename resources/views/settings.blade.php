@extends('layouts/hisfa')

@section('content')
    <div id="settings">
        <h1><span></span>Settings</h1>
        <a href="{{ url('/profile') }}">Edit profile</a>
        <a href="{{ url('/register') }}">Create new user</a>
        <a href="{{ url('/rights') }}">Change user rights</a>
    </div>
@endsection