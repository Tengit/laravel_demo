<?php

namespace App\Repositories\Eloquent;

use App\Models\Authors;
use App\Repositories\AuthorInterface;
use App\Repositories\Eloquent\BaseRepository;

class AuthorRepository extends BaseRepository implements AuthorInterface
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
    public function __construct(Authors $model)
    {
        $this->model = $model;
    }

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Authors::class;
    }
    
}