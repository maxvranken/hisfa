<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LogsController extends Controller
{
    public function index(){
        $logs = \App\Log::All();
        $primelogs = \App\Log::All()->where('data_type','prime');
        $wastelogs = \App\Log::All()->where('data_type','waste');
        $resourcelogs = \App\Log::All()->where('data_type','resource');
        //$primelogs =
        $data['logs'] = $logs;
        $data['primelogs'] = $primelogs;
        $data['wastelogs'] = $wastelogs;
        $data['resourcelogs'] = $resourcelogs;
        return view('focus/logs', $data);
    }
}
