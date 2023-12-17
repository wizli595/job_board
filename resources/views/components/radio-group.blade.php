<div>
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) />
        <span class="ml-2">All</span>
    </label>
    @foreach ($optionsWithLabels as $lbl => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked($option === request($name)) />
            <span class="ml-2">{{ $lbl }}</span>
        </label>
    @endforeach
</div>
