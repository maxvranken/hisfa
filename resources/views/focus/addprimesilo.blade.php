@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <a href="{{ url('/primesilos') }}" class="title"><span class="dot bluegreen"></span>Choose resource</a>
    <div class="resource_container">
        <form enctype="multipart/form-data" action="/primesilos/create/store" method="POST" class="addform">
            <div class="addrow">
                <select class="addinput" name="resourceid">

                    @foreach($resources as $resource)
                        <option value="{{$resource->id}}">{{$resource->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="addrow">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="confirm" value="Create" class="addsubmit">
            </div>
        </form>
    </div>

@endsection