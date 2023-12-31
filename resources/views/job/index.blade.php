<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('job.index')]" />

    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" action="{{ route('job.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search </div>
                    <x-text-input form-ref="filters" name="Search" value="{{ request('Search') }}"
                        placeholder='Search for any text' />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary </div>
                    <div class="flex space-x-2">
                        <x-text-input form-ref="filters" type="number" name="min_salary"
                            value="{{ request('min_salary') }}" placeholder='From' />
                        <x-text-input form-ref="filters" type="number" name="max_salary"
                            value="{{ request('max_salary') }}" placeholder='To' />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">experience</div>
                    <x-radio-group name="experience" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">category</div>
                    <x-radio-group name="category" :options="\App\Models\Job::$category" />
                </div>
            </div>
            <x-button class="w-full border py-1">Filter</x-button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :$job :isAll="true">
            <div>
                <x-link-button :href="route('job.show', ['job' => $job])">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
    <div class="mb-4 bg-slate-200">
        {{ $jobs->links('pagination::simple-tailwind') }}
    </div>
</x-layout>
