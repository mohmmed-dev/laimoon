<div >
    {{-- Do your work, then step back. --}}
    <form wire:submit="search" class="flex justify-center items-center my-4">
        <div class="join">
            <input class="input join-item" wire:model="query" />
            <button type="submit" class="btn join-item rounded-r-full">{{__("Search")}}</button>
        </div>
    </form>
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
        <div >
            {{$articles->links()}}
        </div>
    </div>
</div>
