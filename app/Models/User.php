<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Mockery\Matcher\Not;

class User extends Authenticatable
{
    use HasApiTokens;
    use Billable;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    // use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'administration_level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        public function profilePhotoPath() {
            $image =  $this->profile_photo_path;
            if(filter_var( $image , FILTER_VALIDATE_URL)) {
                return $image;
            }
            return asset('storage/'. $image);
        }

        public function alert() {
        return $this->hasOne(Alert::class);
        }

        public function notifications() {
        return $this->hasMany(Notification::class);
        }

        public function courses() {
        return $this->belongsToMany(Course::class , 'course_user')->withPivot(['bought','price'])->withTimestamps();
        }

        public function teacherCourses() {
            return $this->belongsToMany(Course::class, 'teachers');
        }


        public function articles() {
            return $this->belongsToMany(Article::class);
        }

        public function comments() {
            return $this->belongsToMany(Comment::class);
        }

        public function isTeacher() {
            return $this->administration_level >  0 ? true : false ;
        }
        public function isAdmin() {
            return $this->administration_level > 1 ? true : false ;
        }

        public function boughtCourse($id) {
            return $this->courses()->where('course_id',$id)->where('bought',1)->exists();
        }

        // public function profilePhoto() : Attribute {
        //     return Attribute::make(
        //         get: fn ($value) => filter_var($$value,FILTER_VALIDATE_URL) ? $value : asset('storage/profile-photos/' . $value),
        //     );
        // }
}
