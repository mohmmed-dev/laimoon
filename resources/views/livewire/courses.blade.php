<div>
    {{-- Stop trying to control. --}}
    <form wire:submit="search" class="flex justify-center items-center my-4">
        <div class="join">
            <input class="input join-item" wire:model="query" />
            <button type="submit" class="btn join-item rounded-r-full">{{__("Search")}}</button>
        </div>
    </form>
    <div class="grid grid-cols-12  gap-1 px-4">
        @forelse ($courses as $course)

        <div  class="my-2 block col-start-2 col-span-10 sm:col-start-0 sm:col-span-6 md:col-span-4 lg:col-span-3">
            <a href="{{route('course',$course->id)}}" wire:navigate >
                @livewire('course', ['course' => $course], key($course->id))
            </a>
        </div>

        @empty
        @endforelse
    </div>

    <div >
        {{$courses->links()}}
    </div>
</div>
