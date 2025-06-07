<?php

namespace App\Livewire\Tools;

use App\Models\Notification;
use Livewire\Component;

class Alert extends Component
{
    public $user;
    public function mount() {
        $this->user = auth()->user();
        if($this->user->alert == null) {
            $this->user->alert()->create([
                'alerts' => 0,
            ]);
        }
    }
    public function alerts() {
        $this->user->alert->alerts = 0;
        $this->user->alert->save();
    }
    public function render()
    {
        if($this->user->isTeacher() == 1) {
            $notifications = Notification::where('user_id' , $this->user->id)->where('user_id' , 1)->latest()->take(5)->get();
        } else {
            $notifications = $this->user->notifications()->latest()->take(5)->get();
        }
        return view('livewire.tools.alert',compact('notifications'));
    }
}
