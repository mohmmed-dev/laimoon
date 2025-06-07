<?php

namespace App\Livewire\Comments;

use App\Events\Notifications;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class FormComment extends Component
{
    public $body;
    public $parent_id;
    public $parent;
    public $comment;
    public $routeTo;
    public $auth;
    public $type;
    public  function mount($parent_id,$type,$comment = null) {
        if($type == 'course') {
            $this->parent = Course::FindOrFail($parent_id);
            $this->auth = $this->parent;
        } elseif($type == 'lesson') {
            $this->parent = Lesson::FindOrFail($parent_id);
            $this->auth = $this->parent->course;
        } elseif($type == 'article') {
            $this->parent = Article::FindOrFail($parent_id);
        }
        $this->routeTo = route($type,$parent_id);
        $this->comment = $comment;
    }
    public function save() {
        if($this->type != 'article'  && !Gate::allows('watch', $this->auth)) {
            session()->flash('error', __('You are not allowed to comment on this course'));
            return;
        }
        $this->parent->comments()->create(
            [
                'user_id' => auth()->user()->id,
                'body' => $this->body,
                'parent_id' => $this->comment,
            ]
        );
        $message = '';
        if(!empty($this->comment)) {
            $user = Comment::findOrFail($this->comment)->user;
            $message = __('Your Comment Has Been Answered By') . auth()->user()->name;
            Notifications::dispatch($user,
            " <li>
                <a href='$this->routeTo' class='cart bg-slate-200 shadow-sm'>
                <div>
                    <div class='card-body bg-slate-800 text-white rounded-md'>
                        <p>$message  </p>
                    </div>
                </div>
                </a>
            </li> "
            );
            $user->alert->alerts += 1;
            $user->alert->save();
            $this->dispatch('replay');
        } else {
            $message = __('Comment Has Been Added by') . auth()->user()->name;
            Notifications::dispatch(User::findOrFail(1),
            " <li>
                <a href='$this->routeTo' class='cart bg-slate-200 shadow-sm'>
                <div>
                    <div class='card-body bg-slate-800 text-white rounded-md'>
                        <p>$message  </p>
                    </div>
                </div>
                </a>
            </li> "
            );
            $this->dispatch('comment');
        }
        $this->body = null;
    }
    public function render()
    {
        return view('livewire.comments.form-comment');
    }
}
