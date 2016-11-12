@extends('layouts/hisfa')

@section('content')
    <div id="settings">
        <h1><span></span>Settings</h1>
        <a href="{{ url('/profile') }}">Edit profile</a>
        @role('admin')
            <a href="{{ url('/register') }}">Create new user</a>
        @endrole
        @if( Auth::user()->can('change user permissions'))
            <a href="{{ url('/permissions') }}">Change permissions</a>
        @endif
    </div>
@endsection