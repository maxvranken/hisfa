<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WasteSilosController extends Controller
{
    public function index(){
        return view('focus/wasteSilos');
    }
}
