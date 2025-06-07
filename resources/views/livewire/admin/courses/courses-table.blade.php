<div>
    {{-- In work, do what you enjoy. --}}
    <x-form wire:submit='search' class="w-80 mb-2">
        <x-input  label="{{__('Search')}}" wire:model.live="query">
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
                        {{__('Teachers')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Students')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Section')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Lessons')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Details')}}
                    </th>
                    <th scope="col" class="px-4 py-3">
                        {{__('Date')}}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50">
                    <td class="px-6 py-4">{{$course->title}}</td>
                    <td class="px-6 py-4">
                        @forelse ($course->teachers as $teacher)
                            <a href="#">{{$teacher->name}}</a>
                        @empty
                        @endforelse
                    </td>
                    <td class="px-6 py-4">
                        {{$course->students_count}}
                    </td>
                    <td class="px-6 py-4">
                        {{$course->sections_count}}
                    </td>
                    <td class="px-6 py-4">
                        {{$course->lessons_count}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="bg-blue-900 text-white p-2 rounded-md w-fit h-fit m-2">
                            <a href="{{route('admin.courses.show',$course->id)}}">{{__('Details')}}</a>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                            {{$course->created_at->toDateString()}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{$courses->links()}}
    </div>
</div>
