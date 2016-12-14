@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <div class="resource_container">
        <a href="{{ url('/wastesilos') }}" class="title"><span class="dot orange"></span>Resource in wastesilo {{$wastesilos->name}}</a>
        <form enctype="multipart/form-data" action="/wastesilos/edit/edited" method="POST" class="addform">
            <select class="addinput" name="resourceid">
                @foreach($resources as $resource)
                    <option value="{{$resource->id}}">{{$resource->name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="editedid" value="{{ $wastesilos->id }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" name="confirm" value="Edit" class="addsubmit">
        </form>
    </div>

@endsection