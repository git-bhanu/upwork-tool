<div class="max-w-7xl mx-auto px-4 sm:px-6 mt-10 bg-white border-2 border-gray-200 rounded py-6 prose flex">
    <div class="w-2/3 px-7">
        <h2>List of Phrases ({{ $wordCount }})</h2>
            @forelse($phrases as $phrase)
                <div class="border-2 rounded my-1 px-7 hover:border-blue-500 transition cursor-pointer flex align-middle justify-between transition ">
                    <div>
                        <p class="text-lg font-bold">{{ $phrase->word }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-red-400 hover:text-red-800" wire.loading.remove wire:click="deleteWord({{ $phrase->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                    </div>
                </div>
            @empty
            <div class="border-2 rounded my-1 px-7 border-red-500 transition cursor-pointer flex align-middle justify-between">
                <div>
                    <p class="text-lg font-bold"> No Phrase Found. </p>
                </div>
            </div>
            @endforelse
        {{ $phrases->links() }}
    </div>
    <div class="w-1/3">
        <h2>Add new phrase</h2>
        <form wire:submit.prevent="saveWord">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="word">
                    Word
                </label>
                <input wire:model="word" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="word" type="text" placeholder="Word">
                @error('word') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center justify-between">
                <input wire:click="saveWord" wire:loading.remove class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition-width transition-slowest ease-in-out w-auto disabled:bg-blue-100 cursor-pointer" type="submit"
                @if($word == null) disabled @endif
                />

                <div wire:loading wire:target="saveWord">
                    <div class="animate-spin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                    </svg>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
