<div>
    @if($job->status === config('job_status.status.1'))
        <x-info>
            Review cannot be created for failed job.
            @hasanyrole('super-admin|sales-manager') You can add change the status to manually passed then only review can be added. @endhasanyrole
        </x-info>
    @else
        <div class="mt-8 shadow-md p-4 rounded-md" id="review">
            <h3 class="text-xl text-green-600">Reviews</h3>
            @hasanyrole('super-admin|sales-manager')
            @if($job->reviews()->get()->count() === 0 )
                <x-info>
                    No reviews added yet.
                </x-info>
            @endif
            @endhasanyrole
            <div class="my-4">
                @hasrole('sales-associate')
                @if(!$show_create_form && ($job->reviews()->whereStatus(false)->get()->count() == 0))
                    @if($job->status === config('job_status.status.4') || $job->status === config('job_status.status.6'))
                        <div class="bg-red-100 border-2 border-red-400 rounded p-3">
                            <p class="text-red-600">You cannot generate more reviews for a {{ config('job_status.status.4') }} job.</p>
                        </div>
                    @else
                        <div class="bg-green-100 border-2 border-green-400 rounded p-3">
                            <p class="text-green-800"> No open Review has been added for this job. </p>
                            <x-button wire:click="show_create_form">Create one</x-button>
                        </div>
                    @endif
                @endif
                @endhasrole

                @hasrole('sales-associate')
                @php
                    @endphp
                @if($show_create_form && ($job->reviews()->whereStatus(false)->get()->count() == 0))
                    @livewire('review.create-review-form', ['job' => $job])
                @endif
                @endhasrole
                @if($job->reviews()->get()->count() > 0)
                    @foreach($job->reviews()->orderBy('status', 'ASC')->latest()->get() as $review)
                        <div class="p-3 my-4 rounded border-2 @if(!$review->status) border-green-200 text-green-600 @else border-red-200 @endif">
                            <div class="flex items-center justify-between">
                                <p class="text-md">#{{ $review->id }} {{ $review->open_reason()->get()->first()->title }}</p>
                                <span class=" px-3 py-1 rounded-full text-xs text-white @if(!$review->status) bg-green-500 @else bg-red-500 @endif">
                                @if(!$review->status) Open @else Closed @endif
                            </span>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-700 mb-2">Created on : {{ $review->created_at }}</p>
                                <p class="text-xs text-gray-700 mb-2">Created by : {{ $review->created_by()->get()->first()->name }}</p>
                                <p class="text-xs text-gray-700 mb-2">Reviewers Requested :
                                    <span class="text-green-600 font-bold">
                                    @foreach($review->reviewers()->get() as $reviewer) {{ $reviewer->name }}@if(!$loop->last), @endif @endforeach
                                </span>
                                </p>
                                @if($review->comment)
                                    <div class="mt-4 text-gray-700 px-3 py-2 bg-gray-200 rounded-md text-xs">
                                        <p>
                                            {{ $review->comment }}
                                        </p>
                                        <p class="mt-4 text-gray-400"> Comment by : {{ $review->created_by()->get()->first()->name }} </p>
                                    </div>
                                @endif
                                @if(!$review->status)
                                    @if($review->reviewers->contains(auth()->user()) || auth()->user()->hasRole(['super-admin']))
                                        @hasanyrole('sales-manager|super-admin')
                                        @livewire('review.close-review', ['review' => $review])
                                        @endhasanyrole
                                    @else
                                        @hasanyrole('sales-manager|super-admin|sales-associate')
                                        <x-info>
                                            <p class="text-red-500 text-sm">Waiting for <span class="text-green-600 font-bold">
                                        @foreach($review->reviewers()->get() as $reviewer) {{ $reviewer->name }}@if(!$loop->last), @endif @endforeach
                                    </span> to complete this review request.</p>
                                        </x-info>
                                        @endhasanyrole
                                    @endif
                                @else
                                    <div class="border-t mt-3 pt-3">
                                        <p>Review Completed <span class="font-bold text-green-600">{{ $review->reviewed_in() }}</span> by <x-user-name :user="$review->reviewed_by()->first()"/></p>
                                        <div class="mt-4">
                                            <p class="text-xs text-gray-700 mb-2"> Status : <span class="font-bold">{{ ucfirst($review->close_reason()->first()->type) }}</span></p>
                                            <p class="text-xs text-gray-700 mb-2"> Reason : {{ $review->close_reason()->first()->title }}</p>
                                        </div>
                                        @if($review->close_comment)
                                            <div class="mt-4 px-3 py-2 rounded-md text-xs @if($review->close_reason()->first()->type === config('job_status.status.3'))  text-green-700 bg-green-200 @else text-red-700 bg-red-200 @endif">
                                                <p>
                                                    {{ $review->close_comment }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
</div>
