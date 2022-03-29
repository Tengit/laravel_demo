<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Categories\CategoryRepository;

class CategoriesController extends Controller
{
    protected $categoryRepository;
 
    /**
     * __contruct
     * @return repo object
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        $index = 1;
        return view('categories.index', compact('categories', 'index'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show( $id )
    {
        $category = $this->categoryRepository->find($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create()
    {
        return view('categories.create');
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
            return redirect()->route('categories.show');
        }else{
            return redirect()->route('categories.create');
        }
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
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->update($id, $request->all());
        return redirect()->route('categories.show', $category)
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
        return redirect()->route('categories.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
