<div class="flex font-sans rounded-lg bg-white shadow-lg">
  <div class="flex-none w-48 relative">
    <img src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
  </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap">
      <h1 class="flex-auto text-lg font-semibold text-slate-900">
        {{ $name }}
      </h1>
      <div class="text-lg font-semibold text-slate-500">
        {{ $price }} €
      </div>
        <x-star-rating :rating="$rating">

        </x-star-rating>
        @if ($isInStock)
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
        {{ $description }}
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