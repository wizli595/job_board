<div class=" relative" x-data="{ val: '' }">
    <button type="button" class="absolute top-0 right-0 h-full pr-2 flex items-center" x-on:click="val ='' ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-4 h-4 text-slate-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <input type="text" placeholder="{{ $placeholder }}" value="{{ $value }}" name="{{ $name }}"
        id="{{ $name }}"x-model="val"
        class="w-full rounded-md border-0 py-1.5 px-2.5 pr-7 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:right-2 " />
</div>
