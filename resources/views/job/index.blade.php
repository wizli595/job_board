<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('job.index')]" />
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
