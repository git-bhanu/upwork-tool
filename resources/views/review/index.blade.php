<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Reviews') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Opening Reason
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Opened By
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            For Job
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">
                                            <span class="sr-only">Edit</span>
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($reviews as $review)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-md font-medium text-gray-900">
                                                        #{{ $review->id }} {{ $review->open_reason()->get()->first()->title }}
                                                        <div class="px-3 py-1 inline-flex text-xs ml-2 leading-5 font-semibold rounded-full @if($review->status) bg-red-100 text-red-600 @else bg-green-100 text-green-600 @endif">
                                                            @if($review->status == true )
                                                                Close
                                                            @else
                                                            Open
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-green-600">
                                                        <x-user-name :user="$review->created_by()->get()->first()"/> ( {{ $review->created_at }} )
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-blue-600">
                                                        <a href="{{ $review->job()->get()->first()->link() }}">
                                                            #{{ $review->job()->get()->first()->id }} {{ \Illuminate\Support\Str::limit($review->job()->get()->first()->title, 20) }}
                                                        </a>
                                                        <div class="px-3 py-1 inline-flex text-xs ml-2 leading-5 font-semibold rounded-full {{ config('job_status.color.' . $review->job()->get()->first()->status . '.bg_color') }} {{ config('job_status.color.' . $review->job()->get()->first()->status . '.color') }}">
                {{ $review->job()->get()->first()->status }}
                                                    </div>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                @if(!$review->status)
                                                    <a href="{{ $review->job()->get()->first()->link() . '/#review'}}">
                                                        <x-button>View</x-button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ __('No Review Items on the List.') }}
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-6">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
