<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function all();
	public function paginate($count);
	public function find($id);
	public function store($data);
	public function update($id, $data);
	public function delete($id);
	public function findBy($field, $value);

}