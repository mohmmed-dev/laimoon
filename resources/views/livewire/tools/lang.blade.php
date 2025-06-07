<div>
    {{-- Do your work, then step back. --}}
    <details class="dropdown">
        <summary class="btn m-1 uppercase">{{__("$lang")}}</summary>
        <ul class="menu dropdown-content bg-slate-100 rounded-box z-1 w-fit p-2 shadow-sm">
            <li class="{{$lang == 'ar' ? 'bg-slate-600 text-white' : ''}} w-fit rounded-md "><a href="{{route('lang' , 'ar')}}">{{__("AR")}}</a></li>
            <li class="{{$lang == 'en' ? 'bg-slate-600 text-white ' : ''}} mt-1 w-fit  rounded-md"><a  href="{{route('lang', 'en')}}" >{{__("EN")}}</a></li>
        </ul>
    </details>
</div>
