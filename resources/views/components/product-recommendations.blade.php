<div>
    <h1 class="mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Recommended for you:</h1>
    <div class="flex justify-center bg-white mt-3">
        <div class="flex items-center justify-center">
        <ul class="grid 2xl:grid-cols-2">
            @foreach ($recommendedProducts as $product)
            <li class="px-6 py-2">
                <x-product-card
                :product="$product"
                ></x-product-card>
            </li>
            @endforeach
        </ul>
        </div>
    </div>

</div>