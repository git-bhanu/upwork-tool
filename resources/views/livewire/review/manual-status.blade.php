<div id="manual-status">
    @if($job->status === config('job_status.status.2') || $job->status === config('job_status.status.0') || $job->status === config('job_status.status.3'))
        @if($job->status === config('job_status.status.0'))
            <x-info>
                Manual Status change not possible and job is already passed.
            </x-info>
        @else
            <x-info>
                You cannot manually pass the job, when the status of the job is under {{ $job->status }}.
            </x-info>
        @endif
    @else
        <div class="mt-8 shadow-md pb-7 rounded-md">
            <div class="px-3 py-3 bg-green-500 text-white rounded">
                <span>Change Status Manually.</span>
            </div>
            @if($job->status === config('job_status.status.5'))
                <div class="px-4">
                    <x-info>
                        The job is already manually passed.
                    </x-info>
                </div>

            @else
                <form wire:submit.prevent="submit_form">
                    <div class="px-4 pt-4">
                        <div>
                            <x-label for="name" :value="__('Select Status to change to ')" />
                            <x-select id="name" wire:model.lazy="status" class="block mt-1 w-full" type="text"  :options="$options"/>
                        </div>
                        @if($status === 'manual-fail')
                            <p class="text-xs text-gray-700 mt-4">Please remember that a sales associate cannot generate review for a manually failed job.</p>
                        @endif
                        <div class="my-4" wire:loading.remove>
                            <x-button>Change the Status</x-button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    @endif
</div>
