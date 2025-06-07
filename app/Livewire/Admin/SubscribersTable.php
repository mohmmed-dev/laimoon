<?php

namespace App\Livewire\Admin;

use App\Models\Course;
use App\Models\courseUser;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SubscribersTable extends Component
{  use WithPagination;



    public function render()
    {
        $users = User::whereHas('subscriptions')->simplePaginate(20);
        return view('livewire.admin.subscribers-table',compact('users'));
    }
}
