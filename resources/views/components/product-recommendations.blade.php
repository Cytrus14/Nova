<div>
    @if ($recommendedProducts != null)
    <h1 class=" mx-4 mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Products recommended for you:</h1>
    <div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-3/4">
        <div class="flex items-center justify-center">
        <ul class="grid 2xl:grid-cols-2">
            @foreach ($recommendedProducts as $product)
            <li class="px-6 py-3">
                <x-product-card
                :product="$product"
                ></x-product-card>
            </li>
            @endforeach
        </ul>
        </div>
    </div>
    </div>
    @endif
</div>