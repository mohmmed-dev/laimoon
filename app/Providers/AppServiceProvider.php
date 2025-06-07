<?php

namespace App\Providers;

use App\Events\Notifications;
use App\Listeners\SendNotification;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin' , function(User $user) {
            return $user->isAdmin();
        });
        Gate::define('teacher' , function(User $user) {
            return $user->isTeacher();
        });
        Gate::define('watch' , function(User $user ,Course $course) {
            return  $user->isTeacher() || $user->boughtCourse($course->id) || $user->subscribed(env('min_subscription_type'));
        });

        Gate::define('allWatch' , function(User $user ,Course $course,Lesson $lesson) {
            return ($course->free == 1 ||  $lesson->free == 1 ||  $user->isTeacher() ||  $user->boughtCourse($course->id) ||  $user->subscribed(env('min_subscription_type'))) ;
        });

        Gate::define('update_comment', function(User $user, Comment $comment) {
            return  $user->isAdmin() ||  $user->id === $comment->user_id;
        });

        Event::listen(
            Notifications::class,
            SendNotification::class
        );

    }
}
