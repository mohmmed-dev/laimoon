<?php

namespace App\Livewire\Admin\Lessons;

use App\Models\Section;
use Livewire\Attributes\On;
use Livewire\Component;

class Lessons extends Component
{

    public Section $section;

    public function mount() {
        $this->section->load(['lessons' => function ($query) {
            $query->orderBy('order', 'asc');
        }
    ]);
    }

    #[On('lessonCreated')]
    public function getLessonsProperty()
    {
        return $this->section->lessons()->orderBy('order', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.admin.lessons.lessons');
    }
}
