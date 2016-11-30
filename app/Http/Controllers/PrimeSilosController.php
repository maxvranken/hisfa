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
use Mockery\CountValidator\Exception;

class PrimeSilosController extends Controller
{
    public function index()
    {
        if(Auth::user()->can('view prime silos')) {
            $primesilos = \App\PrimeSilo::All();
            $data['primesilos'] = $primesilos;
            return view('focus/primesilos', $data);
        }else{
            return redirect('/');
        }
    }

    public function create()
    {
        try{
            if(Auth::user()->can('edit prime silos')) {
                // alle prime silos meegeven
                $primesilos = \App\PrimeSilo::All();
                $data['primesilos'] = $primesilos;
                $resources = \App\Resource::All();
                $data2['resources'] = $resources;
                return view('focus/addprimesilo', $data, $data2);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }


    }

    public function addprimesilo()
    {
        try{
            if(Auth::user()->can('edit prime silos')) {
                // add primesilo
                $prime = new PrimeSilo;
                $prime->resource_id = Input::get('resourceid');
                $prime->quantity = '0';
                $prime->save();

                $primesilos = \App\PrimeSilo::All();
                $data['primesilos'] = $primesilos;
                \Session::flash('flash_message', 'The prime silo has been created');
                return view('focus/primesilos', $data);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }

    }

    public function editquantity()
    {
        try{
            if(Auth::user()->can('edit prime silos')) {
                // edit resource
                $prime = \App\PrimeSilo::findOrFail(Input::get('editedid'));
                $prime->quantity = Input::get('quantity');
                $prime->save();

                if ($prime->quantity >= 90) {
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
                $log->message = 'Changed prime '. Input::get('editedid') . ' to ' . Input::get('quantity') . ' pcs';
                $log->save();
                \Session::flash('flash_message', 'The prime silo quantity has been changed');
                return view('focus/primesilos', $data, $data2);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }

    }

    public function edit(){
        try {
            if(Auth::user()->can('edit prime silos')) {
                // edit primesilos
                $prime = \App\PrimeSilo::findOrFail(Input::get('id'));
                $data['primesilos'] = $prime;
                $resources = \App\Resource::All();
                $data2['resources'] = $resources;
                \Session::flash('flash_message', 'The prime silo has been edited');
                return view('focus/editprime', $data, $data2);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }

    }

    public function editprime()
    {
        try {
            if(Auth::user()->can('edit prime silos')) {
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
                \Session::flash('flash_message', 'The prime silo resource has been edited');
                return view('focus/primesilos', $data, $data2);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }


    }

    public function deleteprime(){
        try {
            if(Auth::user()->can('edit prime silos')) {
                // add resource
                \App\PrimeSilo::findOrFail(Input::get('editedid'))->delete();

                $prime = \App\PrimeSilo::All();
                $data['primesilos'] = $prime;
                $resources = \App\Resource::All();
                $data2['resources'] = $resources;
                //  $post = $resource->name;
                //$user = Auth::user();
                //$user->notify(new AddResourceNotification($post));
                \Session::flash('flash_message', 'The prime silo has been deleted');
                return view('focus/primesilos', $data, $data2);

            }else{
                return redirect('/');
            }
        } catch(Exception $e) {
            \Session::flash('flash_error', $e);
        }



    }
}
