<?php

namespace App\Models;

use App\Helpers\Slug;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'path_video',
        'section_id',
        'course_id',
        'free',
        'quality',
        'hours',
        'minutes',
        'order'
    ];

    public function video() {
        return $this->morphOne(convertedvideo::class ,'videoble');
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
