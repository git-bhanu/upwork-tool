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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-8">
                <div class="w-2/3 border-r-2 border-gray-200 pr-6">
                    @include('job.basic-detail', ['job' => $job])
                </div>
                <div class="w-1/3">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
