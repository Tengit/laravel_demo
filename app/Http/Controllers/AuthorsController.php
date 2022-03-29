<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Authors\AuthorRepository;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorsController extends Controller
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
        $index = 1;
        return view('authors.index', compact('authors', 'index'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $authors = $this->authorRepository->find($id);
        return view('authors.show', ['authors' => $authors]);
    }

    /**
     * Create
     * @return mixed
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Authors $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = $this->authorRepository->create($request->all());

        if( $author ){
            return redirect()->route('authors.show');
        }else{
            return redirect()->route('authors.create');
        }
    }

    /**
     * Update
     * @param $id
     * @param array $request
     * @return mixed
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = $this->authorRepository->update($id, $request->all());

        return redirect()->route('authors.show', $author)
            ->with('success', 'Author updated successfully');
    }

    /**
     * Destroy
     * @param $id
     * @return mixed
     */
    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
