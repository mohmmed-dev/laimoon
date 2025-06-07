<?php

namespace App\Livewire\Comments;

use App\Models\Comment as ModelsComment;
use Livewire\Attributes\On;
use Livewire\Component;

class Comment extends Component
{
    public ModelsComment $comment;
    public $open = false;
    #[On('replay')]
    public function  getCommentsProperty() {
        return $this->comment->replies;
    }
    public function render()
    {
        return view('livewire.comments.comment');
    }
}
