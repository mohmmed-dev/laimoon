<?php

namespace App\Livewire\Admin\Categories;

use App\Models\category;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesTable extends Component
{

    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        $categories = Category::where('name', 'like', '%'.$this->query.'%')->withCount(['courses','articles'])->simplePaginate(20);
        return view('livewire.admin.categories.categories-table')->with(['categories' => $categories]);
    }

    public function delete($id) {
        Gate::authorize('teacher');
        $category = category::find($id);
        $category->delete();
    }
}
