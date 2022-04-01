<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Books;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * @standard
     * 
     */
    public function index()
    {
        $books = Books::with('category', 'publisher')
            ->orderBy( 'title', 'desc')
            ->paginate( config('constants.pagination_records') ?? 10);
        return view('user.books.index', 
            compact(
                'books'
            )
        );
    }

    public function create()
    {
        return redirect()->route('login');
    }

    public function store(StoreUserRequest $request)
    {
        /*
        $request->request->add([
            'role_id' =>  config('constants.role_user'),
            'created_by' =>  config('constants.role_user'),
            'modified_by' =>  config('constants.role_user'),
        ]);
        */
        $user = User::create($request->all());
        if( $user ){
            return redirect()->route('user.login');
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }
    //    return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {

        $user->delete();

        return back();
    }
    
    /**
     * @func check login
     */
    public function check(UpdateUserRequest $request)
    {
        $creds = $request->only('email','password');
        
        if( Auth::guard('web')->attempt($creds) ){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}

