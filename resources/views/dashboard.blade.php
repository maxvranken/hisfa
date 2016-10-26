@extends('layouts/hisfa')

@section('content')
    <div class="prime">
        <a href="/primesilos" class="linkstyleremove">
            <div class="prime_title">
                <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
                <p>Primesilo's</p>
            </div>

            <div class="silo_container">
                @foreach($primes as $key=>$primesilo)
                    <div class="silo" id="silo{{ $key+1 }}">
                        <div class="silo_number">{{ $key+1 }}</div>
                        <div class="silo_fill">
                            <div class="silo_filled" style="height: calc(100% - {{ $primesilo->quantity }}%);"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </a>
    </div>

    <div class="waste dashboard">
        <a href="/wastesilos" class="linkstyleremove">
            <div class="waste_title">
                <div class="title_dot" style="width: 10px; height: 10px; background-color: #e14c27;"></div>
                <p>Wastesilo's</p>
            </div>
            <div class="silo_container">
                @foreach($wastes as $waste)
                    <div class="wsilo" id="wsilo{{ $waste->id }}">
                        <div class="silo_number">{{ $waste->id }}</div>
                        <div class="wsilo_fill">
                            <div id="wsilo_filled1" style="height: {{ 100-$waste->percentage }}%;"></div>
                        </div>
                    </div>
                @endforeach


            </div>
        </a>
    </div>
    <div class="material dashboard">
        <div class="material_loader"></div>
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="/foam/1" id="foamlink">Foam Stock</a>
            <p class="selected_foamtype">{{$foamtypes->first()->name}}</p>
            <button class="show_drop"><span></span></button>
            <ul class="drop">
                @foreach($foamtypes as $foamtype)
                    <li value="{{$foamtype->id}}">{{$foamtype->name}}</li>
                @endforeach
            </ul>
        </div>
        @if (count($blocks) > 4)
            <div class="material_scroll">
                <div></div>
            </div>
        @endif
        <div class="material_data dragscroll" id="material_data">
            <div class="length_container">
                <?php $count = 0;?>
                @foreach($blocks as $block)
                    <?php
                    $count++;
                    echo "<div class='length' id='length" . $count . "'>";
                    echo "<div class='mtrl_length'>" . $block->length . "m</div></div>";
                    ?>
                @endforeach
            </div>
            <div class="stock_container">
                <?php $count = 0;?>
                @foreach($blocks as $block)
                    <?php
                    $count++;
                    $amount = $block->quantity;
                    $mass = round(1.03 * 1.29 * $block->length * $block->quantity, 1);
                    echo "<div class='stock' id='stock" . $count . "'><div class='number_stock'><span class='number'>";
                    echo $amount . "</span><span class='st'>st</span></div><div class='volume_stock'><span class='number'>";
                    echo $mass . "</span><span class='m3'>m³</span></div></div>";
                    ?>
                @endforeach
            </div>
        </div>
    </div>

    <div class="log">
        <a href="/logs" class="linkstyleremove">
            <div class="log_title">
                <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
                <p>Latest Logs</p>
            </div>

            <div class="log_group linkstyleremove">
                @foreach($logs as $log)
                    <div class="log_log" id="log{{$log->id}}">
                        <span class="log_timestamp">{{ $log->created_at }}</span>
                        <span class="log_text">Changed{{ ' ' . $log->data_type . ' ' . $log->object_id}}</span>
                    </div>
                @endforeach
            </div>
        </a>
    </div>

    <div class="resource dashboard">
        <a href="/resources" class="linkstyleremove">
            <div class="resource_title">
                <div class="title_dot" style="width: 10px; height: 10px; background-color: #51B8F2;"></div>
                <p>Resources</p>
            </div>
            <div class="resource_container">
                    @foreach($resources as $resource)
                        <div class="resourcetype" id="resource{{ $resource->id }}">
                            <div class="rsrcetype">{{ $resource->name }}</div>
                        </div>
                @endforeach
            </div>
            <div class="resource_stock_container">
                @foreach($resources as $resource)
                    <div class="stock">
                        <div class="resource_number_stock dashboard">{{ $resource->quantity }}<span
                                    class="ton">ton</span>
                        </div>
                    </div>
                @endforeach

            </div>
        </a>
    </div>
@endsection