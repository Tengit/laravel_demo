<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        if( $user ){
            return redirect()->route('user.login');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
    }
}
