<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class LessonsController extends Controller
{
    //

    public function show(Lesson $lesson)
    {
        if(empty($lesson->free) && empty($lesson->course->free)) {
            FacadesGate::authorize('watch',$lesson->section->course);
        }
        $lesson->load(['section', 'section.lessons' => function ($query) {
            $query->orderBy('order', 'asc');
        }]);
        return view('lessons.show', compact('lesson'));
    }
}
