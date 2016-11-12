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
        if(Auth::user()->can('view foam stock')) {
            // alle foam types meegeven
            $foamtypes = FoamType::all();
            $data['foamtypes'] = $foamtypes;

            // eerste blokken meegeven
            $blocks = Block::where('foam_type_id', $id)->orderBy('length')->get();
            $data['blocks'] = $blocks;
            $data['selected'] = FoamType::findOrFail($id)->name;
            $data['selectedId'] = FoamType::findOrFail($id)->id;

            return view('focus/foam', $data);
        }else{
            return redirect('/');
        }
    }

    public function ajax(){
        if(Auth::user()->can('view foam stock')) {
            $id = $_GET['id'];
            $blocks = \App\Block::where('foam_type_id', $id)->orderBy('length')->get();
            return response()->json($blocks);
        }else{
            return redirect('/');
        }
    }

    public function edit(){
        if(Auth::user()->can('edit foam stock')) {
            $foamtypes = FoamType::all();
            $data['foamtypes'] = $foamtypes;
            return view('focus/editfoam', $data);
        }else{
            return redirect('/');
        }
    }

    public function qntyplus(){
        if(Auth::user()->can('edit foam stock')) {
            $block = Block::findOrFail(Input::get('editedid'));
            $block->quantity = $block->quantity + Input::get('number');
            $block->save();
            return redirect('/foam/' . $block->foam_type_id);
        }else{
            return redirect('/');
        }
    }

    public function qntymin(){
        if(Auth::user()->can('edit foam stock')) {
            $block = Block::findOrFail(Input::get('editedid'));
            if ($block->quantity - Input::get('number') >= 0) {
                $block->quantity = $block->quantity - Input::get('number');
                $block->save();
            }

            return redirect('/foam/' . $block->foam_type_id);
        }else{
            return redirect('/');
        }
    }

    public function newlength(){
        if(Auth::user()->can('edit foam stock')) {
            $blocks = Block::where([
                ['foam_type_id', '=', Input::get('foamid')],
                ['length', '=', Input::get('length')],
            ])->get();

            if (count($blocks) == 0) {
                $block = new Block;
                $block->length = Input::get('length');
                $block->foam_type_id = Input::get('foamid');
                $block->quantity = 0;
                $block->save();
            }

            return redirect('/foam/' . Input::get('foamid'));
        }else{
            return redirect('/');
        }
    }

    public function removelength(){
        if(Auth::user()->can('edit foam stock')) {
            $block = Block::findOrFail(Input::get('editedid'));
            $block->delete();
            return redirect('/foam/' . Input::get('foamid'));
        }else{
            return redirect('/');
        }
    }

    public function createtype(){
        if(Auth::user()->can('edit foam stock')) {
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
        }else{
            return redirect('/');
        }
    }

    public function edittype(){
        if(Auth::user()->can('edit foam stock')) {
            $foamType = FoamType::findOrFail(Input::get('editedid'));
            $foamType->name = Input::get('name');
            $foamType->save();

            return redirect('/foams');
        }else{
            return redirect('/');
        }
    }

    public function deletetype(){
        if(Auth::user()->can('edit foam stock')) {
            $foamType = FoamType::findOrFail(Input::get('editedid'));
            $foamType->blocks()->delete();
            $foamType->delete();
            return redirect('/foams');
        }else{
            return redirect('/');
        }
    }
}
