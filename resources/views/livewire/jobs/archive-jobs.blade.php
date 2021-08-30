<div class="p-4">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 relative">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class=" sticky top-0 px-4 pr-0 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer hover:text-green-500 @if($orderBy == 'id') font-bold text-green-500 @endif">
                                    ID
                                </div>
                            </th>
                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer hover:text-green-500 @if($orderBy == 'upwork_created_date') font-bold text-green-500 @endif" >
                                    Job Creation Date
                                </div>

                            </th>

                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div wire:click="sortData('job_type')" class="flex items-center cursor-pointer hover:text-green-500 @if($orderBy == 'job_type') font-bold text-green-500 @endif">
                                    Job Type
                                </div>
                            </th>

                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer hover:text-green-500 @if($orderBy == 'qualified') font-bold text-green-500 @endif">
                                    STATUS
                                </div>
                            </th>

                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer hover:text-green-500 @if($orderBy == 'created_at') font-bold text-green-500 @endif" wire:click="sortData('created_at')">

                                    Qualified Date
                                </div>
                            </th>

                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer ">
                                    Applied By
                                </div>
                            </th>

                            <th scope="col" class=" sticky top-0 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center cursor-pointer ">
                                    Archive
                                </div>
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
            <div class="my-5 px-12">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>
