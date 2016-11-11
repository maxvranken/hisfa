<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // alle foam types meegeven
        $foamtypes = \App\FoamType::all();
        $data['foamtypes'] = $foamtypes;

        // alle prime silos meegeven
        $primes = \App\PrimeSilo::all();
        $data['primes'] = $primes;

        // alle waste silos meegeven
        $wastes = \App\WasteSilo::all();
        $data['wastes'] = $wastes;

        // alle resources meegeven
        $resources = \App\Resource::all();
        $data['resources'] = $resources;

        // alle logs meegeven
        $logs = \App\Log::all()->sortByDesc('created_at')->take(4);
        $data['logs'] = $logs;

        // eerste blokken meegeven
        $blocks = \App\Block::where('foam_type_id', 1)->orderBy('length')->get();
        $data['blocks'] = $blocks;

        return view('dashboard', $data);
    }
}