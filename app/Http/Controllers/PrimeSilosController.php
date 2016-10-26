<?php

namespace App\Http\Controllers;

use App\PrimeSilo;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Notifications\PrimeSilo90Notification;
use Carbon\Carbon;

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
        // alle prime silos meegeven
        $primesilos = \App\PrimeSilo::All();
        $data['primesilos'] = $primesilos;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;

        return view('focus/addprimesilo', $data, $data2);

    }

    public function addprimesilo()
    {

        // add primesilo
        $prime = new PrimeSilo;
        $prime->resource_id = Input::get('resourceid');
        $prime->quantity = '0';
        $prime->save();

        $primesilos = \App\PrimeSilo::All();
        $data['primesilos'] = $primesilos;
        return view('focus/primesilos', $data);
    }

    public function editquantity()
    {
        // edit resource
        $prime = \App\PrimeSilo::findOrFail(Input::get('editedid'));
        $prime->quantity = Input::get('quantity');
        $prime->save();

        if($prime->quantity >= 90){
            $post = $prime->id;
            $post2 = $prime->resource->name;
            $post3 = $prime->quantity;
            $user = Auth::user();
            $user->notify(new PrimeSilo90Notification($post, $post2, $post3));
        }

        $prime = \App\PrimeSilo::All();
        $data['primesilos'] = $prime;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;
        $date = date('Y-m-d H:i:s');
        $log = new Log;
        $log->date = $date;
        $log->data_type = 'prime';
        $log->object_id = Input::get('editedid');
        $log->quantity = 0.00;
        $log->percentage = Input::get('quantity');
        $log->save();

        return view('focus/primesilos', $data, $data2);
    }

    public function edit(){
        // edit primesilos
        $prime = \App\PrimeSilo::findOrFail(Input::get('id'));
        $data['primesilos'] = $prime;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;
        return view('focus/editprime', $data, $data2);
    }

    public function editprime()
    {
        // add resource
        $prime = \App\PrimeSilo::findOrFail(Input::get('editedid'));
        $prime->resource_id = Input::get('resourceid');
        $prime->save();

        $prime = \App\PrimeSilo::All();
        $data['primesilos'] = $prime;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;
      //  $post = $resource->name;
        //$user = Auth::user();
        //$user->notify(new AddResourceNotification($post));
        return view('focus/primesilos', $data, $data2);


    }

    public function deleteprime(){
        // add resource
       \App\PrimeSilo::findOrFail(Input::get('editedid'))->delete();



        $prime = \App\PrimeSilo::All();
        $data['primesilos'] = $prime;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;
        //  $post = $resource->name;
        //$user = Auth::user();
        //$user->notify(new AddResourceNotification($post));
        return view('focus/primesilos', $data, $data2);

    }
}
