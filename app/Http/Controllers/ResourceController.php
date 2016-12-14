<?php

namespace App\Http\Controllers;

use App\Notifications\AddResourceNotification;
use App\Resource;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Input;
use Auth;
use Image;
use File;




use App\Http\Requests;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = \App\Resource::All();
        $data['resources'] = $resources;
        return view('focus/resources', $data);
    }

    public function create()
    {
        return view('focus/addresource');

    }

    public function edit()
    {
        $resource = \App\Resource::findOrFail(Input::get('id'));
        $data['resource'] = $resource;
        return view('focus/editresource', $data);

    }

    public function addresource()
    {
        try {
            // add resource
            $resource = new Resource;
            $resource->name = Input::get('resourcename');
            $resource->quantity = Input::get('resourceqnty');
            $resource->save();

            $resources = \App\Resource::All();
            $data['resources'] = $resources;
            $post = $resource->name;
            $user = Auth::user();
            $user->notify(new AddResourceNotification($post));
            \Session::flash('flash_message', 'The resource has been added');
            return view('focus/resources', $data);
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }



    }

    public function editresource()
    {
        try {
            // edit resource
            $resource = \App\Resource::findOrFail(Input::get('editedid'));
            $resource->name = Input::get('resourcename');
            $resource->save();

            $resources = \App\Resource::All();
            $data['resources'] = $resources;
            \Session::flash('flash_message', 'The resource has been edited');
            return view('focus/resources', $data); //
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }
    
    public function editquantity()
    {
        try {
            // edit resource
            $resource = \App\Resource::findOrFail(Input::get('editedid'));
            $resource->quantity = Input::get('quantity');
            $resource->save();

            $resources = \App\Resource::All();
            $data['resources'] = $resources;
            $date = date('Y-m-d H:i:s');
            $log = new Log;
            $log->date = $date;
            $log->data_type = 'resource';
            $log->object_id = Input::get('editedid');
            $log->quantity = Input::get('quantity');
            $log->percentage = 0;
            $log->message = 'Changed resource '. Input::get('editedid') . ' to ' . Input::get('quantity') . ' ton';
            $log->save();
            \Session::flash('flash_message', 'The resource quantity has been changed');
            return view('focus/resources', $data); //
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }

    public function editquantityplus()
    {
        try {
            // edit resource
            $resource = \App\Resource::findOrFail(Input::get('editedid'));
            $resource->quantity = Input::get('editedqnty') + 1;
            $resource->save();

            $resources = \App\Resource::All();
            $data['resources'] = $resources;
            $date = date('Y-m-d H:i:s');
            $date = date('Y-m-d H:i:s');
            $log = new Log;
            $log->date = $date;
            $log->data_type = 'resource';
            $log->object_id = Input::get('editedid');
            $log->quantity = Input::get('quantity') +1;
            $log->percentage = 0;
            $log->message = 'Changed resource '. Input::get('editedid') . ' to ' . (Input::get('quantity')+1) . ' ton';
            $log->save();
            \Session::flash('flash_message', 'The resource quantity has been changed');
            return view('focus/resources', $data); //
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }

    public function editquantityminus()
    {
        try {
            // edit resource
            $resource = \App\Resource::findOrFail(Input::get('editedid'));
            $resource->quantity = Input::get('editedqnty') - 1;
            $resource->save();

            $resources = \App\Resource::All();
            $data['resources'] = $resources;
            $date = date('Y-m-d H:i:s');
            $log = new Log;
            $log->date = $date;
            $log->data_type = 'resource';
            $log->object_id = Input::get('editedid');
            $log->quantity = Input::get('quantity')-1;
            $log->percentage = 0;
            $log->message = 'Changed resource '. Input::get('editedid') . ' to ' . (Input::get('quantity')-1) . ' ton';
            $log->save();
            \Session::flash('flash_message', 'The resource quantity has been changed');
            return view('focus/resources', $data); //
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }

    public function deleteresource(){
        try {
            // add resource
            \App\Resource::findOrFail(Input::get('deletedid'))->delete();



            $prime = \App\PrimeSilo::All();
            $data['primesilos'] = $prime;
            $resources = \App\Resource::All();
            $data2['resources'] = $resources;
            //  $post = $resource->name;
            //$user = Auth::user();
            //$user->notify(new AddResourceNotification($post));
            \Session::flash('flash_message', 'The resource has been deleted');
            return view('focus/resources', $data, $data2);

        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }

    public function update_icon(Request $request){
        try {
            if($request->hasFile('icon')){
                $icon = $request->file('icon');
                $filename= time() . '.' .$icon->getClientOriginalExtension();
                $path = public_path('uploads/icons/' . $filename);
                Image::make($icon->getRealPath())->resize(200, 200)->save($path);

                $resource = \App\Resource::findOrFail(Input::get('editedid'));
                $resource->icon = $filename;
                $resource->save();
            }
            \Session::flash('flash_message', 'The resource icon has been changed');
            return redirect('resources')->with('feedbackicon', 'Icon succesfully changed.');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }

    public function delete_icon(){
        try {
            $resource = \App\Resource::findOrFail(Input::get('deletedid'));

            File::delete('uploads/icons/' . $resource->icon);

            $resource->icon = "f21MB-n.jpg";
            $resource->save();
            \Session::flash('flash_message', 'The resource icon has been deleted');
            return redirect('resources')->with('feedbackicon', 'Icon succesfully deleted.');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('resources');
        }

    }
}

