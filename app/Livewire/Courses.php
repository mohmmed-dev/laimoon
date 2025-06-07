<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Course;
use Livewire\Attributes\Computed ;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;
    public $query = '';
    public  $category;

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.courses')->with(['courses' => Course::where('title', 'like', '%'.$this->query.'%')->simplePaginate(15)]);
    }
}
