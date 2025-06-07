<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseDetails extends Component
{
    public Course $course;
    public $time;
    public function render()
    {
        return view('livewire.course-details');
    }
}
