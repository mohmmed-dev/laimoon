<div >
    {{-- Care about people's approval and you will be their prisoner. --}}
    <details class="dropdown" >
        <summary  class="btn m-1">
        <svg xmlns="http://www.w3.org/2000/svg"  fill="#ffffff" viewBox="0 0 24 24"  stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
        <div class="badge badge-soft badge-info">{{$this->user->alert->alerts ?? 0}}</div>
        </summary>
        <ul  wire:click="alerts"  class="menu bg-slate-500 dropdown-content rounded-box z-1 w-60 overflow-hidden p-2 shadow-sm">
            @foreach ($notifications as $notification)
            {!!   $notification->message !!}
            @endforeach
        </ul>
    </details>
</div>
