<div class="flex flex-wrap gap-1 m-1">
    {{-- The best athlete wants his opponent at his best. --}}
    <a href="{{route('category.list', $category->slug)}}" class="badge badge-info text-white" wire:navigate>
        {{$category->name}}
    </a>
</div>
