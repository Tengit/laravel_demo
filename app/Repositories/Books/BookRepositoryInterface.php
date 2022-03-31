<?php

namespace App\Repositories\Books;

interface BookRepositoryInterface 
{
    
    /**
     * Get all
     * @param array $attributes
     * @return mixed
     */
    public function getAll();

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
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function createBookAuthor($author_id,  $book_id);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

}