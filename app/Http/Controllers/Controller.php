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
        $recourses = \App\Resource::all();
        $data['recources'] = $recourses;

        // alle logs meegeven
        $logs = \App\Log::all();
        $data['logs'] = $logs;

        // eerste blokken meegeven
        $blocks = \App\Block::where('foamType_id', 1)->get();
        $data['blocks'] = $blocks;

        return view('dashboard', $data);
    }
}
/*

@foreach($students as $student)
        <p>{{ $student->email }}</p>
@endforeach

*/