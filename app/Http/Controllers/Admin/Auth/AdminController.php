<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * 
     */
    public function check(LoginRequest $request)
    {
         //Validate Inputs
         $request->validate([
            'email'=>'required|email|exists:admin,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email is not exists in admin table'
         ]);

         $creds = $request->only('email','password');

         if( Auth::guard('admin')->attempt($creds) ){
             return redirect()->route('admin.home');
         }else{
             return redirect()->route('admin.login')->with('fail','Incorrect credentials');
         }
    }

    /**
     * Description func
     * 
     */
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
