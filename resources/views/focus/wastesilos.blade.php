@extends('layouts/hisfa')

@section('content')
    <div class="prime_focus">
        <div class="waste_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #e14c27;"></div>
            <a href="/wastesilos">Wastesilo's</a>
        </div>
        <div class="silo_container">
            @foreach($wastesilos as $wastesilo)
                <div class="silo" id="silo{{ $wastesilo->id }}">
                    <div class="silo_number">{{ $wastesilo->name }}</div>
                    <div class="silo_number">{{ $wastesilo->resource->name}}</div>
                    <div class="wsilo_fill" style="background-color:
                            @if ($wastesilo->percentage >= 90)
                                red
                            @else
                                green
                            @endif;">
                        <div class="silo_filled" style="height: calc(100% - {{ $wastesilo->percentage }}%);"></div>
                    </div>


                    <form action="/wastesilos/changeqnty?={{ $wastesilo->id }}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="editedid" value="{{ $wastesilo->id }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="text" name="percentage" class="mngquantity" maxlength="2"
                               value="{{$wastesilo->percentage}}" id="resourcenumber{{ $wastesilo->id }}">
                    </form>
                    <a href="/wastesilos/edit?id={{ $wastesilo->id }}" class="aeditbtn">
                        <div class="editbtn">
                            <div class="editbtn_txt">Edit</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection