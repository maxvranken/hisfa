<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class FoamController extends Controller
{
    public function index(){
        // alle foam types meegeven
        $foamtypes = \App\FoamType::all();
        $data['foamtypes'] = $foamtypes;

        // eerste blokken meegeven
        $blocks = \App\Block::where('foamType_id', 1)->get();
        $data['blocks'] = $blocks;

        return view('focus/foam', $data);
    }

    public function ajax(){
        $id = $_GET['id'];
        $blocks = \App\Block::where('foamType_id', $id)->get();
        return response()->json($blocks);
    }
}
