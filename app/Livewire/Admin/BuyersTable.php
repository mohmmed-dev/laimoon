<?php

namespace App\Livewire\Admin;

use App\Models\courseUser;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BuyersTable extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }


    public function render()
    {
        $orders = courseUser::with(['user','course'])->where('bought', 1)->simplePaginate(20);
        return view('livewire.admin.buyers-table',compact('orders'));
    }
}
