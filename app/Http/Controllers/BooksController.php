<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Books\BookRepository;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BooksController extends Controller
{
    protected $bookRepository;
    protected $categories;
    protected $publishers;
 
    /**
     * __contruct
     * @return object
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categories = Categories::all();
        $this->publishers = Publishers::all();
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $books = $this->bookRepository->getAll();
        $index = 1;
        return view('admin.auth.home', compact('books', 'index'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show( $id )
    {
        $book = $this->bookRepository->find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create()
    {
        $categories = $this->categories;
        $publishers = $this->publishers;
        return view('books.create', compact('categories', 'publishers'));
    }

    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store(StoreBookRequest $request)
    {
        $book = $this->bookRepository->create($request->all());

        if( $book ){
            return redirect()->route('admin.books.show', $book);
        }else{
            return redirect()->route('admin.books.create');
        }
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Books $book)
    {
        $categories = $this->categories;
        $publishers = $this->publishers;
        return view('books.edit', compact('book', 'categories', 'publishers'));
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $book = $this->bookRepository->update($id, $request->all());

        return redirect()->route('admin.books.show', $book)
            ->with('success', 'Book updated successfully');
    }

    /**
     * Destroy
     * @param $id
     * @return mixed
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with([
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
        $book = $this->bookRepository->find($id);

        return view('books.delete', compact('book'));
    }
}
