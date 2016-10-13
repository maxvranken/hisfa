<?php

namespace App\Http\Controllers;

use App\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

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
}

