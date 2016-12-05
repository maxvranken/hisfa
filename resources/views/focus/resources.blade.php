@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/old_main.css') }}">
@endsection

@section('content')

    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <a href="/resources">Resources</a>
        </div>

        <div class="resource_stock_container">
            @foreach($resources as $resource)

                <div class="stockres">
                    <div class="resourcetype" id="resource {{ $resource->id }}">
                        <div class="rsrcetype">{{ $resource->name }}</div>
                    </div>
                    <div class="profimgcontainer iconimgcontainer">
                        <img src="/uploads/icons/{{$resource->icon}}" class="iconimg">
                    </div>
                    <div class="resource_number_stock">{{$resource->quantity}}<span class="ton">ton</span></div>
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
                        <input type="text" name="quantity" class="mngquantity" value="{{$resource->quantity}}"
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

                </div>

            @endforeach

            <div class="stockres">
                <div class="resourcetype">
                    <div class="rsrcetype" id="addres">Add resource</div>
                </div>
                <a href="/resources/create" class="additem" id="addresbtn">
                    <div>+</div>
                </a>
            </div>


        </div>

    </div>
    @endsection
            <!--<div class="mngbutton" id="resourceplus">+</div>--><!--<div class="mngbutton" id="resourceminus">-</div>-->