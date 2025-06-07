<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    {{-- <div> --}}
        @livewire('video_plyer', ['video_id' => $course->id,  'type' => 'course' ])
    {{-- </div> --}}
    <div>
        <div class=" shadow-md rounded-md  p-2">
                <div class="flex gap-x-1">
                    <x-badge value="{{$course->language}}" class="badge-primary"/>
                    @if ($course->free)
                        <x-badge value="{{$course->free}}" class="badge-warning"/>
                    @endif
                </div>
                <h2 class="my-2 text-2xl tracking-tight text-gray-900">{{$course->title}}</h2>
                <hr/>
                <p class="mb-3 font-normal text-gray-700 text-sm mt-2 ">{{$course->description}}</p>
                <div class="flex items-center justify-between">
                    <div class="m-2">
                        <div>{{__("Course Duration")}} {{$time}}</div>
                        <div>{{__("Student")}} {{$course->students_count}}</div>
                        <div>{{__("Teachers")}}
                        <div class="avatar-group -space-x-6">
                           @foreach ($course->teachers as $teacher)
                           <div class="avatar">
                                <div class="w-10 h-10">
                                    <img src="{{ $teacher->profilePhotoPath() }}" />
                                </div>
                            </div>
                           @endforeach
                            </div>
                        </div>
                        <span>{{__('Date') . ' ' . $course->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                <div class="flex justify-start items-center gap-x-2">
                    @foreach ($course->categories as $category)
                        @livewire('category', ['category' => $category], key($category->id))
                    @endforeach
                </div>
            </div>
    </div>

</div>
