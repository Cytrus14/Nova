@php
    $totalOrderValue = 0;
@endphp
<x-layout>
    <div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-2/3 rounded-md dark:bg-gray-700">
            @if($products != null)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Product name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Quantity
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Price (total)
                        </th>
                        <th scope="col" class="py-3 px-6">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product['name'] }}
                            </th>
                            <td class="py-2 px-6">
                                <a href="{{'/cart/increaseProductQuantity/' . $product['id'] }}">
                                    <button type="button" class="mr-3 inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                    </button>
                                </a>
                                {{ $productQuantities[$product['id']]}}
                                <a href="{{'/cart/decreaseProductQuantity/' . $product['id'] }}">
                                    <button type="button" class="ml-3 inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                    </button>
                                </a>
                            </td>
                            <td class="py-2 px-6">
                                @php
                                    $totalForProduct = $product->getCurrentPriceAttribute() * $productQuantities[$product['id']];
                                    $totalOrderValue += $totalForProduct;
                                @endphp
                                €{{ $totalForProduct }}
                            </td>
                            <td class="py-2 px-6">
                                <a href="{{'/cart/removeProduct/' . $product['id'] }}">
                                    <button type="button" class="inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-red-700 rounded-md hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="mx-4 my-3 flex-auto text-lg font-bold dark:text-gray-400 dark:bg-gray-700">Total: €{{ $totalOrderValue }}</h1>
            <form action="/checkout/proceed">
                @csrf
                <button type="submit" class="mx-3 mt-1 mb-3 inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Proceed to checkout
                </button>
            </form>
            @else
            <div class="mx-6">
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-2xl font-medium text-gray-500 dark:text-gray-300">Cart is empty</h1>
                <a href="/cart/return">
                    <button type="button" class="mx-6 mt-1 mb-6 inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Go back
                    </button>
                </a>
            </div>
            @endif
        </div>
    </div>

</x-layout>