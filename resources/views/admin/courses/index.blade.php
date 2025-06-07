@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Courses')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
    <div class="bg-slate-900 text-white p-2 rounded-md w-fit h-fit m-2">
        @livewire('a_url', ['text' => "Create",'url'=>'admin.courses.create'])
    </div>
    @livewire('admin.courses.courses-table')
@endsection
