{{-- <div class=" col-span-8">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <form action="/" wire:navigate>
        @csrf
        <div class="mb-5">
        <label for="title" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Title')}}</label>
        <input type="text"  name="title" id="title" value="{{$course->title ?? old('title')}}" autocomplete="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5">
        @error('title')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        </div>
        <div class="mb-5">
        <label for="cover_image" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Cover course')}}</label>
        <input onchange="readCoverImage(this)" type="file"  name="cover_image" id="cover_image" value="{{old('cover_image')}}" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer p-2 bg-gray-50 dark:text-gray-400 focus:outline-none">
        @error('cover_image')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        {{-- <img src="{{asset('storge/'. ($course->cover_image ?? ''))}}" alt="" id="cover-image-thumb"> --}}
        <div class="mb-5">
        <label for="cover_image" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Cover course')}}</label>
        <input onchange="readCoverImage(this)" type="file"  name="cover_image" id="cover_image" value="{{old('cover_image')}}" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer p-2 bg-gray-50 dark:text-gray-400 focus:outline-none">
        @error('cover_image')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        </div>
        <div class="mb-5">
        <label for="ccategory" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Category')}}</label>
        </div>
        <div class="mb-5">
        <label for="description" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Description')}}</label>
        <textarea  name="description "id="description" value="{{$course->description ?? old('description')}}" autocomplete="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"></textarea>
        @error('description')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
        </div>
        <div class="mb-5">
        <label for="price" class="block mb-2 font-medium text-gray-900 text-md ">{{__('Price')}}</label>
        <input type="number" name="price" id="price" value="{{$course->price ?? old('price')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5">
        @error('price')
        <span class="text-md text-red-500 my-2">{{$message}}</span>
        @enderror
    </div>
    <input type="submit" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none fxocus:ring-slate-300 font-medium rounded-lg text-md px-3 py-1 m-1">
    </form>
</div> 
