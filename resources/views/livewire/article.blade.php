<div class="bg-white border player_icon border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl  hover:bg-gray-50">
    {{-- Success is as dangerous as failure. --}}
        <img class=" h-44 w-full rounded-t-lg " src="{{asset('storage/courses/' . $article->path_image )}}" alt="">
        <div class=" p-2">
            <h5 class="mb-1 text-xl tracking-tight text-gray-900 ">{{$article->title}}</h5>
            <span class="text-sm tracking-tight text-gray-300 ">{{$article->created_at->diffForHumans()}}</span>
        </div>
</div>
