<x-app-layout>
    <!-- start Course -->
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-2 mt-2  ">
            {{-- Start Show Course Content --}}
            <div class=" col-span-7 col-start-1 px-2">
                @livewire('course_details', ['course' => $course , 'time'=> $time])
                {{-- Paymit Cart --}}
                @cannot('watch', $course)
                <div class="card card-border bg-base-100 my-2 p-2 w-full">
                    @livewire('tools.session')
                    <div class="card-actions justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold">{{__('Course Price')}}</h2>
                            <span class=" text-2xl ">{{$course->price}}</span>
                            <span class=" text-red-500 line-through ">{{$course->beforePrice}}</span>
                        </div>
                        <a href="{{route("payment.buying.checkout",$course->id)}}" class="btn btn-primary">{{__('Buy Now')}}</a>
                    </div>
                </div>
                @endcannot
                {{-- Comments --}}
                @livewire('comments.comments', ['parent_id' => $course->id , 'type' => 'course' ])
            </div>
            {{-- End Show Course Content --}}
            <div class=" rounded-sm overflow-hidden col-span-4 shadow-sm ">
                @foreach ($course->sections as $section)
                @livewire('section', ['section' => $section], key($section->id) )
                @endforeach
            </div>
        </div>
    </div>
    <!-- end Course -->
</x-app-layout>
