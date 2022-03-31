<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Categories\CategoryRepository;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    protected $categoryRepository;
    protected $relationships;
    
    /**
     * __contruct
     * @return object
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->relationships = [];
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll($this->relationships);
        return view('categories.index', compact('categories'));
    }

    /**
     * Create
     * @return mixed
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Categories $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->all());

        if( $category ){
            return redirect()->route('admin.categories.show', $category);
        }else{
            return redirect()->route('admin.categories.create');
        }
    }

    /**
     * Update
     * @param $id
     * @param array $request
     * @return mixed
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->update($id, $request->all());

        return redirect()->route('admin.categories.show', $category)
            ->with('success', 'Category updated successfully');
    }

    /**
     * Destroy
     * @param $id
     * @return mixed
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with([
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
        $category = $this->categoryRepository->find($id);

        return view('categories.delete', compact('category'));
    }
}
