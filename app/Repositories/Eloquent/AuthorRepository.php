<?php

namespace App\Repositories\Eloquent;

use App\Models\Authors;
use App\Repositories\AuthorInterface;

class AuthorRepository extends BaseRepository implements AuthorInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Books $model)
    {
        $this->model = $model;
    }
}