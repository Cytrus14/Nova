@php
    $totalOrderValue = 0;
@endphp
<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
            <div class="mx-6">
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-2xl font-medium text-gray-900 dark:text-gray-300">Selected shipping address</h1>
                <x-address-card :isSelected="false" :displayButtons="false" :address="$selectedAddress"></x-address-card>

                <h1 class="mx-6 my-3 mt-12 block mb-4 text-2xl font-medium text-gray-900 dark:text-gray-300">Selected products</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                    @if($products != null)
                        @foreach($products as $product)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $product['name'] }}
                                </th>
                                <td class="py-2 px-6">
                                    {{ $productQuantities[$product['id']]}}
                                </td>
                                <td class="py-2 px-6">
                                    @php
                                        $totalForProduct = $product->getCurrentPriceAttribute() * $productQuantities[$product['id']];
                                        $totalOrderValue += $totalForProduct;
                                    @endphp
                                    €{{ $totalForProduct }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <h1 class="mx-2 my-6 flex-auto text-lg font-bold dark:text-gray-400 dark:bg-gray-700">Total: €{{ $totalOrderValue }}</h1>

                <form method="POST" action="/orders">
                        @csrf
                        <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>