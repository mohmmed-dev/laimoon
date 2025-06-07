<?php

namespace App\Livewire\Admin\Sections;

use App\Livewire\Forms\FormSection;
use App\Models\Section;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class SectionEdit extends Component
{
    public $section;
    public $open = false;
    public FormSection $form;

    public function mount(Section $section)
    {
        $this->section = $section;
        $this->form->setSection($section);
    }

    public function save()
    {
        Gate::authorize('teacher');
        $this->form->update();
        session()->flash('update', __('Updated Successfully'));
        $this->dispatch('sectionCreated');
    }
    public function delete()
    {
        Gate::authorize('teacher');
        $this->form->delete();
        session()->flash('delete', __('Deleted Successfully'));
        $this->reset(['open', 'form']);
        $this->dispatch('sectionCreated');
    }
    public function render()
    {
        return view('livewire.admin.sections.section-edit');
    }
}
