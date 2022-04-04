<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BooksAuthors extends Model
{
    use HasFactory;
    use SoftDeletes;
	protected $table = 'books_authors';
    
    protected $fillable = [
        'book_id',
        'author_id',
    ];
}
