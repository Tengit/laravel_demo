<?php

namespace App\Repositories\Books;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Books;
use App\Models\BooksAuthors;
use DB;

/**
 * Class BookRepository.
 */
class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    
    /**
     * declare model
     */
    protected $model;

    /**
     * contruct
     * @return object
     */
    public function __construct( Books $model )
    {
        $this->model = $model;
    }
    
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return $this->model::class;
    }

    /**
     * Search
     * @return mixed
     */
    public function search($name)
    {
        return $this->model::where('title', 'LIKE', '%'  . $name . '%')
            ->get();
    }

    /**
     * Get all
     * @return mixed
     */
    public function getAll($request)
    {
        /*

            if($request->search) {

                return DB::table('books')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->where('books.id','like','%'.$request->search.'%')
                ->orwhere('books.title','like','%'.$request->search.'%')
                ->orwhere('books.content','like','%'.$request->search.'%')
                ->orwhere('books.isbn','like','%'.$request->search.'%')
                ->orwhere('books.description','like','%'.$request->search.'%')
                ->orwhere('categories.name','like','%'.$request->search.'%')
                ->select('books.*', 'categories.* as category' )
                ->orderBy( 'title', 'desc')
                ->paginate( config('constants.pagination_records') ?? 10);
            }
        */
        
        return $this->model->where('id','like','%'.$request->search.'%')
            ->orwhere('title','like','%'.$request->search.'%')
            ->orwhere('content','like','%'.$request->search.'%')
            ->orwhere('isbn','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->with(['category', 'authors', 'publisher'])
            ->orderBy( 'title', 'desc')
            ->paginate( config('constants.pagination_records') ?? 10);
            
            // ->with(
            //     ['authors' => function($query) use ($request)
            //         {
            //             $query->where('name', 'like', '%'.$request->search.'%');
            //             $query->orWhere('biography', 'like', '%'.$request->search.'%');
            //         }
            //     ]
            // )
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function createBookAuthor($author_id,  $book_id)
    {
        $data = [
            'book_id' => $author_id,
            'author_id' => $book_id
        ];
        return BooksAuthors::create($data);
    }

    /**
     * Get one
     * @return mixed
     */
    public function find($id)
    {
		
        $result = $this->model->find($id);

        return $result;
    }
    
    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes)
    {

        $result = $this->find($id);
        if ($result) {
            foreach( $attributes as $field => $value )
            {
                if( $value ) $result->update([$field => $value]);
            }
            return $result;
        }

        return false;
    }
}
