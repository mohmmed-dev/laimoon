<?php

namespace App\Livewire\Admin\Lessons;

use App\Livewire\Forms\FormLesson;
use App\Models\Lesson;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class LessonEdit extends Component
{
    use WithFileUploads;
    public FormLesson $form;
    public $open = false;
    public $lesson;

    public function mount(lesson $lesson)
    {
        Gate::authorize('teacher');
        $this->lesson = $lesson;
        $this->form->setLesson($lesson);
    }

    public function save() {
        $this->form->update($this->lesson);
        session()->flash('update', __('Updated Successfully'));
        $this->dispatch('lessonCreated');
        $this->reset(['open', 'form']);
    }

    public function render()
    {
        return view('livewire.admin.lessons.lesson-edit');
    }
}
