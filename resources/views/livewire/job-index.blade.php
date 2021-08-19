<div>
    <div class="my-4 px-6 grid grid-cols-3 gap-4">
        {{-- Ids --}}
        <div>
            <x-label for="name" :value="__('Job ID')" />
            <x-input id="name" wire:model.lazy="ids" class="block mt-1 w-full" type="text"  placeholder="Add ids (1, 3, 4)" autofocus/>
        </div>
        {{-- Type --}}
        <div>
            @php
            $options = [['key'=> '', 'value' => 'All'], ['key'=> 'hourly', 'value' => 'Hourly'],['key'=> 'fixed-price', 'value' => 'Fixed Price']];
            @endphp
            <x-label for="name" :value="__('Job Type')" />
            <x-select id="name" wire:model.lazy="type" class="block mt-1 w-full" type="text"  :options="$options"/>
        </div>
        {{-- Applied By --}}
        <div>
            <x-label for="name" :value="__('Applied By')" />
            <x-select id="name" wire:model.lazy="applied_by" class="block mt-1 w-full" type="text"  :options="$applied_options"/>
        </div>
        {{-- Created Date --}}
        <div>
            <x-label for="name" :value="__('Qualified Date')" />
            <x-input id="name" wire:model.lazy="created_on" class="block mt-1 w-full flatpickr" type="text"  placeholder="Select Date" autofocus/>
        </div>

        {{-- Qualification status --}}
        <div>
            @php
                $options = [['key'=> '', 'value' => 'All'], ['key'=> '1', 'value' => 'Passed'],['key'=> '0', 'value' => 'Failed']];
            @endphp
            <x-label for="name" :value="__('Qualification status')" />
            <x-select id="name" wire:model.lazy="qualification_status" class="block mt-1 w-full" type="text"  :options="$options"/>
        </div>

        {{-- Applied Date --}}
        <div>
            <x-label for="name" :value="__('Applied Date')" />
            <x-input id="name" wire:model.lazy="applied_date" class="block mt-1 w-full flatpickr" type="text"  placeholder="Select Date" autofocus/>
        </div>


        {{-- Upwork Created Date --}}
        <div>
            <x-label for="name" :value="__('Upwork Job Created Date')" />
            <x-input id="name" wire:model.lazy="upwork_created_date" class="block mt-1 w-full flatpickr" type="text"  placeholder="Select Date" autofocus/>
        </div>
    </div>
    <div class="px-6 py-3">
    <h3 class="font-bold text-3xl text-green-500">{{ $count }} Result{{ $count > 1 ? 's': ''  }} Found <span wire:loading class="flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
</svg> Searching...</span></h3>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 pr-0 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Job Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Qualification
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Job Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Applied By
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Qualified Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Job Creation Date
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($jobs as $job)
                                <x-job.single-job :job="$job">
                                </x-job.single-job>
                            @empty
                                <tr>
                                    <td class="px-6 text-gray-700 py-4 whitespace-nowrap text-left text-sm font-medium flex justify-center items-center" colspan="6">
                                        <p class="text-red-500"> No match found. </p>
                                    </td>
                                </tr>

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="my-6 px-7">
        {{ $jobs->links() }}
    </div>
</div>
