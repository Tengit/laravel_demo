<?php

namespace App\Repositories\Authors;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Authors;
//use Your Model

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
    
    /**
     * declare model
     */
    protected $model;

    /**
     * contruct
     * @return object
     */
    public function __construct( Authors $model )
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
        return $this->model::where('name', 'LIKE', '%'  . $name . '%')
            ->get();
    }

    /**
     * Get all
     * @return mixed
     */
    public function getAll()
    {
        return $this->model
            ->orderBy( 'name', 'desc')
            ->paginate( config('constants.pagination_records') ?? 10);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Get one
     * @param $id
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
