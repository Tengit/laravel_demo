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
    private $authorInterface;
    private $pagination;

    public function __construct(AuthorInterface $authorInterface)
    {
        $this->authorInterface = $authorInterface;
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        $authors = $this->authorInterface->getAll();

        return view('authors.index', [
            'index' => 1,
            'authors' => $authors]);
    }

    public function show($id)
    {
        $authors = $this->authorInterface->find($id);

        return view('authors.show', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function edit(Authors $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = $this->authorInterface->create($request->all());
        if( $author ){
            return redirect()->route('authors.show');
        }else{
            return redirect()->route('authors.create');
        }
    }

    public function update(UpdateAuthorRequest $request, $id)
    {
        $author = $this->authorInterface->update($id, $request->all());

        return view('authors.show');
    }

    public function destroy($id)
    {
        $this->authorInterface->delete($id);
        
        return view('authors.index');
    }
}
