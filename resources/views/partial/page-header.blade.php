<header class="bg-white border-b-2">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between align-baseline">
        <h1 class="text-3xl font-bold text-gray-900">
            {{ $name ?? 'Dashboard'}}
        </h1>

        <div>
        @if(isset($button))
                <a href="{{ route($url) }}">
                    <button class="bg-blue-500
        hover:bg-blue-600
        transition
        focus:ring
        text-white
        font-bold
        py-3 px-5
        rounded">
                        {{ $button }}
                    </button>
                </a>
            @endif
        </div>

    </div>
</header>
