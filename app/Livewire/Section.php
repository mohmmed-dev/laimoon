<?php

namespace App\Livewire;

use App\Models\Section as ModelsSection;
use Livewire\Component;

class Section extends Component
{
    public ModelsSection $section;
    public function mount() {
        $this->section->load(['lessons' => function ($query) {
            $query->orderBy('order', 'asc');
        }]);
    }
    public function render()
    {
        return view('livewire.section');
    }
}
