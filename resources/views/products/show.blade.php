@php
    $productReviewCount = count($product->productReviews);
    $averageRating = number_format((float)$product->getAverageProductRating(),2);
@endphp
<x-layout>
    
<div class="grid grid-cols-2 gap-4">

@if(count($productImages) == 0)
<div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 bg-white" data-carousel-item="">
            <img src="{{ 'http://127.0.0.1:8000/storage/other/NoImage.webp' }}" class="absolute block max-w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
@endif

@if(count($productImages) == 1)
<div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 bg-white" data-carousel-item="">
            <img src="{{ 'http://127.0.0.1:8000/storage/' . $productImages[0]['image_path'] }}" class="absolute block max-w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
@endif

@if(count($productImages) > 1)
<div id="default-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         @foreach ( $productImages as $productImage )
        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 bg-white" data-carousel-item="">
            <img src="{{ 'http://127.0.0.1:8000/storage/' . $productImage['image_path'] }}" class="absolute block max-w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
@endif

<div class="bg-white relative h-56 overflow-hidden rounded-lg md:h-96">
<form class="flex-auto p-6">
<div class="flex flex-wrap">
      <h1 class="flex-auto text-lg font-semibold text-slate-900">
        {{ $product['name'] }}
      </h1>
      <div class="text-lg font-semibold text-slate-500">
        {{ $product->getCurrentPriceAttribute() }} €
      </div>
        <div class="w-full">
        <x-star-rating :rating="$averageRating">

        </x-star-rating>
        </div>
        @if (true)
        <div class="w-full flex-none text-sm font-medium text-slate-700 mt-1">
            In stock
        </div>
        @else
        <div class="w-full flex-none text-sm font-medium text-slate-700 mt-1 text-red-700">
            Unavailable
        </div>
        @endif
</div>
<div class="flex space-x-4 text-sm font-medium">
      <div class="flex-auto flex space-x-4">
        <button class="h-10 px-6 font-semibold rounded-md bg-black text-white" type="submit">
          Buy now
        </button>
        <button class="h-10 px-6 font-semibold rounded-md border border-slate-200 text-slate-900" type="button">
          Add to cart
        </button>
      </div>
    </div>
</form>
</div>
</div>


<div  x-data="{ tab: 1 }">
<div class="border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="mr-2">
            <!-- tab inactive -->
            <a x-show="tab != 0" x-on:click="tab = 0" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
            <svg x-show="tab != 0" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Description
            </a>

            <!-- tab active -->
            <a x-show="tab == 0" x-on:click="tab = 0" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
            <svg x-show="tab == 0" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Description
            </a>
        </li>
        <li class="mr-2">
            <!-- tab inactive -->
            <a x-show="tab != 1" x-on:click="tab = 1" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
            <svg x-show="tab != 1" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            Reviews
            </a>

            <!-- tab active -->
            <a x-show="tab == 1" x-on:click="tab = 1" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
            <svg x-show="tab == 1" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
            Reviews
            </a>
        </li>
    </ul>
</div>

<!-- content of tab 0 (description) -->
<div x-show="tab == 0">
    test1
</div>

<!-- content of tab 1 (reviews) -->
<div x-show="tab == 1">

<!-- create review -->
<h1 class="mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Review product</h1>
<form method="POST" action="{{ route('productReviews.store', ['productID' => $product['id']]) }}" class ="ml-4 w-1/3">
    @csrf
    <!-- product rating -->
    <div x-data="{rating: 0}" class="my-4">
        <label for="ratingSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product rating</label>
        <button type="button" x-show="rating == 0" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="0"></x-star-rating></button>
        <button type="button" x-show="rating == 1" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="1"></x-star-rating></button>
        <button type="button" x-show="rating == 2" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="2"></x-star-rating></button>
        <button type="button" x-show="rating == 3" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="3"></x-star-rating></button>
        <button type="button" x-show="rating == 4" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="4"></x-star-rating></button>
        <button type="button" x-show="rating == 5" id="ratingSelect" data-dropdown-toggle="dropdown"><x-star-rating :rating="5"></x-star-rating></button>
        <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="ratingSelect">
                <button type="button" x-on:click="rating = 1"><x-star-rating x-on:click="rating = 1" :rating="1"></x-star-rating></button>
                <button type="button" x-on:click="rating = 2"><x-star-rating x-on:click="rating = 2" :rating="2"></x-star-rating></button>
                <button type="button" x-on:click="rating = 3"><x-star-rating x-on:click="rating = 3" :rating="3"></x-star-rating></button>
                <button type="button" x-on:click="rating = 4"><x-star-rating x-on:click="rating = 4" :rating="4"></x-star-rating></button>
                <button type="button" x-on:click="rating = 5"><x-star-rating x-on:click="rating = 5" :rating="5"></x-star-rating></button>
            </ul>
        </div>
        <!-- this hidden input is used to include the "rating" alpine.js value in the form request -->
        <input hidden type="number" name="rating" x-model="rating"/>
        @error('rating')
        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
        <input name="title" type="text" id="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Review Title">
    </div>

    <label for="ratingSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comment</label>
    <textarea name="comment" id="comment" rows="4" class="my-4 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Review comment"></textarea>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
<h1 class="mt-8 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Customer's reviews</h1>
<div class="flex items-center mb-3">
    <x-star-rating :rating="round($averageRating)"></x-star-rating>
    <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{$averageRating}} out of 5</p>
</div>
<p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$productReviewCount}} global ratings</p>
<div class="flex items-center mt-4">
    <span class="text-sm font-medium text-blue-600 dark:text-blue-500">5 star</span>
    <div class="mx-4 w-2/4 h-5 bg-gray-200 rounded dark:bg-gray-700">
        @if($productReviewCount != 0)
            <div class="h-5 bg-yellow-400 rounded" style="{{'width: ' . count($product->getReviewsByRating(5)) / $productReviewCount* 100 . '%'}}"></div>
        @else
            <div class="h-5 bg-yellow-400 rounded" style="width: 0%"></div>
        @endif
    </div>
    @if($productReviewCount != 0)
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ round(count($product->getReviewsByRating(5)) / $productReviewCount * 100)  . '%'}}</span>
    @else
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ 0  . '%'}}</span>
    @endif
</div>
<div class="flex items-center mt-4">
    <span class="text-sm font-medium text-blue-600 dark:text-blue-500">4 star</span>
    <div class="mx-4 w-2/4 h-5 bg-gray-200 rounded dark:bg-gray-700">
        @if($productReviewCount != 0)
            <div class="h-5 bg-yellow-400 rounded" style="{{'width: ' . count($product->getReviewsByRating(4)) / $productReviewCount * 100 . '%'}}"></div>
        @else
            <div class="h-5 bg-yellow-400 rounded" style="width: 0%"></div>
        @endif
    </div>
    @if($productReviewCount != 0)
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ round(count($product->getReviewsByRating(4)) / $productReviewCount * 100)  . '%'}}</span>
    @else
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ 0  . '%'}}</span>
    @endif
</div>
<div class="flex items-center mt-4">
    <span class="text-sm font-medium text-blue-600 dark:text-blue-500">3 star</span>
    <div class="mx-4 w-2/4 h-5 bg-gray-200 rounded dark:bg-gray-700">
        @if($productReviewCount != 0)
            <div class="h-5 bg-yellow-400 rounded" style="{{'width: ' . count($product->getReviewsByRating(3)) / $productReviewCount * 100 . '%'}}"></div>
        @else
        <div class="h-5 bg-yellow-400 rounded" style="width: 0%"></div>
        @endif
    </div>
    @if($productReviewCount != 0)
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ round(count($product->getReviewsByRating(3)) / $productReviewCount * 100)  . '%'}}</span>
    @else
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ 0  . '%'}}</span>
    @endif
</div>
<div class="flex items-center mt-4">
    <span class="text-sm font-medium text-blue-600 dark:text-blue-500">2 star</span>
    <div class="mx-4 w-2/4 h-5 bg-gray-200 rounded dark:bg-gray-700">
        @if($productReviewCount != 0)
            <div class="h-5 bg-yellow-400 rounded" style="{{'width: ' . count($product->getReviewsByRating(2)) / $productReviewCount * 100 . '%'}}"></div>
        @else
            <div class="h-5 bg-yellow-400 rounded" style="width: 0%"></div>
        @endif
    </div>
    @if($productReviewCount != 0)
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ round(count($product->getReviewsByRating(2)) / $productReviewCount * 100)  . '%'}}</span>
    @else
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ 0  . '%'}}</span>
    @endif
</div>
<div class="flex items-center mt-4">
    <span class="text-sm font-medium text-blue-600 dark:text-blue-500">1 star</span>
    <div class="mx-4 w-2/4 h-5 bg-gray-200 rounded dark:bg-gray-700">
        @if($productReviewCount != 0)
            <div class="h-5 bg-yellow-400 rounded" style="{{'width: ' . count($product->getReviewsByRating(1)) / $productReviewCount * 100 . '%'}}"></div>
        @else
            <div class="h-5 bg-yellow-400 rounded" style="width: 0%"></div>
        @endif
    </div>
    @if ($productReviewCount != 0)
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ round(count($product->getReviewsByRating(1)) / $productReviewCount * 100) . '%'}}</span>
    @else
        <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ 0  . '%'}}</span>
    @endif
</div>

@foreach($product->productReviews as $review)    
    <x-product-review :review='$review'></x-product-review>
@endforeach


</div>

<div>

</x-layout>