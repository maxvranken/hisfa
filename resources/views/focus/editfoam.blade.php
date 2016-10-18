@extends('layouts/hisfa')

@section('content')
    <div class="material foams focus">
        <div class="material_title">
            <div class="title_dot" style="width: 10px; height: 10px; background-color: #FBD046;"></div>
            <a href="/foams">Foam Types</a>
        </div>
        <ul>
            @foreach($foamtypes as $foamtype)
                <li value="{{$foamtype->id}}">
                    <p>{{$foamtype->name}}</p>
                    <div class="edit_this_foam">
                        <form method="post" action="/foams/edittype">
                            <input type="hidden" name="editedid" value="{{$foamtype->id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" name="name" value="{{$foamtype->name}}">
                            <button>Rename</button>
                        </form>
                        <form method="post" action="/foams/deletetype">
                            <input type="hidden" name="editedid" value="{{$foamtype->id}}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button>Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
            <li>
                <p>Add foam type</p>
                <div class="edit_this_foam">
                    <form method="post" action="/foams/createtype">
                        <input type="text" name="name">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button>Add</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
@endsection