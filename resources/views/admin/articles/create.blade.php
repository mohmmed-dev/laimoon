@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Create Articles')}}</h1>
@livewire('tools.session')
{{session('success')}}
@if(session('success'))
dkkdkdkd
@endif
@endsection

@section('content')
<div class="container">
    <div class=" justify-center items-center h-fit mb-5">
        @livewire('admin.articles.articles-create')
    </div>
</div>
@endsection
