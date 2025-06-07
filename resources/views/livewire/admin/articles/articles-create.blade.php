<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="flex flex-col justify-center items-center">
        <div class="w-full max-w-2xl">
            <x-form wire:submit='save' class="mb-2">
                <x-input label="{{__('Title')}}" wire:model='form.title' />
                <label class="form-label">{{__('Content')}}</label>
                <input id="id22" type="hidden"  name="description" value="{{$description}}" wire:model='form.description' >
                <trix-editor input="id22" class="trix-content"></trix-editor>
                @error('form.description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <x-file wire:model="form.path_image" label="{{__('Cover Image')}}" hint="{{__('Image')}}" />
                <x-button label="{{__('Create')}}" class="btn-primary my-2" type="submit" spinner="save" />
            </x-form>
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