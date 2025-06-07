<x-app-layout>
    <!-- start Lesson -->
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-2 mt-2  ">
            {{-- Start Show Lesson Content --}}
            <div class=" col-span-7 col-start-1 px-2">
                <div>
                    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
                    {{-- <div> --}}
                    @livewire('video_plyer', ['video_id' => $lesson->id,  'type' => 'lesson' ])
                    {{-- </div> --}}
                    <div>
                        <div class=" shadow-md rounded-md  p-2">
                                <div class="flex gap-x-1">
                                    @if ($lesson->free)
                                        <x-badge value="{{$lesson->free}}" class="badge-warning"/>
                                    @endif
                                </div>
                                <h2 class="my-2 text-2xl tracking-tight text-gray-900">{{$lesson->title}}</h2>
                                <hr/>
                                <p class="mb-3 font-normal text-gray-700 text-sm mt-2 ">{{$lesson->description}}</p>
                        </div>
                    </div>
                </div>
                {{-- Comments --}}
                @livewire('comments.comments', ['parent_id' => $lesson->id , 'type' => 'lesson' ])
            </div>
            {{-- End Show Lesson Content --}}
            <div class=" rounded-sm overflow-hidden col-span-4 shadow-sm ">
                @livewire('section', ['section' => $lesson->section] )
            </div>
        </div>
    </div>
    <!-- end Lesson -->
</x-app-layout>
