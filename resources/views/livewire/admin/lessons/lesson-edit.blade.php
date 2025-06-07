<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-button label="{{__('Edit')}}" class="mx-2" type="button" wire:click="$toggle('open')"/>
    <form  wire:submit.prevent="save"  wire:show="open" class="flex flex-col">
        <x-input label="{{__('Title')}}" wire:model="form.title" value="{{$lesson->title}}" />
        <x-input label="{{__('description')}}" wire:model="form.description" value="{{$lesson->description}}" />
        <x-file wire:model="form.path_video" label="Receipt" hint="Only mp4" />
        <div class="flex items-end mb-4 gap-x-1">
            <x-input label="{{__('order')}}" wire:model="form.order" min="0" value="{{$lesson->order}}" type="number" class="w-20" />
            <input wire:model="form.free" id="default-checkbox" type="checkbox" value="true" @checked($lesson->free) class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500  ">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__("Free")}}</label>
        </div>
        <div>
            <x-button label="{{__('Cancel')}}" class="mx-2" type="button" wire:click="$toggle('open')"/>
            <x-button label="{{__('Save')}}" class="btn-primary" type="submit" spinner="save" />
        </div>
    </form>

</div>
