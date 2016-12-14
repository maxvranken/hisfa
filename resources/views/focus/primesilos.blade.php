@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <a href="{{ url('/primesilos') }}" class="title"><span class="dot bluegreen"></span>Primesilo's</a>
    <ul class="prime_focus">
        @foreach($primesilos as $key=>$primesilo)
            <li id="silo{{ $key+1 }}">
                <p class="silo_resource">{{ $primesilo->resource->name}}</p>
                <p class="silo_fill">{{ $primesilo->weight }}<span> kg/m³</span></p>
                <form action="/primesilos/changeqnty?={{ $primesilo->id }}" method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="editedid" value="{{ $primesilo->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="number" min="0" name="quantity" class="mngquantity" maxlength="2"
                           value="{{$primesilo->weight}}" id="resourcenumber{{ $primesilo->id }}">
                </form>
                <a href="/primesilos/edit?id={{ $primesilo->id }}" class="aeditbtn">Edit</a>
                <span class="silo_number">{{ $key+1 }}</span>
            </li>
        @endforeach

        <li class="silo" id="silo{{ $primesilo->id }}">
            <div class="add_silo">
                <a href="/primesilos/create" class="additem" id="">Add Silo<span>+</span></a>
            </div>
        </li>

    </ul>
@endsection