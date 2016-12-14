@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <div class="resource_container">
        <a href="{{ url('/primesilos') }}" class="title"><span class="dot bluegreen"></span>Resource in primesilo {{$primesilos->id}}</a>
        <form enctype="multipart/form-data" action="/primesilos/edit/edited" method="POST" class="addform">
            <div class="addrow">
                <select class="addinput" name="resourceid">
                    @foreach($resources as $resource)
                        <option value="{{$resource->id}}">{{$resource->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="addrow">
                <input type="hidden" name="editedid" value="{{ $primesilos->id }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="confirm" value="Confirm" class="addsubmit">
            </div>
        </form>
        <form enctype="multipart/form-data" action="/primesilos/edit/deleted" method="POST" class="addform">

            <div class="addrow">
                <input type="hidden" name="editedid" value="{{ $primesilos->id }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" name="deletesilo" value="Delete this silo" class="deletebutton">
            </div>
        </form>
    </div>
@endsection