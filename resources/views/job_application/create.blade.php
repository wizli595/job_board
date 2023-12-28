<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'jobs' => route('job.index'),
        $job->title => route('job.show', $job),
        'Apply' => '#',
    ]" />
    <x-job-card :$job :isAll="false" />
    <x-card>
        <h2 class=" mb-4 text-lg font-medium">
            Your job Application
        </h2>

        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">
                    expected salary
                </label>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <label for="cv" class="mb-2 block text-sm font-medium text-slate-900">Upload CV</label>
                <x-text-input type="file" name='cv' />
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
