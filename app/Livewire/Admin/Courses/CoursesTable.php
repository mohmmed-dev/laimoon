<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesTable extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $courses = Course ::where('title', 'like', '%'.$this->query.'%')->with('teachers')->withCount(['lessons','sections','students'])->simplePaginate(15);
        return view('livewire.admin.courses.courses-table')->with(['courses' => $courses]);
    }
}

