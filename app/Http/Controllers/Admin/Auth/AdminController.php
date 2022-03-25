<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Books;

class AdminController extends Controller
{
    /**
     * 
     */
    
    public function index()
    {
        $books = Books::all();
        return view('admin.auth.home', [
            'index'      => 1,
            'books' => $books
        ]);
    }

    public function check(UpdateAdminRequest $request)
    {
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
