@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Comments')}}</h1>
{{-- <x-alert-session/> --}}
@endsection
@section('content')
    <div class="container">
        @livewire('admin.comments.comments-table')
    </div>
@endsection
