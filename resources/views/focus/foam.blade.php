@extends('layouts/hisfa')

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
                <?php $count = 0;?>
                @foreach($blocks as $block)
                    <?php
                    $count++;
                    echo "<div class='stock_item'>";

                    echo "<div class='length' id='length" . $count . "'>";
                    echo "<div class='mtrl_length'>" . $block->length . "m</div></div>";

                    $amount = $block->quantity;
                    $mass = round(1.03 * 1.29 * $block->length * $block->quantity, 1);
                    echo "<div class='stock' id='stock" . $count . "'><div class='number_stock'><span class='number'>";
                    echo $amount . "</span><span class='st'>st</span></div><div class='volume_stock'><span class='number'>";
                    echo $mass . "</span><span class='m3'>m³</span></div></div>";

                    echo "<form class='change_foam_form' method='post'>";
                    echo "<input type='text' name='number' placeholder='amount' >";
                    echo "<input type='hidden' name='editedid' value='" . $block->id . "'>";
                    echo "<input type='hidden' name='_method' value='PUT'>";
                    echo "<input type='hidden' name='_token' value='" . csrf_token() . "'>";
                    echo "<div class='edit_amount'>";
                    echo "<button class='add_amount' formaction='/foam/qntyplus'>Add</button>";
                    echo "<button class='remove_amount' formaction='/foam/qntymin'>Remove</button></div></form>";

                    echo '</div>';
                    ?>
                @endforeach
                    <div class='stock_item add'>
                        <div class='length'>
                            <div class='mtrl_length'> add length </div>
                        </div>
                        <div class='stock'>
                            <form method="post" action='/foam/newlength' class="change_foam_form add_length">
                                <input type="text" name="length" placeholder="length (m)">
                                <input type="hidden" name="editedid" value="{{$block->id}}">
                                <input type="hidden" name="foamid" value="{{$block->foam_type_id}}">
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