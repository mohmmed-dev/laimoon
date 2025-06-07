<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Article;
use App\Models\category;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CategoriesSelect extends Component
{
    public  $open = false;
    public  $query;
    public $categories_chose = [];
    public $main;
    public function mount($type,$id) {
        if($type == 'course') {
            $this->main = Course::findOrFail($id);
        } else {
            $this->main = Article::findOrFail($id);
        }

    }
    public function save() {
        Gate::authorize('teacher');
        $this->main->categories()->sync($this->categories_chose);
    }
    public function render()
    {
        $categories = category::where('name',"like","%$this->query%")->get();
        return view('livewire.admin.categories.categories-select',compact('categories'));
    }
}
