@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/old_main.css') }}">
@endsection

@section('content')

    <div class="prime_focus">
        <div class="prime_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
            <a href="/primesilos">Primesilo's</a>
        </div>
        <div class="silo_container">

            @foreach($primesilos as $key=>$primesilo)
                <div class="silo" id="silo{{ $key+1 }}">
                    <div class="silo_number">{{ $key+1 }}</div>
                    <div class="silo_number">{{ $primesilo->resource->name}}</div>
                    <?php
                    $amount = $primesilo->weight;
                    ?>
                    <div class="silo_fill">
                        <div class="silo_filled">{{ $primesilo->weight }}<span class="ton">kg/m³</span></div>
                    </div>

                    <form action="/primesilos/changeqnty?={{ $primesilo->id }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="editedid" value="{{ $primesilo->id }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="number" min="0" name="quantity" class="mngquantity" maxlength="2"
                               value="{{$primesilo->weight}}" id="resourcenumber{{ $primesilo->id }}">
                    </form>
                    <a href="/primesilos/edit?id={{ $primesilo->id }}" class="aeditbtn">
                        <div class="editbtn">
                            <div class="editbtn_txt">Edit</div>
                        </div>
                    </a>
                </div>

                
            @endforeach
            <div class="silo" id="silo{{ $primesilo->id }}">
                <div class="silo_number">Add Silo</div>

                <div class="add_silo">
                    <a href="/primesilos/create" class="additem" id="">+</a>
                </div>
            </div>
        </div>
@endsection