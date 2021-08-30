<tr>
    <td class="px-4 py-4 pr-0 whitespace-nowrap w-3">
        <p class="text-sm">{{ $id }}</p>
    </td>

    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium w-56">
        <p class="text-gray-500 flex items-center">{{ $upwork_created_date }}
            @if($job->archived_at)
        <span class="ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
              <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
        </span>
            @endif
        </p>
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
        @if( $job->archived_at )
{{--            @hasanyrole('super-admin|sales-manager')--}}
{{--                <x-button wire:click="unacrhive({{ $job->id }})">--}}
{{--                    UnArchive--}}
{{--                </x-button>--}}
{{--            @endhasanyrole--}}
        <div class="pt-1">
             <span class="text-xs"> ( archived on : {{ $job->archived_at }} ) </span>
        </div>
        @else
            <a href="{{ $url }}">
                <x-button>
                    Visit
                </x-button>
            </a>
        @endif

    </td>
</tr>
