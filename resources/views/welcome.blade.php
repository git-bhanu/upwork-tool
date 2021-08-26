<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                @guest
                    @livewire('login-signup')
                @endguest
            </div>
        </div>
    </div>
</x-guest-layout>

@php
 //   Auth::loginUsingId(1);
@endphp
