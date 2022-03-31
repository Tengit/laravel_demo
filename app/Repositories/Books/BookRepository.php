<?php

namespace App\Repositories\Books;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Books;
use App\Models\BooksAuthors;

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
    public function getAll()
    {
        return $this->model->with(['category', 'publisher', 'authors'])
            ->orderBy( 'title', 'desc')
            ->paginate( config('constants.pagination_records') ?? 10);
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
    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}
