<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name','slug'
    ];

    protected $table = 'categories';

    public function courses() {
        return $this->morphedByMany(Course::class,'categoriesble');
    }

    public function articles() {
        return $this->morphedByMany(Article::class,'categoriesble');
    }
}
