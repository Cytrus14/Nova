<a href="{{ 'products/' . $product['id'] }}">
<div class="flex font-sans rounded-lg bg-white shadow-lg">
  <div class="flex-none w-72 relative">
    @if($product['thumbnail_path'] != null)
    <img src="{{ 'http://127.0.0.1:8000/storage/' . $product['thumbnail_path'] }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
    @else
    <img src="{{ 'http://127.0.0.1:8000/storage/other/NoImage.webp' }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
    @endif
  </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap">
      <h1 class="flex-auto text-lg font-semibold text-slate-900">
        {{ $product['name'] }}
      </h1>
      <div class="text-lg font-semibold text-slate-500">
        {{ $product->getCurrentPriceAttribute() }} €
      </div>
      <div class="w-full">
        <x-star-rating :rating="number_format((float)$product->getAverageProductRating(),2)"></x-star-rating>
      </div>
        @if ($product->quantity > 0)
        <div class="w-full flex-none text-sm font-medium text-slate-700 mt-1">
            In stock
        </div>
        @else
        <div class="w-full flex-none text-sm font-medium text-slate-700 mt-1 text-red-700">
            Unavailable
        </div>
        @endif
    </div>
    <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
        {{ $product['description'] }}
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
</a>