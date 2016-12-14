@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/old_main.css') }}">
@endsection

@section('content')


    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Prime Logs</a>
        </div>
        @foreach($primelogs as $primelog)
        <div class="log_log_focus" id="primelog{{ $primelog->id }}_focus">
            <span class="log_timestamp_focus">{{ $primelog->created_at }}</span>
            <span class="log_text_focus">{{ $primelog->message }}</span>
        </div>
        @endforeach
        <br>
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Waste Logs</a>
        </div>
        @foreach($wastelogs as $wastelog)
            <div class="log_log_focus" id="wastelog{{ $wastelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $wastelog->created_at }}</span>
                <span class="log_text_focus">{{ $wastelog->message }}</span>
            </div>
        @endforeach
        <br>
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Resource Logs</a>
        </div>
        @foreach($resourcelogs as $resourcelog)
            <div class="log_log_focus" id="resourcelog{{ $resourcelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $resourcelog->created_at }}</span>
                <span class="log_text_focus">{{ $resourcelog->message }}</span>
            </div>
        @endforeach
        <br>
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Foam Logs</a>
        </div>
        @foreach($foamlogs as $foamlog)
            <div class="log_log_focus" id="foamlog{{ $foamlog->id }}_focus">
                <span class="log_timestamp_focus">{{ $foamlog->created_at }}</span>
                <span class="log_text_focus">{{ $foamlog->message }}</span>
            </div>
        @endforeach
    </div>
@endsection