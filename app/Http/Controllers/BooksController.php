<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;

class BooksController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'index'      => 1,
            'books' => Books::latest()->paginate(10)
        ]);
    }
    
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }
    
    public function create(Request $request)
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = Books::create(array_merge($this->validatePost(), [
            'created_by' =>  $request->user()->id,
            'modified_by' =>  $request->user()->id
        ]));

        return redirect()->route('books.show', $book);
    }

    public function edit(Books $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Books $book)
    {
        $attributes = $this->validatePost($book);

        $book->update($attributes);

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

    protected function validatePost(?Books $book = null): array
    {
        $book ??= new Books();

        return request()->validate([
            'title' => 'required',
            'isbn' => 'required',
            'parent_id' => '',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'condition' => 'required',
            'content' => 'required',
            'num_pages' => 'required',
            'quantity' => 'required',
            'edition' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date_published' => 'required',
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class);
    }

    public function author()
    {
        return $this->belongsToMany(Authors::class)
            ->as('author')
            ->withTimestamps();
    }
}
