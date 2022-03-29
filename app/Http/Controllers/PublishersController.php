<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Repositories\Publishers\PublisherRepository;

class PublishersController extends Controller
{
    protected $publisherRepository;
 
    /**
     * __contruct
     * @return repo object
     */
    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }

    /**
     * Get all
     * @return mixed
     */
    public function index()
    {
        $publishers = $this->publisherRepository->getAll();
        $index = 1;
        return view('publishers.index', compact('publishers', 'index'));

    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show( $id )
    {
        $publisher = $this->publisherRepository->find($id);
        $index = 1;
        return view('publishers.show', compact('publishers.show', 'index'));
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create()
    {
        return view('publishers.create');
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
            return redirect()->route('publishers.show');
        }else{
            return redirect()->route('publishers.create');
        }
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
     * Update
     * @param $id
     * @return mixed
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        $publisher = $this->publisherRepository->update($id, $request->all());
        return redirect()->route('publishers.show', $publisher)
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
        return redirect()->route('publishers.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
