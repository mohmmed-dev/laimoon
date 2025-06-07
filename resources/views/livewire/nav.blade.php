<div class=" flex justify-start items-center">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <nav>
        <a href="{{ route('home') }}" wire:navigate class='inline-block m-2 decoration-inherit'>
            {{ __('Courses') }}
        </a>
        <a href="{{ route('articles') }}" wire:navigate class='inline-block m-2  text-pretty' :active="request()->routeIs('articles')">
            {{ __('Articles') }}
        </a>
        @auth
            <a href="{{ route('myCourses') }}" wire:navigate class='inline-block m-2  text-pretty' :active="request()->routeIs('mycourses')">
                {{ __('My Courses') }}
            </a>
        @endauth
    </nav>
</div>
