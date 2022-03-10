<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;

class PublishersController extends Controller
{
    
    protected $pagination;
    
    public function __construct(){
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        return view('publishers.index', [
            'index'      => 1,
            'publishers' => Publishers::latest()->paginate($this->pagination)
        ]);
    }
    
    public function show(Publishers $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }
    
    public function create(Request $request)
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $publishers = Publishers::create(array_merge($this->validatePost(), [
            // 'created_by' => request()->user()->id,
            // 'modified_by' => request()->user()->id
        ]));

        return redirect()->route('publishers.show', $publishers);
    }

    public function edit(Publishers $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Publishers $publishers)
    {
        $attributes = $this->validatePost($publishers);

        $publishers->update($attributes);

        return redirect()->route('publishers.show', $publishers)
            ->with('success', 'Publisher updated successfully');
    }

    public function destroy(Publishers $publishers)
    {
        $publishers->delete();

        return redirect()->route('publishers.index')
            ->with('success', 'Publisher Deleted!');
    }

    protected function validatePost(?Publishers $publishers = null): array
    {
        $publishers ??= new Publishers();

        return request()->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => ['required', Rule::unique('publishers', 'email')->ignore($publishers)],
            'description' => '',
        ]);
    }
}
