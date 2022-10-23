<article class="mt-12">
    <div class="flex items-center mb-4 space-x-4">
        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">
        <div class="space-y-1 font-medium dark:text-white">
            <p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on August 2014</time></p>
        </div>
    </div>
    <div class="flex items-center mb-1">
        <x-star-rating :rating="$review['rating']"></x-star-rating>
    </div>
    <div class="flex items-center mb-1">
        <h2 class="text-sm font-semibold text-gray-900 dark:text-white">{{$review['title']}}</h2>
    </div>
    <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Reviewed in the United Kingdom on <time datetime="2017-03-03 19:00">March 3, 2017</time></p></footer>
    <p class="mb-2 font-light text-gray-500 dark:text-gray-400">{{$review['comment']}}</p>
</article>