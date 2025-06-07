<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    public $query = '';
    public function search()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.articles')->with(['articles' => Article::Where('title', 'like', '%'.$this->query.'%')->simplePaginate(15)]);
    }
}
