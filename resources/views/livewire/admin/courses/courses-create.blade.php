<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <x-input label="{{__('Title')}}" value="{{old('title') }}" name="title"/>
        @error('text')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        <div>
            <label class="form-label">{{__('Content')}}</label>
            <input id="id22" type="hidden"  name="description" value="{{$description}}">
            <trix-editor input="id22" class="trix-content"></trix-editor>
        </div>
        @error('description')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        <x-file label="introVideo" name="path_video" type="file" />
        @error('path_video')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        <x-file label='{{__("Cover Image")}}' name="path_image" type="file" />
        @error('path_image')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        <x-input label="{{__('price')}}" name="price"  type="number" class="w-34" />
        @error('price')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
</div>

@script
<script>
    const trixEditor=document.getElementById('id22');
    addEventListener("trix-blur",(event)=>{
        @this.set('description',trixEditor.getAttribute('value'))
    })
</script>
@endscript


