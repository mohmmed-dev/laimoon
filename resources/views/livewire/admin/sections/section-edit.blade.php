<div >
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-button label="{{__('Edit')}}" wire:click="$toggle('open')" class="btn-primary" type="button" />
        <form  wire:submit.prevent="save"  wire:show="open" class=" mb-2  gap-x-2">
            <x-input label="Title" wire:model="form.title" />
            <x-input label="Description" wire:model="form.description" />
            <div class="flex justify-center items-end gap-2 mt-2">
            <x-button label="{{__('Update')}}" class="btn-primary" type="submit" spinner="save" />
            <x-button label="{{__('Delete')}}" class="btn-danger"  type="button" wire:click="delete" />
            <x-button label="{{__('Cancel')}}" class="btn-danger"  type="button"  wire:click="$toggle('open')" />
           </div>
        </form>
</div>
