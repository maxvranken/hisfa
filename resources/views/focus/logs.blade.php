@extends('layouts/hisfa')

@section('content')

    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Prime Logs</a>
        </div>
        <div class="log_logs">
        @foreach($primelogs as $primelog)
        <div class="log_log_focus" id="primelog{{ $primelog->id }}_focus">
            <span class="log_timestamp_focus">{{ $primelog->created_at }}</span>
            <span class="log_text_focus">Changed prime silo {{ ' ' . $primelog->object_id . ' to ' . $primelog->percentage . ' %' }}</span>
        </div>
        @endforeach
        </div>
    </div>

    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Silo Logs</a>
        </div>
        <div class="log_logs">
        @foreach($siloaddlogs as $siloaddlog)
            <div class="log_log_focus" id="primelog{{ $siloaddlog->id }}_focus">
                <span class="log_timestamp_focus">{{ $siloaddlog->created_at }}</span>
                <span class="log_text_focus">Added prime silo {{ ' ' . $siloaddlog->object_id }}</span>
            </div>
        @endforeach
        @foreach($silodeletelogs as $silodeletelog)
            <div class="log_log_focus" id="primelog{{ $silodeletelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $silodeletelog->created_at }}</span>
                <span class="log_text_focus">Deleted prime silo {{ ' ' . $silodeletelog->object_id }}</span>
            </div>
        @endforeach
        </div>
    </div>
    <div class="log_focus">
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
    </div>

    <div class="log_focus">
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

    <div class="log_focus">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">New/deleted Resources</a>
        </div>
        @foreach($resourceaddlogs as $resourceaddlog)
            <div class="log_log_focus" id="wastelog{{ $resourceaddlog->id }}_focus">
                <span class="log_timestamp_focus">{{ $resourceaddlog->created_at }}</span>
                <span class="log_text_focus">Added resource {{ ' ' . $resourceaddlog->object_id }}</span>
            </div>
        @endforeach
        @foreach($resourcedeletelogs as $resourcedeletelog)
            <div class="log_log_focus" id="wastelog{{ $resourcedeletelog->id }}_focus">
                <span class="log_timestamp_focus">{{ $resourcedeletelog->created_at }}</span>
                <span class="log_text_focus">Added resource {{ ' ' . $resourcedeletelog->object_id }}</span>
            </div>
        @endforeach
    </div>
@endsection