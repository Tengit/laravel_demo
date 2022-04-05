<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Books;

class Authors extends Model
{
	protected $table = 'authors';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'biography',
        'address',
        'birthday',
        'email',
    ];

    public function books()
    {
        return $this->belongsToMany(Books::class, 'books_authors', 'author_id', 'book_id')
            ->as('books')
            ->wherePivot('deleted_at', null)
            ->withTimestamps();
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($author) {
            $relationMethods = ['books'];

            foreach ($relationMethods as $relationMethod) {
                if ($author->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
}
