<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    @if(session('success'))
    <x-alert title="{{__('Success')}}" description="{{__(session('success'))}}" class="m-2 bg-green-500 shadow-none border-none" dismissible />
    @elseif (session('update'))
    <x-alert title="{{__('Update')}}" description="{{__(session('update'))}}" class="m-2 bg-amber-500 shadow-none border-none" dismissible />
    @elseif(session('delete'))
    <x-alert title="{{__('Delete')}}" description="{{__(session('delete'))}}" class="m-2 bg-red-500 shadow-none border-none" dismissible />
    @elseif(session('cancel'))
    <x-alert title="{{__('Cancel')}}" description="{{__(session('cancel'))}}" class="m-2 bg-red-500 shadow-none border-none" dismissible />
    @endif
</div>
