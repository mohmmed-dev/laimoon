<?php

namespace App\Livewire\Admin\Sections;

use App\Livewire\Forms\FormSection;
use App\Models\Section;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class SectionCreate extends Component
{
    public FormSection $form;
    public $open = false;
    public $course_id;

    public function save()
    {
        Gate::authorize('teacher');
        $this->form->validate();
        $this->form->store($this->course_id);
        session()->flash('success', __('Added Successfully'));
        $this->reset(['open', 'form']);
        $this->dispatch('sectionCreated');
    }
    public function render()
    {
        return view('livewire.admin.sections.section-create');
    }
}
