<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Books;
use App\Http\Controllers\BooksController;

class AdminController extends Controller
{

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $books = Books::all();
        $index = 1;
        return view('admin.auth.home', compact('books', 'index'));
    }

    /**
     * Check login
     * @return route
     */
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
