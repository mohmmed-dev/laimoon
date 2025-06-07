<?php

namespace App\Livewire\Admin\Sections;

use App\Models\Course;
use Livewire\Attributes\On;
use Livewire\Component;

class SectionEditor extends Component
{
    public Course $course;
    public $order;


    #[On('sectionCreated')]
    public function getSectionsProperty()
    {
        return $this->course->sections;
    }

    public function render()
    {
        return view('livewire.admin.sections.section-editor');
    }
}
