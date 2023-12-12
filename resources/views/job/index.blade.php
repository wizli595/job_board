<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('job.index')]" />

    <x-card class="mb-4 text-sm">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
        </div>

    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :$job>
            <div>
                <x-link-button :href="route('job.show', ['job' => $job])">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
