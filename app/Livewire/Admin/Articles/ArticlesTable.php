<?php

namespace App\Livewire\Admin\Articles;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesTable extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        $articles = Article::where('title', 'like', '%'.$this->query.'%')->simplePaginate(20);
        return view('livewire.admin.articles.articles-table',compact('articles'));
    }
}
