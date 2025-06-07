<?php

namespace App\Livewire\Admin\Articles;

use App\Livewire\Forms\formArticles;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ArticlesCreate extends Component
{
    use \Livewire\WithFileUploads;
    public formArticles $form;
    public $description;
    public function save() {
        Gate::authorize('teacher');
        $this->form->description = $this->description;
        $this->form->validate();
        $this->form->store();
        session()->flash('success', __('Added Successfully'));
    }
    public function render()
    {
        return view('livewire.admin.articles.articles-create');
    }
}
