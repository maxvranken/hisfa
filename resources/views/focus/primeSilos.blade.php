@extends('layouts/hisfa')

@section('content')
    <div class="prime_focus">
        <div class="prime_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
            <a href="/primesilos">Primesilo's</a>
        </div>
        <div class="silo_container">
            @foreach($primesilos as $primesilo)
                <div class="silo" id="silo{{ $primesilo->id }}">
                    <div class="silo_number">{{ $primesilo->id }}</div>
                    <div class="silo_number">{{ $primesilo->resource->name}}</div>
                    <div class="silo_fill">
                        <div class="silo_filled" style="height: calc(100% - {{ $primesilo->quantity }}%);"></div>
                    </div>
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