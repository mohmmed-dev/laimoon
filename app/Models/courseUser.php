<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseUser extends Model
{
    protected $table = 'course_user';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
