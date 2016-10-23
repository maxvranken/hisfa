@extends('layouts/hisfa')

@section('content')

    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Prime Logs</a>
        </div>
        @foreach($primelogs as $primelog)
        <div class="log_log_focus" id="primelog{{ $primelog->id }}_focus">
            <span class="log_timestamp_focus">{{ $primelog->created_at }}</span>
            <span class="log_text_focus">Changed prime silo {{ ' ' . $primelog->object_id . ' to ' . $primelog->percentage . ' %' }}</span>
        </div>
        @endforeach
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Waste Logs</a>
        </div>
        @foreach($wastelogs as $wastelog)
            <div class="log_log_focus" id="wastelog{{ $wastelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $wastelog->created_at }}</span>
                <span class="log_text_focus">Changed waste silo {{ ' ' . $wastelog->object_id . ' to ' . $wastelog->percentage . ' %' }}</span>
            </div>
        @endforeach
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Resource Logs</a>
        </div>
        @foreach($resourcelogs as $resourcelog)
            <div class="log_log_focus" id="wastelog{{ $resourcelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $resourcelog->created_at }}</span>
                <span class="log_text_focus">Changed resource {{ ' ' . $resourcelog->object_id . ' to ' . $resourcelog->quantity }}</span>
            </div>
        @endforeach
    </div>
@endsection