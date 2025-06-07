<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class UserLevel extends Component
{
    public $level;
    public $user;
    public $user_id;

    public function mount($user_id) {
        $this->user_id = $user_id;
        $this->user = User::find($this->user_id);
    }

    public function update() {
        Gate::authorize('admin');
        $this->user->update(['administration_level' => $this->level]);
    }
    public function render()
    {
        return view('livewire.admin.user.user-level');
    }
}
