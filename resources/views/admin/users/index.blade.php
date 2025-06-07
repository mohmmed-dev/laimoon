@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Users')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
    @livewire('admin.user.users-table')
@endsection
