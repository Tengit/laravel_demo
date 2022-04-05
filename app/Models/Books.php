<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use App\Models\Publishers;
use App\Models\Authors;
use App\Models\Admin;

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
        'image',
        'quantity',
        'content',
        'description',
        'edition',
        'price',
        'date_published',
        'publisher_id',
        'created_by',
        'modified_by',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'books_authors', 'book_id', 'author_id')
            ->as('authors')
            ->wherePivot('deleted_at', null)
            ->withTimestamps();
            
        // return $this->hasMany(Authors::class, 'id', 'book_id');
    }
}
