<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class CoursesEdit extends Component
{
    public $course;
    public $users_all_ids;
    public $description;
    

    public function render()
    {
        $teachers = User::where('administration_level' ,'>' , 0)->get();
        return view('livewire.admin.courses.courses-edit',compact('teachers'));
    }
}
