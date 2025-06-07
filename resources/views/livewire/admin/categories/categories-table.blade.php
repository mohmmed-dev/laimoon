<div>
    {{-- The whole world belongs to you. --}}
    <x-form wire:submit='search' class=" w-80 mb-2">
        <x-input  label="{{__('Search')}}" wire:model.live="query" >
            <x-slot:append>
                <x-button label="{{__('Search')}}" class="join-item btn-primary" />
            </x-slot:append>
        </x-input>

    </x-form>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full text-md rtl:text-right ltr:text-left text-gray-500">
            <thead class="text-xl text-gray-700 bg-gray-50">
                <tr >
                    <th scope="col" class="px-4 py-3 ">
                        {{__('Title')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Articles')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Courses')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Delete')}}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                    <td class="px-6 py-4">{{$category->name}}</td>
                    <td class="px-6 py-4">{{$category->articles_count}}</td>
                    <td class="px-6 py-4">{{$category->courses_count}}</td>
                    <td class="px-6 py-4">
                        <x-button label="{{__('Delete')}}" wire:click="delete({{$category->id}})" class="join-item btn-red" />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{$categories->links()}}
    </div>
</div>
