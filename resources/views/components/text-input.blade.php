<div class=" relative">
    @if ($formRef)
        <button type="button" class="absolute top-0 right-0 h-full pr-2 flex items-center"
            x-on:click="$refs['input-{{ $name }}'].value=''; $refs['{{ $formRef }}'].submit()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif

    @if ($type !== 'textarea')
        <input type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}"
            name="{{ $name }}" id="{{ $name }}" x-ref="input-{{ $name }}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:right-2 ',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) />
    @else
        <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="10"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:right-2 ',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ])>
            {{ old($name, $value) }}
        </textarea>
    @endif



    @error($name)
        <div class="mt-1 text-sm text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
