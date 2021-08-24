<div>

    <div class="bg-white max-w-2xl shadow-lg overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Upwork Job Information
            </h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Job Key
                    </dt>
                    <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $key }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Created on
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $creation_date }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Qualification Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 flex flex-col items-start justify-center">
                        @if($qualified)
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ 'Passed on : '. $qualified_date }}
                </span>
                        @else
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                {{ 'Failed on : '. $qualified_date }}
                </span>
                        @endif

                        <button wire:click="reAnalyze()" class="flex text-white bg-green-500 border-0 py-1 px-4 focus:outline-none hover:bg-green-600 rounded-full text-xs mt-2 justify-start">
                            Re-analyze
                        </button>

                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Upwork URL
                    </dt>
                    <dd class="mt-1 text-sm text-green-500 sm:mt-0 sm:col-span-2">
                        <a href="{{ $url }}" target="_blank" class="flex">
                            Visit
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        </a>
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Job Type
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ ucfirst($type) }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>


    @if($analysis)
        <div class="mt-6 max-w-2xl shadow overflow-hidden sm:rounded-lg bg-red-100">
            <div class="border-red-200">
                <dl>
                    @foreach($analysis as $item)
                        <div class="@if ($loop->even) bg-white @else bg-red-50 @endif px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-red-500">
                                {{ $item['term'] }}
                            </dt>
                            <dd class="mt-1 text-sm text-red-900 sm:mt-0 sm:col-span-2">
                                {{ $item['count'] }}
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    @endif

</div>
