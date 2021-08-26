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
                    <h1 class="text-xl">New Review List Item</h1>

                    <x-auth-validation-errors/>
                    <form action="{{ route('reviewList.store') }}" method="post" class="max-w-xl my-4">
                        @csrf
                        <div>
                            <x-label for="title" :value="__('Title of the List')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" placeholder="Title of the item" autofocus/>
                        </div>
                        <div class="mt-4">
                            @php
                                $options = [['key'=> 'under-review', 'value' => 'Under Review'], ['key'=> 'review-passed', 'value' => 'Review Passed'], ['key'=> 'review-failed', 'value' => 'Review Failed']];
                            @endphp
                            <x-label for="type" :value="__('List Type')" />
                            <x-select id="type" name="type" class="block mt-1 w-full" type="text" :options="$options"/>
                        </div>
                        <div class="mt-4">
                            <x-button>
                                Add Item to the list
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
