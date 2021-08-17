<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <h2 class="text-blue-500 text-3xl font-bold text-center mb-16">Speedy Sales</h2>
                @guest
                    @livewire('login-signup')
                @endguest
            </div>
        </div>
    </div>
</x-guest-layout>

