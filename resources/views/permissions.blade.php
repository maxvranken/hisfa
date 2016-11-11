@extends('layouts/hisfa')

@section('content')
    <div class="permissions">
        <div class="material_title"><div class="title_dot" style="width: 10px; height: 10px; background-color: #FFF; margin-top: 3px"></div><p>Permissions of non admin users</p></div>
        <form>
            <div>
                <select name="users" onchange="permissions(this.value)">
                    <option @if(!isset($shown_user))selected @endif disabled>select user</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @if(isset($shown_user))@if($shown_user->id == $user->id)selected @endif @endif>{{$user->email}} ({{$user->name}})</option>
                    @endforeach
                </select>
            </div>
        </form>
        @if(isset($shown_user))
            <form action="/permissions/{{$shown_user->id}}" method="POST" id="permissions_form">
                <input type="hidden" name="_method" value="PUT">
                <input type='hidden' name='_token' value='{{csrf_token()}}'>
                <input type="hidden" name="user" value="" class="permission_edit this_user">
                <div>
                    <input type="checkbox" name="view_dashboard" class="permission_edit view_dashboard" @if($shown_user->can('view dashboard')) checked  @endif>
                    <label for="view_dashboard">User can view dashboard</label>
                </div>
                <div>
                    <input type="checkbox" name="view_foam" class="permission_edit view_foam" @if($shown_user->can('view foam stock')) checked  @endif>
                    <label for="view_foam">User can view foam stock page</label>
                </div>
                <div>
                    <input type="checkbox" name="view_prime" class="permission_edit view_prime" @if($shown_user->can('view prime silos')) checked  @endif>
                    <label for="view_prime">User can view prime silo's page</label>
                </div>
                <div>
                    <input type="checkbox" name="view_waste" class="permission_edit view_waste" @if($shown_user->can('view waste silos')) checked  @endif>
                    <label for="view_waste">User can view waste silo's page</label>
                </div>
                <div>
                    <input type="checkbox" name="edit_foam" class="permission_edit edit_foam" @if($shown_user->can('edit foam stock')) checked  @endif>
                    <label for="edit_foam">User can edit foam stock</label>
                </div>
                <div>
                    <input type="checkbox" name="edit_prime" class="permission_edit edit_prime" @if($shown_user->can('edit prime silos')) checked  @endif>
                    <label for="edit_prime">User can edit prime silo's page</label>
                </div>
                <div>
                    <input type="checkbox" name="edit_waste" class="permission_edit edit_waste" @if($shown_user->can('edit waste silos')) checked  @endif>
                    <label for="edit_waste"> User can edit waste silo's page </label>
                </div>
                <div>
                    <input type="checkbox" name="edit_permissions" class="permission_edit edit_permissions" @if($shown_user->can('change user permissions')) checked  @endif>
                    <label for="edit_permissions">User can change user permissions</label>
                </div>
            </form>
        @endif
    </div>

@endsection