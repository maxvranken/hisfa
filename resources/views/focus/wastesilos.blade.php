@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/silos.css') }}">
@endsection

@section('content')
    <a href="{{ url('/wastesilos') }}" class="title"><span class="dot orange"></span>Wastesilo's</a>
    <ul class="waste_focus">
        @foreach($wastesilos as $key=>$wastesilo)
            <li id="silo{{ $wastesilo->id }}">
                <p class="silo_resource">{{ $wastesilo->resource->name}}</p>
                <div class="wsilo_fill" style="background-color:
                        @if ($wastesilo->percentage >= 90)
                            red
                        @elseif ($wastesilo->percentage >= 60)
                            orange
                        @else
                            green
                        @endif;">
                    <div class="silo_filled" style="height: calc(100% - {{ $wastesilo->percentage }}%);"></div>
                </div>

                <form action="/wastesilos/changeqntyplus?={{ $wastesilo->id }}" method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="editedid" value="{{ $wastesilo->id }}">
                    <input type="hidden" name="editedqnty" value="{{ $wastesilo->percentage }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="mngbutton" id="resourceplus{{ $wastesilo->id }}" value="+">
                </form>

                <form action="/wastesilos/changeqnty?={{ $wastesilo->id }}" method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="editedid" value="{{ $wastesilo->id }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="number" min="0" name="percentage" class="mngquantity" maxlength="2"
                           value="{{$wastesilo->percentage}}" id="resourcenumber{{ $wastesilo->id }}">
                </form>

                <form action="/wastesilos/changeqntyminus?={{ $wastesilo->id }}" method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="editedid" value="{{ $wastesilo->id }}">
                    <input type="hidden" name="editedqnty" value="{{ $wastesilo->percentage }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="mngbutton" id="resourceminus{{ $wastesilo->id }}" value="-">
                </form>

                <a href="/wastesilos/edit?id={{ $wastesilo->id }}" class="aeditbtn">Edit</a>
                <span class="silo_number">{{ $key+1 }}</span>
            </li>
        @endforeach
    </ul>
@endsection