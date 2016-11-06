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
        return view('focus/resources', $data);


    }

    public function editresource()
    {
        // edit resource
        $resource = \App\Resource::findOrFail(Input::get('editedid'));
        $resource->name = Input::get('resourcename');
        $resource->save();

        $resources = \App\Resource::All();
        $data['resources'] = $resources;
        return view('focus/resources', $data); //
    }
    
    public function editquantity()
    {
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
        $log->save();
        return view('focus/resources', $data); //
    }

    public function editquantityplus()
    {
        // edit resource
        $resource = \App\Resource::findOrFail(Input::get('editedid'));
        $resource->quantity = Input::get('editedqnty') + 1;
        $resource->save();

        $resources = \App\Resource::All();
        $data['resources'] = $resources;
        $date = date('Y-m-d H:i:s');
        $log = new Log;
        $log->date = $date;
        $log->data_type = 'resource';
        $log->object_id = Input::get('editedid');
        $log->quantity = Input::get('editedqnty') + 1;
        $log->percentage = 0;
        $log->save();
        return view('focus/resources', $data); //
    }

    public function editquantityminus()
    {
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
        $log->quantity = Input::get('editedqnty') - 1;
        $log->percentage = 0;
        $log->save();
        return view('focus/resources', $data); //
    }

    public function deleteresource(){
        // add resource
        \App\Resource::findOrFail(Input::get('deletedid'))->delete();



        $prime = \App\PrimeSilo::All();
        $data['primesilos'] = $prime;
        $resources = \App\Resource::All();
        $data2['resources'] = $resources;
        //  $post = $resource->name;
        //$user = Auth::user();
        //$user->notify(new AddResourceNotification($post));
        return view('focus/resources', $data, $data2);

    }

    public function update_icon(Request $request){
        if($request->hasFile('icon')){
            $icon = $request->file('icon');
            $filename= time() . '.' .$icon->getClientOriginalExtension();
            $path = public_path('uploads/icons/' . $filename);
            Image::make($icon->getRealPath())->resize(200, 200)->save($path);

            $resource = \App\Resource::findOrFail(Input::get('editedid'));
            $resource->icon = $filename;
            $resource->save();
        }
        return redirect('resources')->with('feedbackicon', 'Icon succesfully changed.');
    }

    public function delete_icon(){
        $resource = \App\Resource::findOrFail(Input::get('deletedid'));

        File::delete('uploads/icons/' . $resource->icon);

        $resource->icon = "f21MB-n.jpg";
        $resource->save();

        return redirect('resources')->with('feedbackicon', 'Icon succesfully deleted.');
    }
}

