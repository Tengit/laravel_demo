<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Models\Authors;
use App\Models\Books;
use App\Repositories\Authors\AuthorRepository;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Controllers\Admin\BooksController;

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
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Create
     * @return mixed
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $author = $this->authorRepository->find($id);
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function popup( $id )
    {
        $author = $this->authorRepository->find($id);
        return view('user.authors.popup', compact('author'));
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Authors $author)
    {
        return view('admin.authors.edit', compact('author'));
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
        $book = new Books;
        dd( $book::checkDelete('authors') );
        if( $book->checkDelete('authors') )
        {
            $author->delete();
            return redirect()->route('admin.authors.index')->with([
                'message' => 'Deleted successfully',
                'alert-type' => 'success'
            ]);
        }
        return redirect()->route('admin.authors.index')->with([
            'message' => 'Cant delete this record',
            'alert-type' => 'fail'
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

        return view('admin.authors.delete', compact('author'));
    }
}
