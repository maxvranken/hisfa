<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Log;
use Carbon\Carbon;
use App\Notifications\WasteSilo90Notification;

use App\Http\Requests;

class WasteSilosController extends Controller
{
    public function index()
    {
        if(Auth::user()->can('view waste silos')) {
            $wastesilos = \App\WasteSilo::All();
            $data['wastesilos'] = $wastesilos;
            return view('focus/wastesilos', $data);
        }else{
            return redirect('/');
        }
    }

    public function editquantity()
    {
        if(Auth::user()->can('edit waste silos')) {
            // edit resource
            $waste = \App\WasteSilo::findOrFail(Input::get('editedid'));
            $waste->percentage = Input::get('percentage');
            $waste->save();

            if ($waste->percentage >= 90) {
                $post = $waste->id;
                $post2 = $waste->resource->name;
                $post3 = $waste->percentage;
                $user = Auth::user();
                $user->notify(new WasteSilo90Notification($post, $post2, $post3));
            }

            $waste = \App\WasteSilo::All();
            $data['wastesilos'] = $waste;
            $resources = \App\Resource::All();
            $data2['resources'] = $resources;
            $date = date('Y-m-d H:i:s');
            $log = new Log;
            $log->date = $date;
            $log->data_type = 'waste';
            $log->object_id = Input::get('editedid');
            $log->quantity = 0.00;
            $log->percentage = Input::get('percentage');
            $log->save();
            return view('focus/wastesilos', $data, $data2);
        }else{
            return redirect('/');
        }
    }

    public function edit()
    {
        if(Auth::user()->can('edit waste silos')) {
            // edit wastesilos
            $waste = \App\WasteSilo::findOrFail(Input::get('id'));
            $data['wastesilos'] = $waste;
            $resources = \App\Resource::All();
            $data2['resources'] = $resources;
            return view('focus/editwaste', $data, $data2);
        }else{
            return redirect('/');
        }
    }

    public function editwaste()
    {
        if(Auth::user()->can('edit waste silos')) {
            // add resource
            $waste = \App\WasteSilo::findOrFail(Input::get('editedid'));
            $waste->resource_id = Input::get('resourceid');
            $waste->save();

            $waste = \App\WasteSilo::All();
            $data['wastesilos'] = $waste;
            $resources = \App\Resource::All();
            $data2['resources'] = $resources;
            return view('focus/wastesilos', $data, $data2);
        }else{
            return redirect('/');
        }
    }
}
