<x-app-layout>
    <!-- start Course -->
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-2 mt-2  ">
            {{-- Start Show Course Content --}}
            <div class=" col-span-8 col-start-3">
                <div>
                    <img class=" h-56 w-full rounded-t-lg " src="{{asset('storage/courses/' . $article->path_image )}}" alt="">
                </div>
                <div class="flex items-center my-2">
                    <img class=" h-10 w-10   rounded-full " src="{{$article->user->profilePhotoPath()}}" alt="">
                    <div class="mx-2">
                        <h5 class=" text-md font-bold tracking-tight text-gray-900 ">{{$article->user->name}}</h5>
                        <h5 class="text-sm tracking-tight text-gray-900 ">{{$article->created_at->diffForHumans()}}</h5>
                    </div>
                </div>
                <div class="my-3 px-2 mb-6">
                        <h5 class="mb-1 text-xl tracking-tight text-gray-500 ">{{$article->title}}</h5>
                        <p class="mb-1 text-xl tracking-tight text-gray-900 my-4 ">{!! $article->description !!}</p>
                </div>
                {{-- Comments --}}
                @livewire('comments.comments', ['parent_id' => $article->id , 'type' => 'article' ])
            </div>
        </div>
    </div>
            {{-- End Show Course Content --}}
    </div>
    <!-- end Course -->
</x-app-layout>

