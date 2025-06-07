<?php

namespace App\Livewire\Admin\Courses;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CoursesCreate extends Component
{
    use WithFileUploads;
    public $description;
    public function render()
    {
        return view('livewire.admin.courses.courses-create');
    }
}
