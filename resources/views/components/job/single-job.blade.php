<tr>
    <td class="px-4 py-4 pr-0 whitespace-nowrap w-3">
        <p class="text-sm">{{ $id }}</p>
    </td>


    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium w-56">
        <p class="text-gray-500">{{ $upwork_created_date }}</p>
    </td>

    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium w-25">
        <p>{{ $job_type }}</p>
    </td>


    <td class="px-6 py-4 whitespace-nowrap w-25">
        @if($status)
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ config('job_status.color.' . $status . '.bg_color') }} {{ config('job_status.color.' . $status . '.color') }}">
                {{ $status }}
            </span>
        @else
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                {{ __('Failed') }}
                </span>
        @endif
    </td>

    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium">
        @if($qualified_date)
            <p class="text-gray-500">{{ $qualified_date }}</p>
        @else
            <p class="text-gray-500">N/A</p>
        @endif
    </td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="">
            N/A
        </div>
    </td>


    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium">
        <a href="{{ $url }}">
            <x-button>
                Visit
            </x-button>
        </a>
    </td>
</tr>
