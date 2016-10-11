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

        </div>
        <div class="resource_stock_container">
            @foreach($resources as $resource)
                <div class="stock">
                    <div class="resource_number_stock">{{$resource->quantity}}<span class="ton">ton</span></div>
                </div>
            @endforeach

        </div>
    </div>
@endsection