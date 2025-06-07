<div>
    {{-- Do your work, then step back. --}}
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
                        {{__('Name')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Email')}}
                    </th>
                    @can('admin')
                    <th scope="col" class="px-4 py-3">
                        {{__('Level')}}
                    </th>
                    @endcan
                    <th scope="col" class="px-4 py-3">
                        {{__('Level User')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Date')}}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                    <td class="px-6 py-4">{{$user->name}}</td>
                    <td class="px-6 py-4">{{$user->email}}</td>
                    @can('admin')
                    <td class="px-6 py-4">
                        @livewire('admin.user.user_level', ['user_id' => $user->id], key($user->id))
                    </td>
                    @endcan
                    <td class="px-6 py-4">{{$user->administration_level == 2 ? 'admin' : ($user->administration_level == 1 ? 'teacher' : 'user' )}}</td>
                    <td class="px-6 py-4">
                        {{$user->created_at->toDateString()}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{$users->links()}}
    </div>
</div>
