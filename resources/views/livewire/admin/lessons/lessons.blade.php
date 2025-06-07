<div class="mb-2 text-slate-900 w-full">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @forelse ($this->lessons as $lesson)
        <x-card id="cart-{{$lesson->id}}" title='{{"#{$lesson->order} "  . $lesson->title}}' subtitle="{{$lesson->description}}" class=" shadow-md border-2 mb-1" separator progress-indicator>
            @livewire('admin.lessons.lesson_edit', ['lesson' => $lesson], key($lesson->id))
        </x-card >
    @empty
        <div>{{__("Empty")}}</div>
    @endforelse
</div>
