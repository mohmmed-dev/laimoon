@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Show course')}}</h1>
@endsection

@section('content')
   <div class="container">
        <div class="grid  grid-cols-12 gap-4">
            <div class="md:col-start-2 md:col-span-10">
                <div class="w-full py-2">
                    <div class="rounded-md overflow-hidden">
                        <table class="text-md bg-slate-900 text-white w-full" >
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap border-b">{{__("Title")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900 border-b">{{$course->title}}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap border-b ">{{__("Description")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900 border-b">{!! $course->description !!}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap border-b">{{__("Cover Image")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900 border-b"><img class="h-60" src="{{asset('storage/images/'. $course->path_image)}}" alt="{{$course->title}}" class="w-full"></td>
                            </tr>
                            @if($course->authors_count > 0)
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap border-b ">{{__("Teachers")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900 border-b">
                                    @foreach ($course->teachers as $teachers)
                                    {{$loop->first ? '':','}}
                                    {{$teachers->name}}
                                    @endforeach
                                </td>
                            </tr>
                            @endif
                            @if($course->categories_count > 0)
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap border-b ">{{__("Categories")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900 border-b">
                                    @foreach ($course->categories as $category)
                                    @livewire('category', ['category' => $category], key($category->id))
                                    @endforeach
                                </td>
                            </tr>
                            @endif
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{__("Price")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900">{{$course->price}}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{__("beforePrice")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900">{{$course->beforePrice}}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{__("Free")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900">{{$course->free == 1 ? 'TRUE' : 'false'}}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{__("Public")}}</th>
                                <td class="px-6 py-4 bg-gray-200 text-gray-900">{{$course->public == 1 ? 'TRUE' : 'FALSE'}}</td>
                            </tr>
                            <tr >
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{__("Show")}}</th>
                                <td class="px-6 py-4  mt-2   "><a class="btn btn-info" href="{{route('course',$course->id)}}">{{__("Show")}}</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="my-3">
                        <a class="btn btn-primary mt-4" href="{{route('admin.courses.edit',$course->id)}}">{{__("Edit")}}</a> <a class="btn btn-primary mt-4" href="{{route('admin.courses.lessons',$course->id)}}">{{__("Lessons")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
