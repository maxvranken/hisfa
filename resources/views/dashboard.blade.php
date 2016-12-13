@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
@endsection

@section('content')
    <section class="prime_silos">
        <a href="{{ url('/primesilos') }}" class="title"><span class="dot bluegreen"></span>Primesilo's</a>
        <ul>
            @foreach($primes as $key=>$primesilo)
                <li id="silo{{ $key+1 }}">
                    <p class="name">{{ $primesilo->resource->name }}</p>
                    <div class="silo_filled">
                        <p>
                            <span>{{ $primesilo->weight }} <span>kg/m³</span></span>
                        </p>
                        <p>{{ $key+1 }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="waste_silos">
        <a href="{{ url('/wastesilos') }}" class="title"><span class="dot orange"></span>Wastesilo's</a>
        <ul>
            @foreach($wastes as $key=>$waste)
                <li id="wsilo{{ $waste->id }}">
                    <p class="name">{{ $waste->resource->name }}</p>
                    <div>
                        <span class="status" style="height: {{ $waste->percentage }}%;"></span>
                        @if($waste->percentage >= 90) <span class="almost-full"></span> @endif
                        <p>{{ $key+1 }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="foam_stock">
        <div class="title">
            <a href="{{ url('/foam') }}"><span class="dot yellow"></span>Foam stock</a>
            <p class="selected">{{$foamtypes->first()->name}}</p>
            <button class="show_drop"></button>
            <ul class="drop dragscroll">
                @foreach($foamtypes as $foamtype)
                    <li value="{{$foamtype->id}}"> {{$foamtype->name}} </li>
                @endforeach
            </ul>
        </div>
        <span class="scroll"><span></span></span>
        <ul class="blocks dragscroll" id="blocks">
            @foreach($blocks as $key=>$block)
                <li>
                    <p class="name">{{ $block->length }}<span>m</span></p>
                    <div>
                        <p>
                            <span><span>x</span>{{ $block->quantity }}</span>
                            <span>{{round(1.03 * 1.29 * $block->length * $block->quantity, 1)}}m³</span>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="logs">
            <a href="{{ url('/logs') }}" class="title"><span class="dot purple"></span>Logs</a>
            <ul>
                @foreach($logs as $log)
                    <li id="log{{$log->id}}">
                        <p>{{ $log->created_at }} Changed{{ ' ' . $log->data_type . ' ' . $log->object_id}}</p>
                    </li>
                @endforeach
            </ul>
    </section>

    <section class="resources">
        <a href="{{ url('/resources') }}" class="title"><span class="dot blue"></span>Resources</a>
        <ul>
            @foreach($resources as $resource)
                <li id="resource{{ $resource->id }}">
                    <p class="name">{{ $resource->name }}</p>
                    <p>{{ $resource->quantity }}<span> ton</span></p>
                </li>
            @endforeach
        </ul>
    </section>
@endsection