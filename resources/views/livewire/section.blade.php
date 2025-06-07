<div>
    <div class="bg-slate-100 border-slate-300 collapse border">
        <input type="checkbox" class="peer" />
        <div class="collapse-title bg-slate-900 text-white  font-semibold flex justify-between items-center">
            {{$section->title}}
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </div>
        <div class="collapse-content bg-slate-900 text-white ">
            <p class="p-2 text-white text-xs opacity-60 tracking-wide">{{$section->description}}</p>
            <ul class="list bg-base-100 rounded-box shadow-md">
                @forelse ($section->lessons as $lesson)
                @can('allWatch', [$section->course , $lesson])
                @php
                    $hoers_add_zero = sprintf('%02d', $lesson->hours);
                    $minutes_add_zero = sprintf('%02d', $lesson->minutes);
                @endphp
                    <li class="list-row">
                        <div class="text-4xl font-thin opacity-30 tabular-nums text-slate-900  ">#{{$lesson->order}}</div>
                        <div class="list-col-grow text-slate-900  ">
                            <div>
                                {{$lesson->title}}
                            </div>
                            <div class="text-xs uppercase font-semibold opacity-60">{{$hoers_add_zero . ':' . $minutes_add_zero }}</div>
                        </div>
                        <a href="{{route('lesson' , $lesson->id)}}" wire:navigate class="btn btn-square btn-ghos text-slate-900  ">
                            <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                                    <path d="M6 3L20 12 6 21 6 3z"></path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    @else
                @php
                    $hoers_add_zero = sprintf('%02d', $lesson->hours);
                    $minutes_add_zero = sprintf('%02d', $lesson->minutes);
                @endphp
                    <li class="list-row">
                        <div class="text-4xl font-thin opacity-30 tabular-nums text-slate-900  ">#{{$lesson->order}}</div>
                        <div class="list-col-grow text-slate-900  ">
                            <div>
                                {{$lesson->title}}
                            </div>
                            <div class="text-xs uppercase font-semibold opacity-60">{{$hoers_add_zero . ':' . $minutes_add_zero }}</div>
                        </div>
                    </li>
                @endcan
                @empty

            @endforelse
            </ul>
        </div>
    </div>

</div>
