@extends('layouts/hisfa')

@section('content')
    <div class="permissions">
        <div class="material_title"><div class="title_dot" style="width: 10px; height: 10px; background-color: #FFF; margin-top: 3px"></div><p>Permissions of non admin users</p></div>
        <form>
            <div>
                <select name="users" onchange="permissionsAjax(this.value)">
                    <option selected disabled>select user</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->email}} ({{$user->name}})</option>
                    @endforeach
                </select>
            </div>
        </form>
        <form action="permissions" method="POST" id="permissions_form">
            <input type="hidden" name="_method" value="PUT">
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
            <input type="hidden" name="user" value="" class="permission_edit this_user">
            <div>
                <input type="checkbox" name="view_dashboard" class="permission_edit view_dashboard">
                <label for="view_dashboard">User can view dashboard</label>
            </div>
            <div>
                <input type="checkbox" name="view_foam" class="permission_edit view_foam">
                <label for="view_foam">User can view foam stock page</label>
            </div>
            <div>
                <input type="checkbox" name="view_prime" class="permission_edit view_prime">
                <label for="view_prime">User can view prime silo's page</label>
            </div>
            <div>
                <input type="checkbox" name="view_waste" class="permission_edit view_waste">
                <label for="view_waste">User can view waste silo's page</label>
            </div>
            <div>
                <input type="checkbox" name="edit_foam" class="permission_edit edit_foam">
                <label for="edit_foam">User can edit foam stock</label>
            </div>
            <div>
                <input type="checkbox" name="edit_prime" class="permission_edit edit_prime">
                <label for="edit_prime">User can edit prime silo's page</label>
            </div>
            <div>
                <input type="checkbox" name="edit_waste" class="permission_edit edit_waste">
                <label for="edit_waste"> User can edit waste silo's page </label>
            </div>
            <div>
                <input type="checkbox" name="edit_permissions" class="permission_edit edit_permissions">
                <label for="edit_permissions">User can change user permissions</label>
            </div>
        </form>
    </div>

@endsection