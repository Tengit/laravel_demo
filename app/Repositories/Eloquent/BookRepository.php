<?php

namespace App\Repositories\Eloquent;

use App\Models\Books;
use App\Repositories\BookInterface;

class BookRepository extends BaseRepository implements BookInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AuthorRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Books $model)
    {
        $this->model = $model;
    }
    

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Books::class;
    }
}