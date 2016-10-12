<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FoamController extends Controller
{
    public function index(){
        // alle blokken meegeven
        $blocks = \App\Block::all();
        $data['blocks'] = $blocks;

        // alle foam types meegeven
        $foamtypes = \App\FoamType::all();
        $data['foamtypes'] = $foamtypes;

        return view('focus/foam', $data);
    }
}
