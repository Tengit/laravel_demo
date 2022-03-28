<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryInterface;

class CategoriesController extends Controller
{
    private $categoryInterface;
    private $pagination;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        $categories = $this->categoryInterface->getAll();
        return view('categories.index', [
            'index'      => 1,
            'categories' => $categories
        ]);
    }

    public function show( $id )
    {
        $category = $this->categoryInterface->find($id);
        return view('categories.show', ['category' => $category]);
    }
    
    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryInterface->create($request->all());
        if( $category ){
            return redirect()->route('categories.show');
        }else{
            return redirect()->route('categories.create');
        }
    }

    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $author = $this->categoryInterface->update($id, $request->all());

        return view('categories.show');
    }

    public function destroy($id)
    {
        $this->categoryInterface->delete($id);
        
        return view('categories.index');
    }
}
