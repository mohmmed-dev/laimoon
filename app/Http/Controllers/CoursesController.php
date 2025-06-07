<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function myCourses()
    {
        if(auth()->user()->subscribed(env('min_subscription_type'))) {
            $courses = Course::All();
        } else {
            $courses = auth()->user()->courses()->wherePivot('bought', 1)->get();
        }

        return view('courses.myCourses', compact('courses'));
    }

    public function show(Course $course) {
        $course->load([
            'sections.lessons' => function ($query) {
                $query->orderBy('order', 'asc');
            },
            'sections',
            'teachers',
        ])->loadCount(['students']);
        $time = $course->lessons->sum(function ($lesson) {
            return $lesson->hours * 60 + $lesson->minutes;
        });
        $totalHours = floor($time / 60);
        $remainingMinutes = $time % 60;
        $time = sprintf('%02d', $totalHours) . ':' . sprintf('%02d', $remainingMinutes);
        return view('courses.show',compact(['course','time']));
    }
}
