<?php

namespace App\Livewire\Admin\Lessons;

use App\Livewire\Forms\FormLesson;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class LessonCreate extends Component
{
    use \Livewire\WithFileUploads;
    public FormLesson $form;
    public $open = false;
    public $course_id;
    public $section_id;

    public function save()
    {
        Gate::authorize('teacher');
        $this->form->validate();
        $this->form->store($this->section_id,$this->course_id);
        session()->flash('success', __('Added Successfully'));
        $this->reset(['open', 'form']);
        $this->dispatch('lessonCreated');
    }
    public function render()
    {
        return view('livewire.admin.lessons.lesson-create');
    }
}
