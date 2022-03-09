<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
	protected $table = 'categories';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'abbreviation',
        'description',
    ];

    public function books()
    {
        return $this->belongsTo('App\Models\Books', 'id');
    }
}
