@extends('layouts/hisfa')

@section('content')
    <section class="prime_silos">
        <a href="{{ url('/primesilos') }}" class="title"><span class="dot bluegreen"></span>Primesilo's</a>
        <ul>
            @foreach($primes as $key=>$primesilo)
                <li id="silo{{ $key+1 }}">
                    <p>{{ $key+1 }}</p>
                    <p>{{ $primesilo->resource->name }}</p>
                    <div class="silo_filled">
                        <p>{{ $primesilo->quantity }} ton</p>
                        <p class='number'>{{round(1.03 * 1.29 * 1 * $primesilo->quantity, 1)}} m³</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="waste_silos">
        <a href="{{ url('/wastesilos') }}" class="title"><span class="dot orange"></span>Wastesilo's</a>
        <ul>
            @foreach($wastes as $waste)
                <li id="wsilo{{ $waste->id }}">
                    <p>{{ $waste->name }}</p>
                    <div style="height: {{ 100-$waste->percentage }}%;"></div>
                </li>
            @endforeach
        </ul>
    </section>

    <section class="foam_stock">
        <div class="title">
            <a href="{{ url('/foam') }}"><span class="dot yellow"></span>Foam stock</a>
            <p class="selected">{{$foamtypes->first()->name}}</p>
            <button class="show_drop"></button>
            <ul class="drop">
                @foreach($foamtypes as $foamtype)
                    <li value="{{$foamtype->id}}"> {{$foamtype->name}} </li>
                @endforeach
            </ul>
        </div>
        <span class="scroll"><span></span></span>
        <ul class="blocks" id="blocks">
            @foreach($blocks as $key=>$block)
                <li>
                    <p>{{ $block->length }}<span>m</span></p>
                    <p>{{ $block->quantity }}<span>pc</span></p>
                    <p>{{round(1.03 * 1.29 * $block->length * $block->quantity, 1)}}<span>m³</span></p>
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
                    <p>{{ $resource->name }}</p>
                    <p>{{ $resource->quantity }}<span>ton</span></p>
                </li>
            @endforeach
        </ul>
    </section>
@endsection