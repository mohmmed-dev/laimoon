@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Dashboard')}}</h1>
{{-- <x-alert-session/> --}}
@endsection
@section('content')
    <div class="container">
        <div class="flex justify-center items-center gap-2 flex-wrap D">
            <div class="py-2 px-2 bg-zinc-50 rounded-sm shadow-md  w-56  border-l-2 border-blue-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Courses')}}</h2>
                    <h2>{{$courses}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-2 px-2 bg-zinc-50 rounded-sm shadow-md w-56  border-l-2 border-red-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Teachers')}}</h2>
                    <h2>{{$teachers}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-2 px-2 bg-zinc-50 rounded-sm shadow-md w-56  border-l-2 border-red-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Sold Courses')}}</h2>
                    <h2>{{$coursesSold}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
            <div class="py-2 px-2 bg-zinc-50 rounded-sm shadow-md w-56  border-l-2 border-red-600 flex justify-between items-center col-span-1">
                <div>
                    <h2>{{__('Number Of Subscriptions')}}</h2>
                    <h2>{{$subscriptions}}</h2>
                </div>
                <div><i class="fas fa-align-left text-3xl text-gray-300"></i></div>
            </div>
        </div>
        </div>
    {{-- { <div class="my-4"> --}}
    {{-- <canvas id="myChart"></canvas> --}}
     {{-- </div> --}}
@endsection
