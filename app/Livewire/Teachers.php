<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class Teachers extends Component
{
    public  $open = false;
    public  $query;
    public $teachers_chose = [];
    public Course $course;
    public function save() {
        $this->course->teachers()->sync($this->teachers_chose);
    }
    public function render()
    {
        $teachers = User::where('administration_level' ,'>' , 0)->where('name', 'like', '%'.$this->query.'%')->get();
        return view('livewire.teachers',compact('teachers'));
    }
}
