<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->query.'%')->simplePaginate(20);
        return view('livewire.admin.user.users-table',compact('users'));
    }
}
