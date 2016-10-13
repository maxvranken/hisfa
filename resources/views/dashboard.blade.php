@extends('layouts/hisfa')

@section('content')
    <div class="prime">
        <div class="prime_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
            <a href="/primesilos">Primesilo's</a>
        </div>
        <div class="silo_container">
            <div class="silo" id="silo1">
                <div class="silo_number">1</div>
                <div class="silo_fill">
                    <div id="silo_filled1"></div>
                </div>
            </div>
            <div class="silo" id="silo2">
                <div class="silo_number">2</div>
                <div class="silo_fill">
                    <div id="silo_filled2"></div>
                </div>
            </div>
            <div class="silo" id="silo3">
                <div class="silo_number">3</div>
                <div class="silo_fill">
                    <div id="silo_filled3"></div>
                </div>
            </div>
            <div class="silo" id="silo4">
                <div class="silo_number">4</div>
                <div class="silo_fill">
                    <div id="silo_filled4"></div>
                </div>
            </div>
            <div class="silo" id="silo5">
                <div class="silo_number">5</div>
                <div class="silo_fill">
                    <div id="silo_filled5"></div>
                </div>
            </div>
            <div class="silo" id="silo6">
                <div class="silo_number">6</div>
                <div class="silo_fill">
                    <div id="silo_filled6"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="waste">
        <div class="waste_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #e14c27;"></div>
            <a href="/wastesilos">Wastesilo's</a>
        </div>
        <div class="silo_container">
            <div class="wsilo" id="wsilo1">
                <div class="silo_number">1</div>
                <div class="wsilo_fill">
                    <div id="wsilo_filled1"></div>
                </div>
            </div>
            <div class="wsilo" id="wsilo2">
                <div class="silo_number">2</div>
                <div class="wsilo_fill">
                    <div id="wsilo_filled2"></div>
                </div>
            </div>
            <div class="wsilo" id="wsilo3">
                <div class="silo_number">3</div>
                <div class="wsilo_fill">
                    <div id="wsilo_filled3"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="material">
        <div class="material_loader"></div>
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="/foam" class="selected_foamtype">{{$foamtypes->first()->name}}</a>
            <button class="show_drop"></button>
            <ul class="drop">
                @foreach($foamtypes as $foamtype)
                    <li value="{{$foamtype->id}}">{{$foamtype->name}}</li>
                @endforeach
            </ul>
        </div>
        <div class="length_container">
            <?php $count = 0 ?>
            @foreach($blocks as $block)
            <?php $count++ ?>
            <div class="length" id="length{{$count}}">
                <div class="mtrl_length">{{$block->length}}m</div>
            </div>
            @endforeach
        </div>
        <div class="stock_container">
            <?php $count = 0 ?>
            @foreach($blocks as $block)
            <?php $count++ ?>
            <div class="stock" id="stock{{$count}}">
                <div class="number_stock"><span class="number">{{$block->quantity}}</span><span class="st">st</span></div>
                <div class="volume_stock"><span class="number">{{round(1.03 * 1.29 * $block->length * $block->quantity, 1)}}</span><span class="m3">m³</span></div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="log">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <a href="/logs">Latest Logs</a>
        </div>
        <div class="log_log" id="log1">
            <span class="log_timestamp">01/01/16 11:16</span>
            <span class="log_text">P15 (4m) +1st</span>
        </div>
        <div class="log_log" id="log2">
            <span class="log_timestamp">01/01/16 11:16</span>
            <span class="log_text">P15 (4m) +1st</span>
        </div>
        <div class="log_log" id="log3">
            <span class="log_timestamp">01/01/16 11:16</span>
            <span class="log_text">P15 (4m) +1st</span>
        </div>
        <div class="log_log" id="log4">
            <span class="log_timestamp">01/01/16 11:16</span>
            <span class="log_text">P15 (4m) +1st</span>
        </div>
    </div>

    <div class="resource">
        <div class="resource_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
            <a href="/resources">Resources</a>
        </div>
        <div class="resource_container">
            <div class="resourcetype" id="resource1">
                <div class="rsrcetype">f21MB-n</div>
            </div>

            <div class="resourcetype" id="resource2">
                <div class="rsrcetype">RF23W-n</div>
            </div>

            <div class="resourcetype" id="resource3">
                <div class="rsrcetype">KSE-20</div>
            </div>

            <div class="resourcetype" id="resource4">
                <div class="rsrcetype">KSE-30</div>
            </div>

            <div class="resourcetype" id="resource5">
                <div class="rsrcetype">F21B-n</div>
            </div>
        </div>
        <div class="resource_stock_container">
            <div class="stock">
                <div class="resource_number_stock dashboard">16<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock dashboard">16<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock dashboard">8<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock dashboard">23<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock dashboard">4<span class="ton">ton</span></div>
            </div>
        </div>
    </div>
@endsection