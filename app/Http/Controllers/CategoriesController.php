<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    protected $pagination;
    
    public function __construct(){
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        return view('categories.index', [
            'index'      => 1,
            'categories' => Categories::latest()->paginate($this->pagination)
        ]);
    }
    
    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }
    
    public function create(Request $request)
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $input = $request->all();
        $category = Categories::create(array_merge($input, [
            // 'created_by' => request()->user()->id,
            // 'modified_by' => request()->user()->id
        ]));

        return redirect()->route('categories.show', $category);
    }

    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Categories $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.show', $category)
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category Deleted!');
    }
}
