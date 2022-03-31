<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Publishers\PublisherRepository;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;

class PublishersController extends Controller
{
    protected $publisherRepository;
    protected $relationships;
    
    /**
     * __contruct
     * @return object
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
        $this->relationships = [];
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $publishers = $this->publisherRepository->getAll($this->relationships);
        return view('publishers.index', compact('publishers'));
    }

    /**
     * Create
     * @return mixed
     */
    public function create()
    {
        return view('publishers.create');
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $publisher = $this->publisherRepository->find($id);
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Publishers $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store(StorePublisherRequest $request)
    {
        $publisher = $this->publisherRepository->create($request->all());

        if( $publisher ){
            return redirect()->route('admin.publishers.show', $publisher);
        }else{
            return redirect()->route('admin.publishers.create');
        }
    }

    /**
     * Update
     * @param $id
     * @param array $request
     * @return mixed
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        $publisher = $this->publisherRepository->update($id, $request->all());

        return redirect()->route('admin.publishers.show', $publisher)
            ->with('success', 'Publisher updated successfully');
    }

    /**
     * Destroy
     * @param $id
     * @return mixed
     */
    public function destroy(Publishers $publisher)
    {
        $publisher->delete();
        return redirect()->route('admin.publishers.index')->with([
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
        $publisher = $this->publisherRepository->find($id);

        return view('publishers.delete', compact('publisher'));
    }
}
