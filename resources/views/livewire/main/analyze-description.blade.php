<div class="w-1/2">

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('success') }}</strong>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" wire:click="removeFlash">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
        </div>
    @endif

    <p class="text-right mb-4 transition ease-in-out @if(!$descriptionLength) opacity-0 @endif text-green-500 font-bold" >
        Word Count : {{ $descriptionLength }}
    </p>
    <div>
    <textarea name="description"
              wire:model="description"
              rows="15"
              class="rounded w-full border-gray-100 shadow-lg focus:outline-none focus:ring-blue-300 focus:ring-2"
    >
    </textarea>
    </div>
    <button
        class="bg-blue-500
        hover:bg-blue-600
        transition
        focus:ring
        text-white
        font-bold
        py-3 px-5
        w-full
        rounded my-5
        @if(!$isDescriptionFilled) disabled:bg-blue-100 @endif"
        @if(!$isDescriptionFilled) disabled @endif
        wire:click="analyze"
    >
        Analyse
    </button>
    <div class="pb-5 flex items-center">
        <input type="checkbox" wire:model="caseSensitive" id="case">
        <label for="case" class="ml-4">Make the search case-sensitive</label>
    </div>
    <hr>

    @if(!empty($issues))
    <div class="flex flex-col mt-5">
        <p class="text-xl text-gray-700">Reasons for disqualification</p>
        <div>
            @foreach($issues as $issue)
                <div class="rounded py-3 px-5 border-gray-300 border my-3 hover:border-blue-500 cursor-pointer hover:shadow-lg transition ease-in-out bg-white">
                    <p class="text-2xl font-bold text-red-600">{{ $issue['phrase'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
