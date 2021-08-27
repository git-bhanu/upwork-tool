<div>
    <x-validation></x-validation>
    <form wire:submit.prevent="create_review">
        <div>
            <x-label :value="__('Select any one the appropriate reasons.')" />
        @if(!empty($reasons))
                @foreach($reasons as $reason)
                    <x-radio :label="$reason->title" :id="$reason->id" wire:model="selectedReason" value="{{ $reason->id }}"/>
                @endforeach
                    <x-radio :label="'Other'" :id="'0'" wire:model.lazy="selectedReason" value="0"/>

                @if($selectedReason != null && $selectedReason == 0)
                    <x-input wire:model.lazy="otherReason" id="otherReason" class="block mt-1 w-full" type="text" name="otherReason" placeholder="Add a new Reason" autofocus/>
                        <p class="text-xs text-gray-300 mt-2"> This reason will be added to the list of choices in review. Add responsibly.</p>
                @endif
        @endif
        </div>
        <div class="my-4 max-w-full">
            <x-label :value="__('Select atleast one.')" />
        @if(!empty($reviewers))
                @foreach($reviewers as $reviewer)
                    <x-radio :label="$reviewer->name" :id="$reviewer->id" wire:model.lazy="selectedReviewers" value="{{ $reviewer->id }}"/>
                @endforeach
        @endif
        </div>
        <div class="my-5">
            <x-label :value="__('Add Comment if necessary.')" />
            <textarea class="w-full" name="comment" id="comment" rows="6" wire:model="comment" placeholder="Add a comment to the review if necessary. Limit 500">
            </textarea>
            <p class="text-sm text-green-300 mb-4"> ( {{ strlen($comment) }} / 500 )</p>
            <p class="text-xs text-gray-300 mt-2">Keep the comment short and to the point.</p>
        </div>
        <div class="my-4" wire:loading.remove>
            <x-button>Raise Review Request</x-button>
        </div>
    </form>
</div>
