@extends('layouts/hisfa')

@section('content')
    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
            <p>Edit primesilo</p>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/primesilos/edit/edited" method="POST" class="addform">
                <div class="addrow">
                    <div class="addlabel">Resource in primesilo {{$primesilos->id}}</div>
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
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/primesilos/edit/deleted" method="POST" class="addform">

                <div class="addrow">
                    <input type="hidden" name="editedid" value="{{ $primesilos->id }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="deletesilo" value="Delete this silo" class="deletebutton">
                </div>
            </form>
        </div>
    </div>

@endsection