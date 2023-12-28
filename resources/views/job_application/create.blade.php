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
                <x-lable for="expected_salary" :required="true">
                    expected salary
                </x-lable>
                <x-text-input type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <x-lable for="cv" :required="true">Upload CV</x-lable>
                <x-text-input type="file" name='cv' />
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
