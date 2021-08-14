<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed top-0 w-full bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a href="{{ route('home') }}">
                    <span class="sr-only">Workflow</span>
                    <img class="h-8 w-auto sm:h-10" src="{{  asset('images/Krenovtae-logo.svg') }}" alt="">
                </a>
            </div>
            <nav class="hidden md:flex space-x-10">
                <a href="{{ route('home') }}" class="text-base font-medium text-gray-600 hover:text-gray-900">
                    Analyze
                </a>
                <a href="{{ route('phrase.index') }}" class="text-base font-medium text-gray-500 hover:text-gray-900">
                    Phrases
                </a>
            </nav>
            <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
                    Sign in
                </a>
                <a href="#" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Sign up
                </a>
            </div>
        </div>
    </div>

</div>
