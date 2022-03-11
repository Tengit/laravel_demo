<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\AuthorInterface;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

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

    public function store(StoreAuthorRequest $request)
    {
        $input = $request->all();        
        $author = Authors::create(array_merge($input, [
            'created_by' =>  $request->user()->id,
            'modified_by' =>  $request->user()->id
        ]));

        return redirect()->route('authors.show', $author);
    }

    public function edit(Authors $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Authors $author)
    {
        $author->update($request->all());

        return redirect()->route('authors.show', $author)
            ->with('success', 'Author updated successfully');
    }

    public function destroy(Authors $author)
    {
        $author->delete();
        return redirect()->route('authors.index')
            ->with('success', 'Author Deleted!');
    }
}
