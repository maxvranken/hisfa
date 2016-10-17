@extends('layouts/hisfa')

@section('content')
    <div class="material foams focus">
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="/foam/edit">Foam Types</a>
        </div>
        <ul>
            @foreach($foamtypes as $foamtype)
                <li value="{{$foamtype->id}}">
                    <p>{{$foamtype->name}}</p>
                    <div class="edit_this_foam">
                        <form>
                            <input type="text" value="{{$foamtype->name}}">
                            <button>Rename</button>
                        </form>
                        <form>
                            <button>Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
            <li>
                <p>Add foam type</p>
                <div class="edit_this_foam">
                    <form>
                        <input type="text">
                        <button>Add</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
@endsection