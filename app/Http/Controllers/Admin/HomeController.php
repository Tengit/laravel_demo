<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $pagination;
    
    public function __construct(){
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        return view('books.index', [
            'index'      => 1,
            'books' => Books::latest()->paginate($this->pagination)
        ]);
    }
}
