<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <x-form wire:submit="update()" class="w-40">
      <div class="flex">
          <select wire:model.change="level" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option value="2"  @selected($user->administration_level == 2)>{{__("Admin")}}</option>
              <option value="1"  @selected($this->user->administration_level == 0)>{{__("Teacher")}}</option>
              <option value="0" @selected($this->user->administration_level == 1)>{{__("Student")}}</option>
       </select>
       @if($user->id != auth()->user()->id)
           <x-button type="submit" label="{{__('Save')}}" class="join-item btn-primary" />
       @endif
      </div>
    </x-form>
</div>
