<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authors extends Model
{
	protected $table = 'authors';
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'biography',
        'address',
        'email',
    ];
}
