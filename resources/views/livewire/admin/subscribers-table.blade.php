<div>
    {{-- Success is as dangerous as failure. --}}
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
                        <th scope="col" class="px-4 py-3">
                            {{__('Status')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('Price')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('subscript Start')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('subscript End')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @foreach ($user->subscriptions as $subscription)
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                                        <td class="px-6 py-4">{{$user->name}}</td>
                                        <td class="px-6 py-4">{{$user->email}}</td>
                                        <td class="px-6 py-4">
                                            {{$subscription->stripe_status}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$subscription->stripe_price}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$subscription->created_at->toDateString()}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$subscription->ends_at ? $subscription->ends_at->toDateString() : __('No End Date')}}
                                        </td>
                                    </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$users->links()}}
        </div>
    </div>

</div>
