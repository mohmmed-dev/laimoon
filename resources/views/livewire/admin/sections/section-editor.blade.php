<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="mb-2">
        @livewire('admin.sections.section_create',['course_id' => $course->id], key($course->id))
    </div>
    @forelse ($this->sections as $section)
    <div class="bg-slate-100 border-slate-300 collapse border">
        <input type="checkbox" class="peer" />
        <div class="collapse-title bg-slate-900 text-white  font-semibold flex justify-between items-center">
            {{$section->title}}
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </div>
        <div class="collapse-content bg-slate-900 text-white ">
            <ul class="list bg-base-100 rounded-box shadow-md">
                    <li class="list-row w-full">
                        <x-card id="cart-{{$section->id}}" title="{{$section->title}}" class="mb-2 w-full text-slate-900" subtitle="{{$section->description}}" separator progress-indicator>
                            @livewire('admin.lessons.lessons', ['section' => $section] ,key($section->id))
                        <div class="flex items-start gap-x-2">
                            @livewire('admin.sections.section_edit', ['section' => $section->id], key($section->id))
                            @livewire('admin.lessons.lesson-create', ['section_id' => $section->id,'course_id' => $course->id], key($section->id))
                        </div>
                    </x-card>
                    </li>
            </ul>
        </div>
    </div>
    @empty
        <div>{{__('Nothing')}}</div>
    @endforelse

</div>
