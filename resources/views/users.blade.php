@extends('layouts/hisfa')

@section('content')
    <div class="users">
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FFF;"></div>
            <a href="/users">Users</a>
        </div>
        <ul>
            @foreach($users as $user)
                <li value="{{$user->id}}">
                    <p>{{$user->email}} | {{$user->name}}</p>
                    @if($user->id !== 1)
                    <div class="edit_this_user">
                        <form method="post" action="/user/admin" class="admin_form">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="admin_checkbox">
                                <p>admin</p>
                                <input onChange="this.form.submit()" type="checkbox" name="admin" class="admin_edit" @if($user->hasRole('admin')) checked  @endif>
                            </div>
                        </form>
                        <form method="post" action="/user/delete">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button>Delete user</button>
                        </form>
                    </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection