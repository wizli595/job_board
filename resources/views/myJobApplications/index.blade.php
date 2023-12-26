<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />
    {{-- {{ $applications->job }} --}}
    @forelse ($applications as $application)
        <x-job-card :job="$application->job" :isAll="false"></x-job-card>
    @empty
        <div>Nothing</div>
    @endforelse
</x-layout>
