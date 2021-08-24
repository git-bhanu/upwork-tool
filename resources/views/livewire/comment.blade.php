<div class="w-full border-t mt-4">
    <form class="w-full bg-white rounded-lg px-4 pt-2" wire:submit.prevent="postComment()">
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea class="bg-white rounded border border-gray-200 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="body" placeholder="Type Your Comment" required="" wire:model.lazy="commentBody"></textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="">
                    <input type="submit"
                           class="bg-white text-green-700 font-medium py-2 px-6 border border-green-400 rounded tracking-wide mr-1 hover:bg-green-100 cursor-pointer"
                           value="Post Comment">
                </div>
            </div>

        </div>
    </form>

    @if($comments)
        <div>
            @forelse($comments as $comment)
                <x-single-user-comment :comment="$comment"/>
            @empty
                <div class="px-5 flex items-start">
                    <div class="text-red-500 bg-red-50 px-5 py-6 rounded-2xl rounded-tl-none w-full flex-column">
                        {{ __('No Comment added yet. Be the first one to add a comment.') }}
                    </div>
                </div>
            @endforelse
        </div>
    @endif

</div>
