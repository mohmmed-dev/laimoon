<div>
    {{-- Success is as dangerous as failure. --}}
    <div>
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
                            {{__('Title Course')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('Price')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('Date')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                        <td class="px-6 py-4">{{$order->user->name}}</td>
                        <td class="px-6 py-4">{{$order->user->email}}</td>
                        <td class="px-6 py-4">{{$order->course->title}}</td>
                        <td class="px-6 py-4">
                            {{$order->price > 0 ? $order->price : 'free'  }}
                        </td>
                        <td class="px-6 py-4">
                            {{$order->created_at->toDateString()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$orders->links()}}
        </div>
    </div>
</div>
