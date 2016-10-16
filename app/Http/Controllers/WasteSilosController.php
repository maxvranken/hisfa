<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WasteSilosController extends Controller
{
    public function index()
    {
        $wastesilos = \App\WasteSilo::All();
        $data['wastesilos'] = $wastesilos;
        return view('focus/wastesilos', $data);
    }
}
