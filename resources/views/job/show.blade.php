<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mr-3">
                Upwork Job
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-8 flex flex-col-reverse md:flex-row md:flex-nowrap">
                <div class="border-gray-200 pr-6 w-full md:w-2/3  mt-6 md:mt-0">
                    @include('job.basic-detail', ['job' => $job])
                    @livewire('comment', ['job_id' => $job->id])

                </div>
                <div class="w-full md:w-1/3">
                    @livewire('job-actions', ['job_id' => $job->id])

                    @hasanyrole('sales-manager|super-admin')
                        @livewire('review.manual-status', ['job' => $job])
                    @endhasanyrole

                    @livewire('review.create', ['job' => $job])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
