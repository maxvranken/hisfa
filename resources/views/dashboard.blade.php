@extends('layouts/hisfa')

@section('content')
    <div class="prime">
        <div class="prime_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #4ebda9;"></div>
            <p>Primesilo's</p>
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
            <p>Wastesilo's</p>
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
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <p class="selected_foamtype">P15</p>
            <?php $foamtype_names = array (); ?>
            @foreach($foamtypes as $foamtype)
                <?php array_push($foamtype_names, $foamtype->name); ?>
            @endforeach
            {{ Form::open(array('url' => '', 'class' => 'material_form')) }}
                {{
                    Form::select('foamtypes', $foamtype_names)
                }}
            {{ Form::close() }}
        </div>
        <div class="length_container">
            <div class="length" id="length1">
                <div class="mtrl_length">12m</div>
            </div>

            <div class="length" id="length2">
                <div class="mtrl_length">8m</div>
            </div>

            <div class="length" id="length3">
                <div class="mtrl_length">6m</div>
            </div>

            <div class="length" id="length4">
                <div class="mtrl_length">4m</div>
            </div>
        </div>
        <div class="stock_container">
            <div class="stock">
                <div class="number_stock">16<span class="st">st</span></div>
                <div class="volume_stock">100<span class="m3">m³</span></div>
            </div>
            <div class="stock">
                <div class="number_stock">8<span class="st">st</span></div>
                <div class="volume_stock">50<span class="m3">m³</span></div>
            </div>
            <div class="stock">
                <div class="number_stock">23<span class="st">st</span></div>
                <div class="volume_stock">265<span class="m3">m³</span></div>
            </div>
            <div class="stock">
                <div class="number_stock">4<span class="st">st</span></div>
                <div class="volume_stock">15<span class="m3">m³</span></div>
            </div>
        </div>
    </div>

    <div class="log">
        <div class="log_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #745FA4;"></div>
            <p>Latest Logs</p>
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
            <p>Resources</p>
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
                <div class="resource_number_stock">16<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock">16<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock">8<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock">23<span class="ton">ton</span></div>
            </div>
            <div class="stock">
                <div class="resource_number_stock">4<span class="ton">ton</span></div>
            </div>
        </div>
    </div>
@endsection