<?php

namespace App\Repositories\Publishers;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Publishers;
//use Your Model

/**
 * Class PublisherRepository.
 */
class PublisherRepository extends BaseRepository implements PublisherRepositoryInterface
{
    
    /**
     * declare model
     */
    protected $model;

    /**
     * contruct
     * @return object
     */
    public function __construct( Publishers $model )
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
     * @return mixed
     */
    public function find($id)
    {
		
        $result = $this->model->with('books')->find($id);

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
