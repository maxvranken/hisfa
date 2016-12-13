<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Auth;

class SettingsController extends Controller
{
    public function index(){
        return view('/settings/menu');
    }

    public function register(){
        return view('auth/register');
    }

    public function users(){
        if( Auth::user()->hasRole('admin') ) {
            $users = \App\User::get();
            $data['users'] = $users;
            return view('/settings/users', $data);
        }
    }

    public function remove_user(){
        try {
            $id = Input::get('id');
            $user = \App\User::findOrFail($id);
            if( Auth::user()->hasRole('admin') ) {
                $user->delete();
                return redirect('/users');
            }
            \Session::flash('flash_message', 'The user has been removed');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings');
        }

    }

    public function admin(){
        try {
            $id = Input::get('id');
            $user = \App\User::findOrFail($id);
            if(Input::get('admin')) {
                $user->assignRole('admin');
                return redirect('/users');
            }else{
                $user->removeRole('admin');
                return redirect('/settings/users');
            }
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings');
        }

    }

    public function add_user(){
        try {
            if( Auth::user()->hasRole('admin') ) {
                $user = new User;
                $user->name = Input::get('name');
                $user->email = Input::get('email');
                $user->password = bcrypt(Input::get('password'));
                $user->save();
                $user->givePermissionTo('view dashboard', 'view foam stock', 'view prime silos', 'view waste silos');

                return redirect('/settings');
            }else{
                return redirect('/');
            }
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings');
        }

    }

    public function permissions(){
        try {
            if( Auth::user()->can('change user permissions') ) {
                $users = \App\User::get();
                $data['users'] = $users;
                return view('/settings/permissions', $data);
            }else{
                return redirect('/');
            }
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings');
        }

    }

    public function show($id){
        if( Auth::user()->can('change user permissions') ) {
            $users = \App\User::get();
            $user = \App\User::findOrFail($id);
            $data['users'] = $users;
            if (!$user->hasRole('admin')) {
                $data['shown_user'] = $user;
            } else {
                return redirect('/permissions');
            }

            return view('/settings/permissions', $data);
        }else{
            return redirect('/');
        }
    }

    public function editpermissions($id){
        try {
            if( Auth::user()->can('change user permissions') ) {
                $user = \App\User::findOrFail($id);
                if (Input::get('view_dashboard')) {
                    if (!$user->can('view dashboard')) {
                        $user->givePermissionTo('view dashboard');
                    }
                } else {
                    $user->revokePermissionTo('view dashboard');
                }
                if (Input::get('view_foam')) {
                    if (!$user->can('view foam stock')) {
                        $user->givePermissionTo('view foam stock');
                    }
                } else {
                    $user->revokePermissionTo('view foam stock');
                }
                if (Input::get('view_prime')) {
                    if (!$user->can('view prime silos')) {
                        $user->givePermissionTo('view prime silos');
                    }
                } else {
                    $user->revokePermissionTo('view prime silos');
                }
                if (Input::get('view_waste')) {
                    if (!$user->can('view waste silos')) {
                        $user->givePermissionTo('view waste silos');
                    }
                } else {
                    $user->revokePermissionTo('view waste silos');
                }
                if (Input::get('edit_foam')) {
                    if (!$user->can('edit foam stock')) {
                        $user->givePermissionTo('edit foam stock');
                    }
                } else {
                    $user->revokePermissionTo('edit foam stock');
                }
                if (Input::get('edit_prime')) {
                    if (!$user->can('edit prime silos')) {
                        $user->givePermissionTo('edit prime silos');
                    }
                } else {
                    $user->revokePermissionTo('edit prime silos');
                }
                if (Input::get('edit_waste')) {
                    if (!$user->can('edit waste silos')) {
                        $user->givePermissionTo('edit waste silos');
                    }
                } else {
                    $user->revokePermissionTo('edit waste silos');
                }
                if (Input::get('edit_permissions')) {
                    if (!$user->can('change user permissions')) {
                        $user->givePermissionTo('change user permissions');
                    }
                } else {
                    $user->revokePermissionTo('change user permissions');
                }

                return redirect('/permissions/' . $id);
            }else{
                return redirect('/');
            }
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings');
        }

    }
}
