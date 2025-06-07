<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <div class=" bg-white shadow-md rounded-md my-4 px-2 py-4 overflow-auto" style="max-height: 550px;">
                @forelse ($comments as $comment)
                        <div class=" text-end">{{__("Add To Title ") . $comment->commentable->title}}</div>
                        @livewire('comments.comment', ['comment' => $comment] , key($comment->id))
                    @empty
                    <div class="text-center text-2xl m-3">{{__("Empty")}}</div>
                @endforelse
            </div>
    </div>
    <div class="my-2">
        {{$comments->links()}}
    </div>
</div>
