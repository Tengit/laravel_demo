<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Books;

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
        return $this->hasMany(Books::class, 'category_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($category) {
            $relationMethods = ['books'];

            foreach ($relationMethods as $relationMethod) {
                if ($category->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
}
