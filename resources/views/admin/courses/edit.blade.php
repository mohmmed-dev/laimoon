@extends('layouts.dashboard')
@section('title')
<h1 class="text-3xl text-black pb-6">{{__('Create Course')}}</h1>
{{-- <x-alert-session/> --}}
@endsection

@section('content')
<div class="container">
    <div class=" h-fit mb-5">
        <div class="flex gap-x-2 items-start">
            @livewire('teachers' , ['course' => $course])
            @livewire('admin.categories.categories-select' , ['type' => 'course' , 'id' => $course->id])
        </div>
        <form action="{{route('admin.courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
            @method("PATCH")
            @csrf
            @livewire('admin.courses.courses_edit', ['course' => $course])
            <button type="submit" class="btn btn-primary mt-4">{{__('Update')}}</button>
        </form>

    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endSection
@section('scripts')
<!-- Initialize Quill editor -->
 <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#quill-editor', {
                theme: 'snow'
            });
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });

    function addCoverImage(input) {
        var file = input.files[0];
        var reader  = new FileReader();
        reader.onload = function(e)  {
            var imgElement = document.getElementById('cover-image-thumb');
            imgElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
</script>
@endSection
