<div class="flex flex-wrap items-center">
    <span class="mr-3 mb-3 px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
        ID : {{ $job->id }}
    </span>
</div>
<h2 class="text-2xl mb-3 text-green-600 font-bold">
    {{ $job->title }}
</h2>

<div class="mt-6 text-capitalize leading-loose text-md">
    {{ $job->description  }}
</div>
