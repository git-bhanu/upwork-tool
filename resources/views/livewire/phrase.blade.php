<div class="p-6">
    <div class="my-4">
        <h2 class="text-gray-800 font-medium text-3xl"> List of Phrases </h2>
    </div>

    <div class="w-full">
        @can('add phrases')
            <form wire:submit.prevent="saveWord">
                <div class="mb-4">
                    <div>
                        <x-label for="name" :value="__('Add New Word')" />
                        <x-input id="name" wire:model.lazy="word" class="block mt-1 w-full" type="text" name="name" autofocus />
                        @error('word') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <x-button  class="mt-3 @if($word == null) disabled @endif "  wire:click.lazy="saveWord" wire:loading.remove >
                        {{ __('Add Word') }}
                    </x-button>
                </div>
            </form>
        @endcan
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
                                Added By
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Added On
                            </th>
                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">
                                <span class="sr-only">Edit</span>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($phrases as $phrase)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-md font-medium text-gray-900">
                                            {{ $phrase->word }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-400">
                                            @if($phrase->user)
                                                <x-user-name :user="$phrase->user"/>
                                            @else
                                                {{ __('No User') }}
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-300">
                                            {{ $phrase->created_at }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    @can('delete phrases')
                                    <a href="#" wire:click="deleteWord({{ $phrase->id }})" class="text-red-600 hover:text-red-900">Delete</a>
                                    @endcan
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ __('No Phrases.') }}
                                    </div>
                                </td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="my-6">
        {{ $phrases->links() }}
    </div>
</div>
