<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
	protected $table = 'books';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'isbn',
        'category_id',
        'condition',
        'parent_id',
        'num_pages',
        'quantity',
        'content',
        'description',
        'edition',
        'price',
        'date_published',
        'publisher_id',
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Categories','id');
    }
}
