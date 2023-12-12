<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('job.index'), $job->title => '#']" />
    <x-job-card :$job />

</x-layout>
