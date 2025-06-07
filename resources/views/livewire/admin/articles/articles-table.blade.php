<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
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
                            {{__('Update')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('Show')}}
                        </th>
                        <th scope="col" class="px-4 py-3">
                            {{__('Date')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                        <td class="px-6 py-4">{{$article->title}}</td>
                        <td class="px-6 py-4 mt-2"><a class="btn btn-warning" href="{{route("admin.articles.edit",$article->id)}}">{{__("Edit")}}</a></td>
                        <td class="px-6 py-4  mt-2   "><a class="btn btn-info" href="{{route("article",$article->id)}}">{{__("Show")}}</a></td>
                        <td class="px-6 py-4">{{$article->created_at->toDateString()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-2">
            {{$articles->links()}}
        </div>
</div>
