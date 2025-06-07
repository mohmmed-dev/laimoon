<?php

namespace App\Jobs;

use App\Events\Notifications;
use App\Models\Alert;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\FFProbe;
use FFMpeg\Filters\Video\VideoFilters;
use FFMpeg\Format\Video\WebM;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Illuminate\Support\Str;

class HandlingVideos implements ShouldQueue
{
    use Queueable;

    protected $videoPath, $disk, $video , $format , $videoWith , $videoHeight , $names;

    /**
     * Create a new job instance.
     */
    public function __construct($videoPath,$disk,$video)
    {
        $this->videoPath = $videoPath;
        $this->disk = $disk;
        $this->video = $video;
    }

    protected function convertVideo($loopNumbers) {
        $this->format = array(
            array(
                (new X264('aac','libx264'))->setKiloBitrate(4096) , (new WebM('libvorbis','libvpx'))->setKiloBitrate(4096)
            ),
            array(
                (new X264('aac','libx264'))->setKiloBitrate(2048) , (new WebM('libvorbis','libvpx'))->setKiloBitrate(2048)
            ),
            array(
                (new X264('aac','libx264'))->setKiloBitrate(750) , (new WebM('libvorbis','libvpx'))->setKiloBitrate(750)
            ),
            array(
                (new X264('aac','libx264'))->setKiloBitrate(500) , (new WebM('libvorbis','libvpx'))->setKiloBitrate(500)
            ),
            array(
                (new X264('aac','libx264'))->setKiloBitrate(300) , (new WebM('libvorbis','libvpx'))->setKiloBitrate(300)
            ),
        );

        $this->videoWith = array(1920,1280,854,640,426);
        $this->videoHeight = array(1080,720,480,360,240);

        $this->names = array(
            array(
                '1080-' . $this->getFileName($this->videoPath,'mp4') ,
                '1080-' . $this->getFileName($this->videoPath,'webm')
            ),
            array(
                '720-' . $this->getFileName($this->videoPath,'mp4') ,
                '720-' . $this->getFileName($this->videoPath,'webm')
            ),
            array(
                '480-' . $this->getFileName($this->videoPath,'mp4') ,
                '480-' . $this->getFileName($this->videoPath,'webm')
            ),
            array(
                '360-' . $this->getFileName($this->videoPath,'mp4') ,
                '360-' . $this->getFileName($this->videoPath,'webm')
            ),
            array(
                '240-' . $this->getFileName($this->videoPath,'mp4') ,
                '240-' . $this->getFileName($this->videoPath,'webm')
            )
        );

        for($i = $loopNumbers; $i < 5; $i++ ) {
            for($j = 0; $j < 2; $j++) {
            FFMpeg::fromDisk($this->disk)->open('videos/'.$this->videoPath)->addFilter( function (VideoFilters $filters) use($i) {
            $filters->resize(new Dimension($this->videoWith[$i],$this->videoHeight[$i]));
                })->export()->toDisk(env('FILESYSTEM_DISK'))->inFormat($this->format[$i][$j])->save('videos/'.$this->names[$i][$j]);
            }
        }
    }

    private function getFileName($fileName,$type) {
        return preg_replace('/\\.[^.\\s]{3,4}$/' , '' , $fileName) . ".$type";
    }

  /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ffProbe = FFProbe::create();
        $video1 = $ffProbe->streams(public_path('storage/videos/'. $this->videoPath))->videos()->first();
        // dd($video1);

        $width = $video1->get('width');
        $height = $video1->get('height');
        $media = FFMpeg::fromDisk($this->disk)->open('videos/'.$this->videoPath);
        $getSecond =  $media->getDurationInSeconds();
        $hours = floor($getSecond / 3600);
        $minutes = floor($getSecond / 60) % 60;
        $quality = 0;
        $loopNum = 0;
            if(($width >= 1920) && ($height >= 1080)) {
                $this->convertVideo(0);
                $loopNum = 0;
                $quality = 1080;
            } elseif(($width >= 1280) && ($height >= 720)) {
                $this->convertVideo(1);
                $loopNum = 1;
                $quality = 720;
            } elseif(($width >= 854) && ($height >= 480)) {
                $this->convertVideo(2);
                $loopNum = 2;
                $quality = 480;
            } elseif(($width >= 640) && ($height >= 360)) {
                $this->convertVideo(3);
                $loopNum = 3;
                $quality = 360;
            } else{
                $this->convertVideo(4);
                $loopNum = 4;
                $quality = 240;
            }

        Storage::disk('public')->delete('videos/'.$this->videoPath);
        $converted_video = $this->video->video()->create();
        for($i = $loopNum; $i < 5; $i++) {
            $converted_video->{'mp4_Format_' . $this->videoHeight[$i]} = $this->names[$i][0];
            $converted_video->{'webm_Format_' . $this->videoHeight[$i]} = $this->names[$i][1];
        }
        $converted_video->save();

        $message = __('New Video uploaded By') .' '. $this->video->title;
        Notifications::dispatch(User::findOrFail(1),
        " <li>
            <a href='#' class='cart bg-slate-200 shadow-sm'>
            <div>
                <div class='card-body bg-slate-800 text-white rounded-md'>
                    <p>$message</p>
                </div>
            </div>
            </a>
        </li> ");

        $alert = Alert::where('user_id',1)->first();
        $alert->alerts++;
        $alert->save();



        if($this->video instanceof Lesson) {
            $this->video->update([
                'hours' => $hours ,
                'minutes' => $minutes ,
                'quality' => $quality ,
            ]);
        }
    }

    public function failed() {
        $message = __('Video Upload Failed') .' '. $this->video->title;
        Notifications::dispatch(User::findOrFail(1),
        " <li>
            <a href='#' class='cart bg-slate-200 shadow-sm'>
            <div>
                <div class='card-body bg-slate-800 text-white rounded-md'>
                    <p>$message</p>
                </div>
            </div>
            </a>
        </li> ");
        $alert = Alert::where('user_id',1)->first();
        $alert->alerts++;
        $alert->save();
    }
}
