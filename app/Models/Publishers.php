<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Books;

class Publishers extends Model
{
	protected $table = 'publishers';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'address',
        'email',
    ];

    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
