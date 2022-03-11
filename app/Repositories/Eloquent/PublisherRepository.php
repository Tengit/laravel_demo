<?php

namespace App\Repositories\Eloquent;

use App\Models\Publishers;
use App\Repositories\PublisherInterface;

class PublisherRepository extends BaseRepository implements PublisherInterface
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
    public function __construct(Publishers $model)
    {
        $this->model = $model;
    }
}