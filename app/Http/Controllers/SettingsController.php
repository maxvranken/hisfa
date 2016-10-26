<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;

class SettingsController extends Controller
{
    public function index(){
        return view('/settings');
    }

    public function register(){
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        if(Input::get('admin')) {
            $user->admin = true;
        }else{
            $user->admin = false;
        }
        $user->save();

        return redirect('/settings');
    }
}
