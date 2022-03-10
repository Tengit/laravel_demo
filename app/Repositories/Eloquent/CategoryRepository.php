<?php

namespace App\Repositories\Eloquent;

use App\Models\Categories;
use App\Repositories\CategoryInterface;

class CategoryRepository extends BaseRepository implements CategoryInterface
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