<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div id="video_work">
        {{-- {{dd($video->video->{'webm_Format_' . 240})}} --}}
        <video id="videoPlayer" class="w-full max-h-96" autoplay controls>
        @if ($quality == 1080)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 1080})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 1080})}}" type="video/mp4">
        @elseif($quality == 720)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 720})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 720})}}" type="video/mp4">
        @elseif($quality == 480)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 480})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 480})}}" type="video/mp4">
        @elseif($quality == 360)
            <source id='web_source' src="{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 360})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 360})}}" type="video/mp4">
        @else
            <source id='web_source' src="{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 240})}}" type="video/webm">
            <source id='mp4_source' src="{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 240})}}" type="video/mp4">
        @endif
        Your browser does not support the video tag.
        </video>
</div>
    <div class="flex justify-between items-center mt-2">
        <select id="qualityPlayer" wire:model.change="quality" class="bg-gray-50  w-20 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg  block p-2.5 ing-blue-500  hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 ">
            @foreach ($this->qualityVideo() as $key => $value)
                    @if(!empty($value))
                    <option value="{{$key}}" {{$quality ==  $key ? 'selected' : ''}} >{{$key}}</option>
                    @endif
            @endforeach
        </select>
    </div>
</div>

@script

<script>
    document.getElementById('qualityPlayer').onchange = function() {
        var video = document.getElementById('videoPlayer');
        let curTime = video.currentTime;
        console.log('jd');
        var quality = document.getElementById('qualityPlayer').value;
        if(quality == '1080') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 1080})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 1080})}}" ;
        } else if(quality == '720') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 720})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 720})}}" ;
        } else if(quality == '480') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 480})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 480})}}" ;
        } else if(quality == '360') {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 360})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 360})}}" ;
        } else {
            document.getElementById('web_source').src = "{{asset('storage/videos/' .  $video->video->{'webm_Format_' . 240})}}" ;
            document.getElementById('mp4_source').src = "{{asset('storage/videos/' .  $video->video->{'mp4_Format_' . 240})}}" ;
        }
        video.load();
        video.play();
        video.currentTime = curTime;
    };


</script>
@endscript

