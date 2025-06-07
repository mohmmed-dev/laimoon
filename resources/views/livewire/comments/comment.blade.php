
<div class="rounded-md border-2  my-1 p-2 relative">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @livewire('comments.comment-box', ['comment' => $comment])
    <div class="flex justify-end" >
        <span class=" block w-fit cursor-pointer" wire:click="$toggle('open')" wire:click="showRepay" >رد</span>
    </div>
    <div wire:show="open">
        <div class="my-4 px-2 py-4 max-h-72 overflow-auto">
            @forelse ($this->comments as $commentForComment)
            <div class="pb-4 border-2 rounded-md my-1 p-2 relative">
                @livewire('comments.comment-box', ['comment' => $commentForComment], key($commentForComment->id) )
            </div>
            @empty
            @endforelse
        </div>
        @livewire('comments.form-comment' , ['parent_id' => $comment->commentable_id ,'type' => 'course' , 'comment' => $comment->id ])
    </div>
</div>
