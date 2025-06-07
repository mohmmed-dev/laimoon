<x-app-layout>
    <!-- start Home -->
    <div class="container mx-auto mt-5">
        <h2 class="m-3 text-3xl">{{__("Courses")}}</h2>
        <div class="grid grid-cols-12  gap-1 px-4">
            @forelse ($courses as $course)
            <div  class="my-2 block col-start-2 col-span-10 sm:col-start-0 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <a href="{{route('course',$course->id)}}" >
                    @livewire('course', ['course' => $course], key($course->id))
                </a>
            </div>
            @empty
            @endforelse
        </div>
        <h2 class="m-3 text-3xl">{{__("Lessons")}}</h2>
        <div class="grid grid-cols-12  gap-1 px-4">
            @forelse ($articles as $article)
            <div class="  my-2 col-start-2 col-span-10 sm:col-start-0 sm:col-span-6 md:col-span-4 lg:col-span-3">
                <a href="{{route('article',$article->id)}}" wire:navigate>
                    @livewire('article', ['article' => $article], key($article->id))
                </a>
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- end Home -->
</x-app-layout>
