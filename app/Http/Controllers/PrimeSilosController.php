<?php

namespace App\Http\Controllers;

use App\PrimeSilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

use App\Http\Requests;

class PrimeSilosController extends Controller
{
    public function index()
    {
        $primesilos = \App\PrimeSilo::All();
        $data['primesilos'] = $primesilos;
        return view('focus/primesilos', $data);
    }

    public function create()
    {
        return view('focus/Addprimesilo');

    }

    public function addprimesilo()
    {
        // add primesilo
        $prime = new PrimeSilo;
        $prime->name = Input::get('primename');
        $resource->quantity = Input::get('resourceqnty');
        $resource->save();

        $resources = \App\Resource::All();
        $data['resources'] = $resources;
        return view('focus/resources', $data);
    }
}
