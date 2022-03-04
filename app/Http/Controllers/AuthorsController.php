<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;

class AuthorsController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'index'      => 1,
            'authors' => Authors::latest()->paginate(10)
        ]);
    /*
        $authors = Authors::latest()->paginate(5);
        return view('authors.index', compact('authors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    */
            
    /*
        $authors = DB::table('authors')
            ->orderBy('created_at', 'desc')
            ->orderBy('name', 'asc')
            ->get();

        return view('authors.index', [
            'index'      => 1,
            'authors' => $authors]
        );
    */
    }
    
    public function show(Authors $author)
    {
        return view('authors.show', compact('author'));
    }
    
    public function create(Request $request)
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $author = Authors::create(array_merge($this->validatePost(), [
            'created_by' =>  $request->user()->id,
            'modified_by' =>  $request->user()->id
        ]));

        return redirect()->route('authors.show', $author);
    }

    public function edit(Authors $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Authors $author)
    {
        $attributes = $this->validatePost($author);

        $author->update($attributes);

        return redirect()->route('authors.show', $author)
            ->with('success', 'Author updated successfully');

        return redirect()->to('/authors/'.$author->abbreviation);
    }

    public function destroy(Authors $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author Deleted!');

        return back()->with('success', 'Author Deleted!');
    }

    protected function validatePost(?Authors $author = null): array
    {
        $author ??= new Authors();

        return request()->validate([
            'name' => 'required',
            'biography' => 'required',
            'address' => '',
            'email' => ['required', Rule::unique('authors', 'email')->ignore($author)],
        ]);
    }
}
