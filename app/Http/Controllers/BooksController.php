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
    private $bookRepository;
    private $pagination;

    public function __construct(BookInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        return view('books.index', [
            'index'      => 1,
            'books' => Books::latest()->paginate($this->pagination)
        ]);
    }
    
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }
    
    public function create(Request $request)
    {
        $categories = Categories::all();
        $publishers = Publishers::all();
        return view('books.create', compact('categories', 'publishers'));
    }

    public function store(StoreBookRequest $request)
    {
        $input = $request->all();
        $book = Books::create(array_merge($input, [
            'created_by' =>  $request->user()->id,
            'modified_by' =>  $request->user()->id
        ]));

        return redirect()->route('admin.books.show', $book);
    }

    public function edit(Books $book)
    {
        $categories = Categories::all();
        $publishers = Publishers::all();
        return view('books.edit', compact('book', 'categories', 'publishers'));
    }

    public function update(UpdateBookRequest $request, Books $book)
    {
        $book->update($request->all());
        return redirect()->route('books.show', $book)
            ->with('success', 'Book updated successfully');
    }

    public function destroy(Books $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted!');

        return back()->with('success', 'Book Deleted!');
    }
}
