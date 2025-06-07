@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Create Articles')}}</h1>
@livewire('tools.session')
@endsection

@section('content')
<div class="container">
    <div class=" justify-center items-center h-fit mb-5">
        @livewire('admin.categories.categories-select' , ['type' => 'article' , 'id' => $article->id])
        @livewire('admin.articles.articles-edit', ['article' => $article->id])
    </div>
</div>
@endsection
