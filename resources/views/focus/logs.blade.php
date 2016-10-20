@extends('layouts/hisfa')

@section('content')

    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Prime silo Logs</a>
        </div>
        @foreach($primelogs as $primelog)
        <div class="log_log_focus" id="log1_focus">
            <span class="log_timestamp_focus">{{ $primelog->created_at }}</span>
            <span class="log_text_focus">Changed to {{ $primelog->percentage }}</span>
        </div>
        @endforeach
        <!--<div class="log_log_focus" id="log2_focus">
            <span class="log_timestamp_focus">01/01/16 11:16</span>
            <span class="log_text_focus">P15 (4m) +1st</span>
        </div>
        <div class="log_log_focus" id="log3_focus">
            <span class="log_timestamp_focus">01/01/16 11:16</span>
            <span class="log_text_focus">P15 (4m) +1st</span>
        </div>
        <div class="log_log_focus" id="log4_focus">
            <span class="log_timestamp_focus">01/01/16 11:16</span>
            <span class="log_text_focus">P15 (4m) +1st</span>
        </div>-->
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Waste silo Logs</a>
        </div>
            @foreach($wastelogs as $wastelog)
                <div class="log_log_focus" id="log1_focus">
                    <span class="log_timestamp_focus">{{ $wastelog->created_at }}</span>
                    <span class="log_text_focus">Changed to {{ $wastelog->percentage }}</span>
                </div>
            @endforeach
            <div class="log_title">
                <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
                <a href="/logs">Resource Logs</a>
            </div>
            @foreach($resourcelogs as $resourcelog)
                <div class="log_log_focus" id="log1_focus">
                    <span class="log_timestamp_focus">{{ $resourcelog->created_at }}</span>
                    <span class="log_text_focus">Changed to {{ $resourcelog->percentage }}</span>
                </div>
            @endforeach
    </div>
@endsection