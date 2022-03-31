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
        return view('authors.index', compact('authors'));
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
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $author = $this->authorRepository->find($id);
        return view('authors.show', compact('author'));
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
            return redirect()->route('admin.authors.show', $author);
        }else{
            return redirect()->route('admin.authors.create');
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

        return redirect()->route('admin.authors.show', $author)
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
        return redirect()->route('admin.authors.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $author = $this->authorRepository->find($id);

        return view('authors.delete', compact('author'));
    }
}
