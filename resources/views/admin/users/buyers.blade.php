@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Buyers')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
    @livewire('admin.buyers-table')
@endsection
