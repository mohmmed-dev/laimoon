<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-button label="{{__('New Section')}}" class="mx-2" type="button" wire:click="$toggle('open')"/>
    <form  wire:submit.prevent="save"  wire:show="open">
        <x-input label="{{__('Title')}}" wire:model="form.title" />
        <x-input label="{{__('Description')}}" class="my-2" wire:model="form.description" />
            <x-button label="{{__('Cancel')}}" class="mx-2" type="button" wire:click="$toggle('open')"/>
            <x-button label="{{__('Save')}}" class="btn-primary" type="submit" spinner="save" />
    </form>

</div>
