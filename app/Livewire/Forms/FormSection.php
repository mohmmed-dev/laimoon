<?php

namespace App\Livewire\Forms;

use App\Models\Section;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormSection extends Form
{

    public ?Section $section;

    public $course_id = null;
    #[Validate('required')]
    public $title = '';

    #[Validate('required')]
    public $description = '';

    public function setSection(Section $section)
    {
        $this->section = $section;

        $this->title = $section->title;

        $this->description = $section->description;
    }

    public function store($course_id)
    {
        $this->validate();
        $this->course_id = $course_id;

        section::create($this->only(['title', 'description', 'course_id']));
    }

    public function update()
    {
        $this->validate();

        $this->section->update(
            $this->only(['title', 'description'])
        );
    }

    public function delete()
    {
        $this->section->delete();
    }

}
