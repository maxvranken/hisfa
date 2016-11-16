@extends('layouts/hisfa')

@section('content')
    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #e14c27;"></div>
            <p>Edit wastesilo</p>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/wastesilos/edit/edited" method="POST" class="addform">
                <div class="addrow">
                    <div class="addlabel">Resource in wastesilo {{$wastesilos->name}}</div>
                    <select class="addinput" name="resourceid">
                        @foreach($resources as $resource)
                            <option value="{{$resource->id}}">{{$resource->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="addrow">
                    <input type="hidden" name="editedid" value="{{ $wastesilos->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit">
                </div>
            </form>
        </div>
    </div>

@endsection