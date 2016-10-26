<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LogsController extends Controller
{
    public function index(){
        $logs = \App\Log::all();
        $primelogs = \App\Log::all()->where('data_type', 'prime')->sortByDesc('created_at');
        $siloaddlogs = \App\Log::all()->where('data_type', 'siloadd');
        $silodeletelogs = \App\Log::all()->where('data_type', 'silodelete');
        $wastelogs = \App\Log::all()->where('data_type', 'waste');
        $resourcelogs = \App\Log::all()->where('data_type', 'resource');
        $resourceaddlogs = \App\Log::all()->where('data_type', 'resourceadd');
        $resourcedeletelogs = \App\Log::all()->where('data_type', 'resourcedelete');
        $data['logs'] = $logs;
        $data['siloaddlogs'] = $siloaddlogs;
        $data['silodeletelogs'] = $silodeletelogs;
        $data['primelogs'] = $primelogs;
        $data['wastelogs'] = $wastelogs;
        $data['resourcelogs'] = $resourcelogs;
        $data['resourceaddlogs'] = $resourceaddlogs;
        $data['resourcedeletelogs'] = $resourcedeletelogs;
        return view('focus/logs', $data);
    }
}
