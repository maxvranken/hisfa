@extends('layouts/hisfa')

@section('assets')
    <link rel="stylesheet" href="{{ URL::asset('css/old_main.css') }}">
@endsection

@section('content')

    <div class="material focus">
        <div class="material_loader"></div>
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="">Foam Stock</a>
            <p class="selected_foamtype">{{$selected}}</p>
            <a class="edit_foams" href="/foams">EDIT FOAM TYPES</a>
            <button class="show_drop"><span></span></button>
            <ul class="drop">
                @foreach($foamtypes as $foamtype)
                    <li value="{{$foamtype->id}}">{{$foamtype->name}}</li>
                @endforeach
            </ul>
        </div>
        <div class="material_data" id="material_data">
            <div class="stock_container">
                @foreach($blocks as $key=>$block)
                    <div class='stock_item'>

                        <div class='length' id='length" . $count . "'>
                            <div class='mtrl_length'>{{$block->length}}m</div>
                        </div>

                        <form class='remove_length_form' method='post'>
                            <input type='hidden' name='editedid' value='{{$block->id}}'>
                            <input type='hidden' name='foamid' value='{{$block->foam_type_id}}'>
                            <input type='hidden' name='_method' value='PUT'>
                            <input type='hidden' name='_token' value='{{csrf_token()}}'>
                            <button class='remove_length' formaction='/foam/removelength'>Remove length</button>
                        </form>

                        <?php
                        $amount = $block->quantity;
                        $mass = round(1.03 * 1.29 * $block->length * $block->quantity, 1);
                        ?>

                        <div class='stock' id='stock{{$key}}'>
                            <div class='number_stock'>
                                <span class='number'>{{$amount}}</span>
                                <span class='st'>st</span>
                            </div>
                            <div class='volume_stock'>
                                <span class='number'>{{$mass}}</span>
                                <span class='m3'>m³</span>
                            </div>
                        </div>

                        <form class='change_foam_form' method='post'>
                            <input type='text' name='number' placeholder='amount'>
                            <input type='hidden' name='editedid' value='{{$block->id}}'>
                            <input type='hidden' name='_method' value='PUT'>
                            <input type='hidden' name='_token' value='{{csrf_token()}}'>

                            <div class='edit_amount'>
                                <button class='add_amount' formaction='/foam/qntyplus'>Add</button>
                                <button class='remove_amount' formaction='/foam/qntymin'>Remove</button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class='stock_item add'>
                    <div class='length'>
                        <div class='mtrl_length'> add length</div>
                    </div>
                    <div class='stock'>
                        <form method="post" action='/foam/newlength' class="change_foam_form add_length">
                            <div><input type="text" name="length" placeholder="length (m)"></div>
                            <input type="hidden" name="foamid" value="{{$selectedId}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection