<article class="my-4 border-2 border-blue-500 rounded-md">
    <div class="mx-6 my-3">
    <div class="flex items-center mb-3 space-x-4">
        <div class="space-y-1 font-medium dark:text-white">
            {{$review->user['username']}}
        </div>
    </div>
    <div class="flex items-center mb-1">
        <x-star-rating :rating="$review['rating']"></x-star-rating>
    </div>
    <div class="flex items-center mb-1">
        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">{{$review['title']}}</h2>
    </div>
    <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed on <time>{{$review->updated_at}}</time></p></footer>
    <p class="mb-2 font-light text-gray-500 dark:text-gray-400">{{$review['comment']}}</p>
    </div>
</article>