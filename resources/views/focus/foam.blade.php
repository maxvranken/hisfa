@extends('layouts/hisfa')

@section('content')
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
@endsection