<tr>
    <td class="px-4 py-4 pr-0 whitespace-nowrap w-3">
        <p class="text-sm">{{ $id }}</p>
    </td>
    <td class="px-6 py-4 whitespace-nowrap w-1/4 ">
        <div class="flex items-center">
            <div class="">
                <div class="text-sm font-normal text-green-600 max-w-7xl">
                    <a href="#" class="font-bold text-decoration-underline">{{ $title }}</a>
                </div>
                <div class="text-sm text-gray-500 max-w-7xl">
                    {{ $description }}
                </div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap w-24">
                    @if($analysis)
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ __('Passed') }}
                </span>
                    @else
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                {{ __('Failed') }}
                </span>
                    @endif
    </td>
    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium w-20">
        <p>{{ $job_type }}</p>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="">
        @if(!$applied_by)
        <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <p class="text-sm text-gray-900">{{ __('Bhanu Singh') }}</p>
        </div>
            <div>
                <p class="text-xs text-gray-500"> on : {{ $created }}</p>
            </div>
        @else
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                </svg>
                {{ __('Not Applied Yet') }}
        @endif
        </div>
    </td>
    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium">
        <p class="text-gray-500">{{ $created }}</p>
    </td>
    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium">
        <p class="text-gray-500">{{ $upwork_created_date }}</p>
    </td>
</tr>
