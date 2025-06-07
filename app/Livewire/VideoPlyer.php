<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class VideoPlyer extends Component
{
    public $video_id;
    public $video;
    public $convertedvideo;
    public $qualities = array(1080,720,480,360,240);
    public $quality = 240;
    public $arr;

    public function mount($video_id,$type) {
        if($type == 'course') {
            $this->video = Course::findOrFail($video_id);
            $this->convertedvideo = $this->video->video;
        } else {
            $this->video = Lesson::find($video_id);
            $this->convertedvideo = $this->video->video;
        }
    }


    public function qualityVideo() {
        foreach($this->qualities as $quality) {
            $this->arr[$quality] = $this->convertedvideo->{'mp4' . '_Format_' . $quality};
        }
        return $this->arr;

    }
    public function render()
    {
        return view('livewire.video-plyer');
    }
}
