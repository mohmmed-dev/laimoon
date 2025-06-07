<?php

namespace App\Livewire\Admin\Articles;

use App\Livewire\Forms\formArticles;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class ArticlesEdit extends Component
{
    use \Livewire\WithFileUploads;
    public formArticles $form;
    public  $article;
    public  $description;
    public function mount(Article $article) {
        $this->article = $article;
        $this->form->setArticle($article);
    }
    public function save() {
        Gate::authorize('teacher');
        $this->form->description = $this->description;
        $this->form->validate();
        $this->form->update();
        session()->flash('update', __('Updated Successfully'));
    }
    public function render()
    {
        return view('livewire.admin.articles.articles-edit');
    }
}
