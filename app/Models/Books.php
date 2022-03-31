<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use App\Models\Publishers;
use App\Models\Authors;

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
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Authors::class, 'books_authors', 'book_id', 'author_id')
            ->as('authors')
            ->withTimestamps();
            
        // return $this->hasMany(Authors::class, 'id', 'book_id');
    }
}
