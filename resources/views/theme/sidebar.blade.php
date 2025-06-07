    <div class="border-b-2 my-2"></div>
    <div class="{{request()->is('admin/dashboard') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Dashboard' , 'url' => 'admin.dashboard'])
    </div>
    <div class="{{request()->is('admin/users') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Users' , 'url' => 'admin.users'])
    </div>
    <div class="{{request()->is('admin/courses') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Courses' , 'url' => 'admin.courses.index'])
    </div>
    <div class="{{request()->is('admin/articles') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Articles' , 'url' => 'admin.articles.index'])
    </div>
    <div class="{{request()->is('admin/categories') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Categories' , 'url' => 'admin.categories'])
    </div>
    <div class="{{request()->is('admin/buyers') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Buyers' , 'url' => 'admin.buyers'])
    </div>
    <div class="{{request()->is('admin/subscribers') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Subscribers' , 'url' => 'admin.subscribers'])
    </div>
    <div class="{{request()->is('admin/comments') ? 'active-nav-link opacity-100' : 'opacity-75'}} px-3 flex items-center text-white py-2 pl-3 nav-item">
        @livewire('a_url', ['text' => 'Comments' , 'url' => 'admin.comments'])
    </div>
    <div class="border-b-2 my-4"></div>

