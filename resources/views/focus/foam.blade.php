@extends('layouts/hisfa')

@section('content')
    <div class="material focus">
        <div class="material_loader"></div>
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="/foam">Foam Stock</a>
            <p class="selected_foamtype">{{$foamtypes->first()->name}}</p>
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
        <div class="stock_container focus">
            <?php $count = 0 ?>
            @foreach($blocks as $block)
                <?php $count++ ?>
                <div class="change_stock">
                    <div class="stock_more">+</div>
                    <div class="stock" id="stock{{$count}}">
                        <div class="number_stock"><span class="number">{{$block->quantity}}</span><span class="st">st</span></div>
                        <div class="volume_stock"><span class="number">{{round(1.03 * 1.29 * $block->length * $block->quantity, 1)}}</span><span class="m3">m³</span></div>
                    </div>
                    <div class="stock_less">-</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection