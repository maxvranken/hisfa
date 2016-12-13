<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        return view('settings/profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){
        try {
            //handle userupload of avatar
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename= time() . '.' .$avatar->getClientOriginalExtension();
                $path = public_path('uploads/avatars/' . $filename);
                Image::make($avatar->getRealPath())->resize(300, 300)->save($path);
                //Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
                $user = Auth::user();
                $user->avatar = $filename;
                $user->save();

            }
            // return view('profile', array('user' => Auth::user()));
            return redirect('profile')->with('feedbackavatar', 'Avatar succesfully changed.');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings/profile');
        }
        
    }

    public function changePwd(){
        try {
            $user = Auth::user();
            if (Hash::check($_POST['password3'], $user->password)){
                if($_POST['password1'] === $_POST['password2']){

                    $user = Auth::user();
                    $user->password =  Hash::make($_POST['password1']);
                    $user->save();

                    return redirect('profile')->with('feedbackpwd', 'Password successfully changed.');
                }else{
                    return redirect('profile')->with('feedbackpwd', 'Passwords do not match.');
                }
            }else return redirect('profile')->with('feedbackpwd', 'Current password does not match');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings/profile');
        }
        
    }

    public function changeUserInfo(){
        try {
            //trim = schrijft email aan elkaar weg
            $user = Auth::user();
            $user->name = trim($_POST['name']);
            $user->email= trim($_POST['email']);
            $user->save();
            return redirect('profile')->with('feedbackname', 'Account information succesfully changed.');
        } catch(\Exception $e) {
            \Session::flash('flash_error', $e);
            return redirect('settings/profile');
        }
        
    }
}
