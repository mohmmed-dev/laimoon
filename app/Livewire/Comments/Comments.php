<?php

namespace App\Livewire\Comments;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{
    public $parent;
    public $parent_id;
    public $comments;
    public $type;
    public function mount($parent_id , $type) {
        if($type == 'course') {
            $this->parent = Course::with('comments')->FindOrFail($parent_id);
        } elseif($type == 'lesson') {
            $this->parent = Lesson::with('comments')->FindOrFail($parent_id);
        } elseif($type == 'article') {
            $this->parent = Article::with('comments')->FindOrFail($parent_id);
        }
        $this->comments();
    }
    #[On('comment')]
    public function comments()
    {
        $this->comments =  $this->parent->comments()
            ->with('user')
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function render()
    {
        return view('livewire.comments.comments');
    }
}
