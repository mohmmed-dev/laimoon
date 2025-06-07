<?php

namespace App\Livewire;

use Livewire\Component;

class AUrl extends Component
{
    public $text;
    public $url;
    public function render()
    {
        return view('livewire.a-url');
    }
}
