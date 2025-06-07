<div class="bg-white border player_icon border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl  hover:bg-gray-50">
    {{-- Success is as dangerous as failure. --}}
        <img class=" h-44 w-full rounded-t-lg " src="{{asset('storage/images/' . $course->path_image )}}" alt="">
        <div class="flex items-center gap-x-2 px-2">
            <a href="{{route('course',$course->id)}}" wire:navigate class="flex flex-col justify-between p-2 leading-normal">
                <h5 class="mb-1 text-xl tracking-tight text-gray-900 ">{{$course->title}}</h5>
                <div class="flex  items-center gap-x-2">
                    <div class="flex gap-x-1 items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        {{$course->students_count}}
                    </div>
                    <div class="flex gap-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{$time}}
                    </div>
                </div>
            </a>
        </div>
</div>
