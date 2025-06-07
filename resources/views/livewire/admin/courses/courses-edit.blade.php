<div>
    {{-- Stop trying to control. --}}
        <x-input label="{{__('Title')}}" value="{{ $course->title }}" name="title"/>
        @error('text')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
       <div class="">
        <input id="id22" type="hidden"  name="description" value="{{$description}}">
        <trix-editor input="id22" class="trix-content">{!!  $course->description !!}</trix-editor>
        @error('description')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
       </div>
        <x-file label="{{__('introVideo')}}" name="path_video" type="file" />
        @error('path_video')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        <x-file label='{{__("Cover Image")}}' name="path_image" type="file" />
        @error('path_image')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
       <div class="flex gap-1 items-center">
        <div>
            <x-input label="{{__('Price')}}" value="{{ $course->price }}"  name="price"   class="w-34" />
            @error('price')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
        <div>
            <x-input label="{{__('beforePrice')}}" value="{{ $course->beforePrice }}"  name="beforePrice"   class="w-34" />
            @error('price')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
        <div>
            <x-input label="{{__('Language')}}" value="{{ $course->language }}"  name="language"  class="w-34" />
            @error('language')
            <span class="text-md text-red-500 my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="flex items-center mb-4">
            <input name="free" id="default-checkbox" type="checkbox" value="true" @checked($course->free) class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500  ">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__("Free")}}</label>
        </div>
        <div class="flex items-center">
            <input name="public" checked id="checked-checkbox" type="checkbox" value="true" @checked($course->public) class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500  ">
            <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__("Public")}}</label>
        </div>
    </div>
    </div>

@script
<script>
    const trixEditor=document.getElementById('id22');
    addEventListener("trix-blur",(event)=>{
        @this.set('description',trixEditor.getAttribute('value'))
    })
</script>
@endscript