<div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-3/4">
    <form class="flex items-center justify-center" action="">   
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-1/3">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input name="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search">
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="sr-only">Search</span>
        </button>
        <button id="productOrderDropdownButton" data-dropdown-toggle="productOrderDropdown" type="button" class="mx-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Order by<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            <span class="sr-only">Search</span>
        </button>
        <div id="productOrderDropdown" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <div x-data="{orderVal: 0}">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="productOrderDropdown">
            <li>
                <button type="submit" x-on:click="orderVal=0">
                    <div class="flex items-center text-white font-medium">
                        Price descending
                    </div>
                </button>
            </li>
            <li>
                <button type="submit" x-on:click="orderVal=1">
                    <div class="flex items-center text-white font-medium">
                        Price ascending
                    </div>
                </button>
            </li>
            <li>
                <button type="submit" x-on:click="orderVal=2">
                    <div class="flex items-center text-white font-medium">
                        Oldest
                    </div>
                </button>
            </li>
            <li>
                <button type="submit" x-on:click="orderVal=3">
                    <div class="flex items-center text-white font-medium">
                        Newest
                    </div>
                </button>
            </li>
        </ul>
        <input hidden name="order" value="orderVal" x-model="orderVal"/>
        </div>
    </div>
    </form>


        
        <!-- Dropdown menu -->
        <div id="productOrder" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="productOrder">
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
            </li>
            </ul>
        </div>


    <!-- <div class="flex justify-center bg-white mt-3">
        <div class="flex items-center justify-center">
        <ul class="grow">
            @foreach ($products as $product)
            <li class="px-6 py-2">
                <x-product-card
                :product="$product"
                ></x-product-card>
            </li>
            @endforeach
        </ul>
        </div>
    </div> -->

    <div class="flex justify-center mt-3">
        <div class="flex items-center justify-center">
        <ul class="grid 2xl:grid-cols-2">
            @foreach ($products as $product)
            <li class="px-6 py-3">
                <x-product-card
                :product="$product"
                ></x-product-card>
            </li>
            @endforeach
        </ul>
        </div>
    </div>

    @if(count($products) == 0)
    <div class="mb-6">
        <h1 class="mx-6 mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300 text-center">No products found</h1>
    </div>
    @endif

    <!-- pagination -->
    <div class="mb-6">
        {{$products->appends(\Request::except('_token'))->render()}}
    </div>
</div>
</div>