<?php

namespace App\Http\Controllers;

use App\PrimeSilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

use App\Http\Requests;

class PrimeSilosController extends Controller
{
    public function index(){
        $primesilos = \App\PrimeSilo::All();
        $data['primesilos'] = $primesilos;
        return view('focus/primesilos', $data);
    }
}
