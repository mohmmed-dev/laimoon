<?php

namespace App\Livewire\Admin\Categories;

use App\Models\category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name;
    public function rules() {
        return [
            'name' => ['required', 'string',  Rule::unique('categories')->ignore($this->name)]
        ];
    }
    public function save()  {
        Gate::authorize('teacher');
        $this->validate();
       category::create([
        'name' =>$this->name,
        'slug' => $this->name,
       ]);
       session()->flash('success', __('Added Successfully'));
    }
    public function render()
    {
        return view('livewire.admin.categories.category-create');
    }
}
