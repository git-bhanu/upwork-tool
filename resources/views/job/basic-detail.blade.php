<h2 class="text-2xl mb-3 text-green-600 font-bold">
    {{ $job->title }}
</h2>

<div class="flex flex-wrap items-center">
@if($job->qualified)
    <span class="mr-3 mb-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ __('Passed') }}
                </span>
@else
    <span class="mr-3 mb-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                {{ __('Failed') }}
                </span>
@endif

<span class="mr-3 mb-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
    {{ ucfirst($job->job_type) }}
</span>

<span class="mr-3 mb-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-gray-800 flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
</svg>
    <p class="ml-1 mb-0">{{ $job->created_at }}</p>
</span>
</div>

<div class="mt-6 text-capitalize leading-loose text-md">
    {{ $job->description }}
</div>
