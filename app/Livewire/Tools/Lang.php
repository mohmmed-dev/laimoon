<?php

namespace App\Livewire\Tools;

use Livewire\Component;

class Lang extends Component
{
    public $lang;
    public function mount() {
        $this->lang = app()->getLocale();
    }
    public function render()
    {
        return view('livewire.tools.lang');
    }
}
