<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Block;
use App\FoamType;
use Auth;

class FoamController extends Controller
{
    public function index(){
        return redirect('/foam/1');
    }

    public function show($id){
        // alle foam types meegeven
        $foamtypes = FoamType::all();
        $data['foamtypes'] = $foamtypes;

        // eerste blokken meegeven
        $blocks = Block::where('foam_type_id', $id)->orderBy('length')->get();
        $data['blocks'] = $blocks;
        $data['selected'] = FoamType::findOrFail($id)->name;

        return view('focus/foam', $data);
    }

    public function ajax(){
        $id = $_GET['id'];
        $blocks = \App\Block::where('foam_type_id', $id)->orderBy('length')->get();
        return response()->json($blocks);
    }

    public function edit(){
        $foamtypes = FoamType::all();
        $data['foamtypes'] = $foamtypes;
        return view('focus/editfoam', $data);
    }

    public function qntyplus(){
        $block = Block::findOrFail(Input::get('editedid'));
        $block->quantity = $block->quantity + Input::get('number');
        $block->save();

        return redirect('/foam/' . $block->foam_type_id);
    }

    public function qntymin(){
        $block = Block::findOrFail(Input::get('editedid'));
        if($block->quantity - Input::get('number') >= 0) {
            $block->quantity = $block->quantity - Input::get('number');
            $block->save();
        }

        return redirect('/foam/' . $block->foam_type_id);
    }

    public function newlength(){
        $block = new Block;
        $block->length = Input::get('length');
        $block->foam_type_id = Input::get('foamid');
        $block->quantity = 0;
        $block->save();

        return redirect('/foam/' . $block->foam_type_id);
    }

    public function createtype(){
        $foamType = new FoamType;
        $foamType->name = Input::get('name');
        $foamType->density = 0;
        $foamType->save();

        $block = new Block;
        $block->length = 4;
        $block->foam_type_id = $foamType->id;
        $block->quantity = 0;
        $block->save();

        $block = new Block;
        $block->length = 6;
        $block->foam_type_id = $foamType->id;
        $block->quantity = 0;
        $block->save();

        $block = new Block;
        $block->length = 8;
        $block->foam_type_id = $foamType->id;
        $block->quantity = 0;
        $block->save();

        $block = new Block;
        $block->length = 12;
        $block->foam_type_id = $foamType->id;
        $block->quantity = 0;
        $block->save();

        return redirect('/foams');
    }

    public function edittype(){
        $foamType = FoamType::findOrFail(Input::get('editedid'));
        $foamType->name = Input::get('name');
        $foamType->save();

        return redirect('/foams');
    }

    public function deletetype(){
        $foamType = FoamType::findOrFail(Input::get('editedid'));
        $foamType->blocks()->delete();
        $foamType->delete();

        return redirect('/foams');
    }
}
