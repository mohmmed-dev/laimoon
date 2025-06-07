<?php

namespace App\Models;

use App\Helpers\Slug;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'path_image',
        'path_video',
        'price',
        'beforePrice',
        'free',
        'public',
        'language'
    ];

    // protected function title() : Attribute {
    //     return Attribute::make(
    //         set: fn (String $value,) => [
    //             'title' => $value,
    //             'slug' => Slug::uniqueSlug($value,'courses'),
    //         ],
    //     );
    // }


    public function sections() {
        return $this->hasMany(Section::class);
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function notfications() {
        return $this->belongsToMany(Alert::class);
    }

    public function students() {
        return $this->belongsToMany(User::class , 'course_user');
    }

    public function teachers() {
        return $this->belongsToMany(User::class, 'teachers');
    }

    public function categories() : MorphToMany {
        return $this->morphToMany(Category::class,'categoriesble')->withPivot('category_id')->withTimestamps();
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function video() {
        return $this->morphOne(convertedvideo::class ,'videoble');
    }

}
