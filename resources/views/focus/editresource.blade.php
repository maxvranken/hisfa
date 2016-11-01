@extends('layouts/hisfa')

@section('content')
    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <p>Add Resource</p>
        </div>
        <div class="avatar_container icon_container">
            <div class="profimgcontainer iconimgcontainer">
                <img src="/uploads/icons/{{$resource->icon}}" id="iconimg">
            </div>
            <form enctype="multipart/form-data" action="/resources/changeicon" method="POST" class="addform">
                <div class="addrow">
                    <label for="file" class="addsubmit" id="label">Select an image</label>
                    <input type="file" id="file" name="icon"
                           onchange="document.getElementById('iconimg').src = window.URL.createObjectURL(this.files[0])">


                </div>
                <div class="addrow">
                    <input type="hidden" name="editedid" value="{{ $resource->id }}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit" id="sbmt">
                </div>
            </form>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/edited" method="POST" class="addform">
                <div class="addrow">
                    <div class="addlabel">Resource name</div>
                    <input type="text" name="resourcename" placeholder="Enter the name of the resource" class="addinput" value="{{ $resource->name }}">
                </div>
                <div class="addrow">
                    <input type="hidden" name="editedid" value="{{ $resource->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="confirm" value="Confirm" class="addsubmit">
                </div>
            </form>
        </div>
        <div class="resource_container">
            <form enctype="multipart/form-data" action="/resources/deleted" method="POST" class="addform">

                <div class="addrow">
                    <input type="hidden" name="deletedid" value="{{ $resource->id }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" name="deletesilo" value="Delete this resources" class="deletebutton">
                </div>
            </form>
        </div>
    </div>

@endsection