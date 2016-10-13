@extends('layouts/hisfa')

@section('content')
    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <p>Resources</p>
        </div>
        <div class="resource_container">
            @foreach($resources as $resource)
                <div class="resourcetype" id="resource {{ $resource->id }}">
                    <div class="rsrcetype">{{ $resource->name }}</div>
                </div>

            @endforeach

            <div class="resourcetype" >
                <div class="rsrcetype" id="addres">Add silo</div>
            </div>

        </div>
        <div class="resource_stock_container">
            @foreach($resources as $resource)
                <div class="stock">
                    <div class="resource_number_stock">{{$resource->quantity}}<span class="ton">ton</span></div>
                    <form action="/resources" method="POST" enctype="multipart/form-data"></form>
                    <div class="mngbutton" id="resourceplus{{ $resource->id }}">+</div>
                    <input type="text" class="mngquantity" value="{{$resource->quantity}}" id="resourcenumber{{ $resource->id }}">
                    <div class="mngbutton" id="resourceminus{{ $resource->id }}">-</div>
                    <a href="/resources/edit?id={{ $resource->id }}"><div class="editbtn"><div class="editbtn_txt">Edit</div></div></a>
                </div>
            @endforeach
            <a href="/resources/create" class="additem" id="addresbtn">
                <div>+</div>
            </a>

        </div>

    </div>
@endsection
