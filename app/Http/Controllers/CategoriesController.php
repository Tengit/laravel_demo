<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'index'      => 1,
            'categories' => Categories::paginate(15)
        ]);

        // $categories = DB::table('categories')
        //     ->orderBy('created_at', 'desc')
        //     ->orderBy('name', 'asc')
        //     ->get();

        // return view('categories.index', [
        //     'index'      => 1,
        //     'categories' => $categories]
        // );
    }
    
    public function show(Categories $category)
    {
        return view('categories.show', ['category' => $category]);
    }
    
    public function create(Request $request)
    {
        return view('categories.create');
    }
    /*
    public function store()
    {
        $category = new Categories;
        
        $category->name = request('name');
        $category->abbreviation = request('abbreviation');
        $category->description = request('description');
        $category->save();
        return redirect()->to('/categories/'.$category->name);
    }
    */

    public function store()
    {
        Categories::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
        ]));

        return redirect()->to('/categories/'.$category->name);
    }

    public function edit(Categories $category)
    {
        return view('admin.posts.edit', ['category' => $category]);
    }

    public function update(Categories $category)
    {
        $attributes = $this->validatePost($category);

        $category->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Categories $category)
    {
        $category->delete();

        return back()->with('success', 'Category Deleted!');
    }

    protected function validatePost(?Categories $category = null): array
    {
        $category ??= new Categories();

        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
            'description' => 'required',
        ]);
    }
}
