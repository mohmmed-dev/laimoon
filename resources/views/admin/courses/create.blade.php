@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Create Course')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
<div class="container">
    <div class=" justify-center items-center h-fit mb-5">
        <form action="{{route('admin.courses.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @livewire('admin.courses.courses-create')
            <button type="submit" class="btn btn-primary mt-4">{{__('Create')}}</button>
        </form>
    </div>
</div>
@endsection




