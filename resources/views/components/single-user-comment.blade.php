<div class="px-5 flex items-start mb-6">
    <div class="rounded-full h-12 w-12 bg-green-100  text-green-700 flex items-center justify-center">
        {{ $first_chracter }}
    </div>
    <div class="w-full">
    <div class="text-gray-600 bg-gray-100 ml-4 px-5 py-2 pb-3 rounded-2xl rounded-tl-none w-4/5 flex-column">
        <span class="text-xs text-gray-900 font-bold">{{ $name }}</span>
        <p>{{ $comment->comment }}</p>
        <p class="text-xs text-right text-gray-400 mt-5"> {{ $comment_time }} </p>
    </div>
    </div>
</div>
