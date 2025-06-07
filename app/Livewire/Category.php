<?php

namespace App\Livewire;

use App\Models\category as ModelsCategory ;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Category extends Component
{
    public ModelsCategory $category;
    public function render()
    {
        return view('livewire.category');
    }
}
