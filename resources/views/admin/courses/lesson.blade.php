@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Create Section')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
<div class="container">
    <div class="justify-center items-center h-fit mb-5">
       @livewire('admin.sections.section_editor', ['course' => $course])
    </div>
</div>
@endsection
