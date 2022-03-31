<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksAuthors extends Model
{
    use HasFactory;
	protected $table = 'books_authors';
    
    protected $fillable = [
        'book_id',
        'author_id',
    ];
}
