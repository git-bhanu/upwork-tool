<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">

                <div class="py-5">
                    <a href="{{ route('reviewList.create') }}">
                        <x-button>
                            Add Review Item
                        </x-button>
                    </a>
                </div>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Added By
                                        </th>
                                        <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">
                                            <span class="sr-only">Edit</span>
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($review_list as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-md font-medium text-gray-900">
                                                        {{ $item->title }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-green-600">
                                                        {{ ucfirst($item->type) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-400">
                                                        <x-user-name :user="$item->user"/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                                <p class="text-sm text-gray-300"> Coming Soon </p>
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
                                {{ $review_list->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
