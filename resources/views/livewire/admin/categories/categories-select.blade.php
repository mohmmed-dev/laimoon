<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div>
        {{-- The whole world belongs to you. --}}
    <button wire:click="$toggle('open')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">{{__("Categories")}} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg>
    </button>

    <!-- Dropdown menu -->
    <x-form wire:submit="save" wire:show="open"  class="z-10 bg-white rounded-lg shadow-sm w-60 ">
        <div class="p-3">
          <label for="input-group-search" class="sr-only">{{__("Search")}}</label>
          <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            </div>
            <input type="text" wire:model.live="query" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white " placeholder='{{__("Search")}}'>
          </div>
        </div>
        <ul class="h-48 px-1 pb-1 w-full overflow-y-auto text-sm text-gray-700">
          @forelse ($categories as $category)
          <li class="flex justify-between items-center w-full">
            <div class="flex items-center p-2 rounded-sm  hover:bg-gray-100 w-full" >
                <div class="flex items-center">
                {!!$category->courses->contains($main)? '&#9745;' :'' !!}
                <label for=""> {{$category->name}}</label>
                </div>
                <input wire:model="categories_chose" type="checkbox" value="{{$category->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500  ">
            </div>
          </li>
          @empty

          @endforelse
        </ul>
      <x-button label="{{__('Save')}}" class="btn-primary" type="submit" spinner="save" />

    </x-form>

    </div>
</div>
