<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\BookInterface;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BooksController extends Controller
{
    protected $bookInterface;
    protected $pagination;

    public function __construct(BookInterface $bookInterface)
    {
        $this->bookInterface = $bookInterface;
        // $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        $books = $this->bookInterface->getAll();
        return view('admin.auth.home', compact('books'));
    }
    /**
     * 
     */
    public function show( $id )
    {
        $book = $this->bookInterface->find($id);
        
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $categories = Categories::all();
        $publishers = Publishers::all();
        return view('books.create', compact('categories', 'publishers'));
    }
    /**
     * 
     */
    public function store(StoreBookRequest $request)
    {
        $book = $this->bookInterface->create($request->all());

        if( $book ){
            return redirect()->route('admin.books.show', $book);
        }else{
            return redirect()->route('admin.books.create');
        }
    }

    public function edit(Books $book)
    {
        $categories = Categories::all();
        $publishers = Publishers::all();
        return view('books.edit', compact('book', 'categories', 'publishers'));
    }

    public function update(UpdateBookRequest $request, $id)
    {
        $book = $this->bookInterface->update($id, $request->all());

        return redirect()->route('admin.books.show', $book)
            ->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        $this->bookInterface->delete($id);
        
        return redirect()->route('admin.books.index')
        ->with('success', 'Book deleted!');
    }

    public function delete($id)
    {
        $book = $this->bookInterface->find($id);

        return view('books.delete', compact('book'));
    }
}
