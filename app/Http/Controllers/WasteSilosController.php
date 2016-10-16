<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Notifications\PrimeSilo90Notification;

use App\Http\Requests;

class WasteSilosController extends Controller
{
    public function index()
    {
        $wastesilos = \App\WasteSilo::All();
        $data['wastesilos'] = $wastesilos;
        return view('focus/wastesilos', $data);
    }

    public function editquantity()
    {
        // edit resource
        $waste = \App\WasteSilo::findOrFail(Input::get('editedid'));
        $waste->percentage = Input::get('percentage');
        $waste->save();

        $waste = \App\WasteSilo::All();
        $data['wastesilos'] = $waste;
        return view('focus/wasteSilos', $data);
    }
}
