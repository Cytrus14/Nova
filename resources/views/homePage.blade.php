<x-layout>
    <div class="grid place-items-center">
        <!-- <h1 class="text-lg font-semibold text-red-900"> Check out our product </h1> -->
    <div class=" grid grid-cols-3 gap-12">
    <div>
        <a href="products">
            <img src="http://127.0.0.1:8000/storage/other/telescopes.png" class="rounded-lg" width="192">
            </img>
            <h1 class="text-center md:text-lg md:font-medium text-white">Telescopes</h1>
        </a>
    </div>
    <div>
        <a href="products">
            <img src="http://127.0.0.1:8000/storage/other/binoculars.png" class="rounded-lg" width="192">
            </img>
            <h1 class="text-center md:text-lg md:font-medium text-white">Binoculars</h1>
        </a>
    </div>
    <div>
        <a href="products">
            <img src="http://127.0.0.1:8000/storage/other/accessories.png" class="rounded-lg" width="192">
            </img>
            <h1 class="text-center md:text-lg md:font-medium text-white">Accessories</h1>
        </a>
    </div>
    </div>
    </div>

    <x-paginated-product-list :products="$products">
    </x-paginated-product-list>
    <x-add-product></x-add-product>
    <x-product-list :products="$products"></x-product-list>

</x-layout>
