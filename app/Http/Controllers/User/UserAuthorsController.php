<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Authors\AuthorRepository;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Controllers\Controller;

class UserAuthorsController extends Controller
{
    protected $authorRepository;
    
    /**
     * __contruct
     * @return object
     */
    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $authors = $this->authorRepository->getAll();
        return view('user.authors.index', compact('authors'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $author = $this->authorRepository->find($id);
        return view('user.authors.show', compact('author'));
    }
}
