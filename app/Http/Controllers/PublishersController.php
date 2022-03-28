<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishers;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Repositories\PublisherInterface;

class PublishersController extends Controller
{
    private $publisherInterface;
    private $pagination;

    public function __construct(PublisherInterface $publisherInterface)
    {
        $this->publisherInterface = $publisherInterface;
        $this->pagination = config('constants.pagination_records');
    }

    public function index()
    {
        $publishers = $this->publisherInterface->getAll();
        return view('publishers.index', [
            'index'      => 1,
            'publishers' => $publishers
        ]);
    }

    public function show( $id )
    {
        $publisher = $this->publisherInterface->find($id);
        return view('publishers.show', ['publisher' => $publisher]);
    }
    
    public function create()
    {
        return view('publishers.create');
    }

    public function store(StorePublisherRequest $request)
    {
        $publisher = $this->publisherInterface->create($request->all());
        if( $publisher ){
            return redirect()->route('publishers.show');
        }else{
            return redirect()->route('publishers.create');
        }
    }

    public function edit(Publishers $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(UpdatePublisherRequest $request, $id)
    {
        $author = $this->publisherInterface->update($id, $request->all());

        return view('publishers.show');
    }

    public function destroy($id)
    {
        $this->publisherInterface->delete($id);
        
        return view('publishers.index');
    }
}
