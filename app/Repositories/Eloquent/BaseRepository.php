<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected $model;

	protected function getNewInstance(){
		$model = $this->model;
		return new $model;
	}
    
	public function all(){
		$instance = $this->getNewInstance();
		return $instance->all();
	}
	public function find($id){
		$instance = $this->getNewInstance();
		return $instance->find($id);
	}

}