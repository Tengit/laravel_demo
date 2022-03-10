<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\AuthorInterface;

class AuthorsController extends Controller
{
    private $authorRepository;
    private $pagination;

    public function __construct(AuthorInterface $authorRepository)
    {
        $this->authorRepository = $authorRepository;
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        return response()->json($this->authorRepository->all(), 200);
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
    }

    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route('authors.index')
            ->with('success', 'Author Deleted!');
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
