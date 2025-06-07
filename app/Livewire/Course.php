<?php

namespace App\Livewire;

use Livewire\Component;

class Course extends Component
{

    public $course;
    public $time;

    public function mount($course)
    {
        $this->course = $course;
        $this->course->load([
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
        $this->time = sprintf('%02d', $totalHours) . ':' . sprintf('%02d', $remainingMinutes);
    }
    public function render()
    {
        return view('livewire.course');
    }
}
