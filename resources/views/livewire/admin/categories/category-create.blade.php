<div>
    {{-- The Master doesn't talk, he acts. --}}
        <x-form wire:submit='save' class=" w-80 mb-2 p-2 shadow-md rounded-md bg-white">
            <x-input  label="{{__('Add New Category')}}" wire:model.live="name" >
                <x-slot:append>
                    <x-button label="{{__('Add')}}" type="submit" class="join-item btn-gray" />
                </x-slot:append>
            </x-input>
        </x-form>
</div>
