@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <a href="{{ url('/resources') }}" class="title"><span class="dot blue"></span>Add Resource</a>
    <div class="resource_container">
        <form enctype="multipart/form-data" action="/store" method="POST" class="addform">
            <div class="addrow">
                <div class="addlabel">Resource name</div>
                <input type="text" name="resourcename" placeholder="Enter the name of the resource" class="addinput">
            </div>
            <div class="addrow">
                <div class="addlabel">Resource Quantity</div>
                <input type="text" name="resourceqnty" value="0" class="addinput">
            </div>
            <div class="addrow">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="confirm" value="Confirm" class="addsubmit">
            </div>
        </form>
    </div>

@endsection