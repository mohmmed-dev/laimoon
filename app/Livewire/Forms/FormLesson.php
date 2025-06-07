<?php

namespace App\Livewire\Forms;

use App\Helpers\Slug;
use App\Jobs\HandlingVideos;
use App\Models\Lesson;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;


class FormLesson extends Form
{
    use \Livewire\WithFileUploads;
    public ?Lesson $lesson;
    public $section_id = null;
    public $course_id = null;

    #[Validate('required|string')]
    public $title = '';

    #[Validate('required|string')]
    public $description = '';

    public $path_video;

    #[Validate('required|boolean')]
    public $free = 0;

    #[Validate('required|integer')]
    public $order = 0;

    public $slug = '';

    public function setLesson(Lesson $lesson)
    {
        $this->lesson = $lesson;

        $this->title = $lesson->title;

        $this->description = $lesson->description;

        $this->free = $lesson->free;
    }


    public function store($section_id, $course_id)
    {
        $this->validate([
            'path_video' =>'required|file|mimes:mp4,mov,avi,wmv|max:10240',
        ]);
        $pathName = Str::random(16) . time();
        $videoPath = $pathName . '.' . $this->path_video->getClientOriginalExtension();

        $this->path_video->storeAs('videos' , $videoPath , 'public');
        $this->path_video = $videoPath;
        $this->section_id = $section_id;
        $this->course_id = $course_id;
        $this->slug = Slug::uniqueSlug($this->title,'lessons');
        $lesson = Lesson::create($this->only(['title', 'description', 'path_video', 'section_id', 'course_id','slug']));
        HandlingVideos::dispatch($videoPath,'public',$lesson );
    }

    public function update()
    {
        $this->validate([
            'path_video' =>'nullable|file|mimes:mp4,mov,avi,wmv|max:10240',
        ]);
        if(!empty($this->path_video)) {
            $pathName = Str::random(16) . time();
            $videoPath = $pathName . '.' . $this->path_video->getClientOriginalExtension();
            $this->path_video->storeAs('videos' , $videoPath , 'public');
            $this->path_video = $videoPath;
            $this->lesson->update(
                $this->only(['title', 'description',"free" , 'path_video','order'])
            );
            HandlingVideos::dispatch($videoPath,'public',$this->lesson );
        } else {
            $this->lesson->update(
                $this->only(['title', 'description',"free",'order'])
            );
        }
    }
    public function delete($lesson)
    {
        $lesson->delete();
    }
}
