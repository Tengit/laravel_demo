<?php

namespace App\Repositories\Authors;

interface AuthorRepositoryInterface
{
    
    /**
     * Get all
     * @return mixed
     */
    public function getAll(array $attributes);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);
}