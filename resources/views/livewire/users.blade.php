<div class="p-6">

    <x-validation></x-validation>

    <div class="my-4">
        <h2 class="text-gray-800 font-medium text-3xl">All Users</h2>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                User Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Added On
                            </th>
                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">
                                <span class="sr-only">Change role</span>
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-md font-medium text-gray-900">
                                            <x-user-name :user="$user"/>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-400">
                                            @if(!empty($user->roles))
                                                {{ $user->roles->pluck('name')[0] }}
                                            @else
                                                No Role
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-300">
                                            {{ $user->created_at }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-green-600">
                                            <a  class="text-decoration-underline" href="{{ route('user.single', ['user' => $user->id]) }}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="my-6">
    </div>
</div>
