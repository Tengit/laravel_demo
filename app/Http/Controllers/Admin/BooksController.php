<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Publishers;
use App\Models\Authors;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use DB;
use App\Repositories\Books\BookRepository;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Controller;

use App\Services\ImageService;

class BooksController extends Controller
{

    protected $bookRepository;
    protected $categories;
    protected $publishers;
    protected $authors;
    protected $relationships;
 
    /**
     * __contruct
     * @return object
     */
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categories = Categories::all();
        $this->publishers = Publishers::all();
        $this->authors = Authors::all();
    }

    /**
     * Get all
     * @return mixed
     */
    public function index(Request $request)
    {
        $books = $this->bookRepository->getAll($request);
        return view('admin.books.index', compact('books'));
    }

    /**
     * ajax search
     * @return mixed
     */
    public function search(Request $request)
    {

        if($request->ajax()){

            $data=Books::where('id','like','%'.$request->search.'%')
                ->orwhere('title','like','%'.$request->search.'%')
                ->orwhere('content','like','%'.$request->search.'%')->get();
            $output='';
            if( count($data) > 0 ){
                $output ='
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($data as $row){
                                $output .='
                                <tr>
                                    <th scope="row">'.$row->id.'</th>
                                    <td>'.$row->title.'</td>
                                    <td>'.$row->description.'</td>
                                </tr>
                                ';
                            }
                $output .= '
                        </tbody>
                    </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function show( $id )
    {
        $book = $this->bookRepository->find($id);
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show one
     * @param $id
     * @return mixed
     */
    public function popup( $id )
    {
        $book = $this->bookRepository->find($id);
        return view('user.books.popup', compact('book'));
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create()
    {
        $categories = $this->categories;
        $publishers = $this->publishers;
        $authors = $this->authors;
        return view('admin.books.create', compact('categories', 'publishers', 'authors'));
    }

    /**
     * Store
     * @param array $attributes
     * @return mixed
     */
    public function store(StoreBookRequest $request)
    {
        $input = $request->all();
          if ($image = $request->file('image')) {
            $destinationPath = 'images/books/';
            $profileImage = $image->getClientOriginalName() . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $book = $this->bookRepository->create($input);
        if( $book )
        {
            foreach ($request->authorlist as $author_id){
                $this->bookRepository->createBookAuthor($author_id,  $book->id);
            }
        }

        if( $book ){
            return redirect()->route('admin.books.show', $book);
        }else{
            return redirect()->route('admin.books.create');
        }
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function edit(Books $book)
    {
        $categories = $this->categories;
        $publishers = $this->publishers;
        $authors = $this->authors;
        return view('admin.books.edit', compact('book', 'categories', 'publishers', 'authors'));
    }

    /**
     * Edit
     * @param array object
     * @return mixed
     */
    public function editPopup(Books $book)
    {
        $categories = $this->categories;
        $publishers = $this->publishers;
        $authors = $this->authors;
        return view('admin.books.editpopup', compact('book', 'categories', 'publishers', 'authors'));
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $input = $request->all();

        if ($image = $request->file('image'))
        {
            $destinationPath = 'images/books/';
            $profileImage = $image->getClientOriginalName() . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        else
        {
            unset($input['image']);
        }
        $book = $this->bookRepository->update($id, $input);

        $book->authors()->sync($request->authorlist);

        return redirect()->route('admin.books.show', $book)
            ->with('success', 'Book updated successfully');
    }

    /**
     * Destroy
     * @param $id
     * @return mixed
     */
    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with([
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
        $book = $this->bookRepository->find($id);

        return view('admin.books.delete', compact('book'));
    }
}
