<?php

namespace App\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsTable extends Component
{
    use WithPagination;

    public function render()
    {
        $comments = Comment::where('parent_id' , null)->simplePaginate(20);
        return view('livewire.admin.comments.comments-table',compact('comments'));
    }
}
