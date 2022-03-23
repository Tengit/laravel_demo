<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    function create(Request $request){
          //Validate Inputs
          $request->validate([
              'name'=>'required',
              'fullname'=>'required',
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:5|max:30',
          ]);

          $user = new User();
          $user->name = $request->name;
          $user->fullname = $request->fullname;
          $user->role_id = config('constants.role_user');
          $user->created_by = '1';
          $user->modified_by = '1';
          $user->email = $request->email;
          $user->password = \Hash::make($request->password);
          $save = $user->save();

          if( $save ){
              return redirect()->route('user.login');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
          }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

