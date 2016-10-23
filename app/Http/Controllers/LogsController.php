<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LogsController extends Controller
{
    public function index(){
        $logs = \App\Log::all();
        $primelogs = \App\Log::all()->where('data_type', 'prime');
        $wastelogs = \App\Log::all()->where('data_type', 'waste');
        $resourcelogs = \App\Log::all()->where('data_type', 'resource');
        $data['logs'] = $logs;
        $data['primelogs'] = $primelogs;
        $data['wastelogs'] = $wastelogs;
        $data['resourcelogs'] = $resourcelogs;
        return view('focus/logs', $data);
    }
}
