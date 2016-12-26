@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <a href="{{ url('/resources') }}" class="title"><span class="dot blue"></span>Resources</a>
    <ul class="resources_focus">
            @foreach($resources as $resource)
                <li>
                    <div class="resourcetype" id="resource {{ $resource->id }}">
                        <div class="silo_resource">{{ $resource->name }}</div>
                    </div>
                    <div class="profimgcontainer iconimgcontainer">
                        <img src="/uploads/icons/{{$resource->icon}}" class="iconimg">
                    </div>
                    <div class="silo_fill">{{$resource->quantity}}<span class="ton">ton</span></div>
                    <form action="/resources/changeqntyplus?={{ $resource->id }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="editedid" value="{{ $resource->id }}">
                        <input type="hidden" name="editedqnty" value="{{ $resource->quantity }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" class="mngbutton" id="resourceplus{{ $resource->id }}" value="+">
                    </form>

                    <form action="/resources/changeqnty?={{ $resource->id }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="editedid" value="{{ $resource->id }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="number" min="0" name="quantity" class="mngquantity" value="{{$resource->quantity}}"
                               id="resourcenumber{{ $resource->id }}">
                    </form>

                    <form action="/resources/changeqntyminus?={{ $resource->id }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="editedid" value="{{ $resource->id }}">
                        <input type="hidden" name="editedqnty" value="{{ $resource->quantity }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" class="mngbutton" id="resourceminus{{ $resource->id }}" value="-">
                    </form>

                    <a href="/resources/edit?id={{ $resource->id }}" class="aeditbtn">
                        <div class="editbtn">
                            <div class="editbtn_txt">Edit</div>
                        </div>
                    </a>
                </li>

            @endforeach

            <li class="add_resource">
                <div class="silo_resource">Add resource</div>
                <a href="/resources/create" class="mngbutton">+</a>
            </li>
        </ul>
    @endsection