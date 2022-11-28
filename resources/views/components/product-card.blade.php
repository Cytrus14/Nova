<a href="{{ 'products/' . $product['id'] }}">
<div class="flex font-sans rounded-lg bg-cyan-900 shadow-lg">
  <div class="flex-none w-72 relative">
    @if($product['thumbnail_path'] != null)
    <img src="{{ 'http://127.0.0.1:8000/storage/' . $product['thumbnail_path'] }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
    @else
    <img src="{{ 'http://127.0.0.1:8000/storage/other/NoImage.webp' }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
    @endif
  </div>
  <div class="flex-auto p-6">
    <div class="flex flex-wrap">
      <h1 class="flex-auto text-lg font-semibold text-gray-300">
        {{ $product['name'] }}
        @if (Auth::user() != null && Auth::user()->is_admin)
          <span class="text-lg font-semibold text-gray-300">#{{ $product['id'] }} </span>
        @endif
      </h1>
      <div class="text-lg font-semibold text-gray-300">
        {{ $product->getCurrentPriceAttribute() }} €
      </div>
      <div class="w-full">
        <x-star-rating :rating="number_format((float)$product->getAverageProductRating(),2)"></x-star-rating>
      </div>
        @if ($product->quantity > 0)
        <div class="w-full flex-none text-sm font-medium text-gray-300 mt-1">
            In stock
        </div>
        @else
        <div class="w-full flex-none text-sm font-medium text-gray-300 mt-1 text-red-700">
            Unavailable
        </div>
        @endif
    </div>
    <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-gray-300 text-gray-300">
        {{ $product['descriptionSummary'] }}
    </div>
    <div class="flex space-x-4 text-sm font-medium">
      <div class="flex-auto flex space-x-4">
        <form method="POST" action="{{'/cart/addProductAndGoToCart/' . $product['id']}}">
          @csrf
          <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
            Buy now
          </button>
        </form>
        <form method="POST" action="{{'/cart/addProduct/' . $product['id']}}">
          @csrf
          <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">
            Add to cart
          </button>
        </form>
      </div>
    </div>
</div>
</div>
</a>