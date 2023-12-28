<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-job.index'), 'Create' => '#']" class="mb-4" />

    <x-card>
        <form action="{{ route('my-job.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-lable for="title" :required="true">Job Title</x-lable>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-lable for="location" :required="true">Location</x-lable>
                    <x-text-input name="location" />
                </div>
                <div class=" col-span-2">
                    <x-lable for="salary" :required="true">Salary</x-lable>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class=" col-span-2">
                    <x-lable for="description" :required="true">Description</x-lable>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <x-lable for="experience" :required="true">experience</x-lable>
                    <x-radio-group name="experience" :value="old('experience')" :allOption="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experience),
                        \App\Models\Job::$experience,
                    )" />
                </div>
                <div>
                    <x-lable for="category" :required="true">category</x-lable>
                    <x-radio-group name="category" :value="old('category')" :allOption="false" :options="\App\Models\Job::$category" />
                </div>
                <div class=" col-span-2">
                    <x-button class="w-full">Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
