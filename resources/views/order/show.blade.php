@php
    $shippingAddress = $order->userAddress;
    $products = $order->products;
    $user = Auth::user();
@endphp

<x-layout>
    <div class="flex justify-center bg-gray-900 mt-3">
        <div class="overflow-x-auto w-2/3 dark:bg-gray-700 rounded-md">
            <div class="mx-6">
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-2xl font-medium text-gray-900 dark:text-gray-300">Order #{{ $order['id'] }}</h1>
                
                @if($user->is_admin)
                <h1 class="mx-6 mt-6 mb- block text-md font-medium text-gray-900 dark:text-gray-300">Order status settings:</h1>
                <form action="{{ route('orders.update', $order->id) }}" method="POST" class="mb-0">
                        <div class="mx-6 w-96 grid grid-cols-3 gap-4" >
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="isPaid" class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Paid</label>
                            @if ($order['isBooked'])
                                <input checked name="isPaid" type="checkbox" id="isPaid">
                            @else
                                <input name="isPaid" type="checkbox" id="isPaid">
                            @endif
                        </div>
                        <div>
                        <label for="isShipped" class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Shipped</label>
                        @if ($order['is_shipped'])
                            <input checked name="isShipped" type="checkbox" id="isShipped">
                        @else
                            <input name="isShipped" type="checkbox" id="isShipped">
                        @endif
                        </div>
                        <div>
                        <label for="isCancelled" class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">Cancelled</label>
                        @if ($order['isCancelled'])
                            <input checked name="isCancelled" type="checkbox" id="isCancelled">
                        @else
                            <input name="isCancelled" type="checkbox" id="isCancelled">
                        @endif
                        </div>
                        <div><button type="submit" class="mb-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button></div>
                    </div>
                </form>
                @endif

                <div class="mx-6 grid grid-cols-2">
                    <div>
                        <h1 class="mt-6 mb-1 block text-md font-medium text-gray-900 dark:text-gray-300">Placement date:</h1>
                        <h1 class="block text-md font-medium text-gray-900 dark:text-gray-300">{{$order['created_at']}}

                        <h1 class="mt-6 mb-1 block text-md font-medium text-gray-900 dark:text-gray-300">Status:</h1>
                        @if (!$order['isBooked'] && !$order['isCancelled'] && !$order['is_shipped'])
                            <h1 class="text-md font-medium text-yellow-500 dark:text-yellow-500">Awaiting payment</h1>
                        @elseif ($order['is_shipped'] && !$order['isCancelled'])
                            <h1 class="text-md font-medium text-blue-500 dark:blue-green-500">Shipped</h1>
                        @elseif ($order['isBooked'] && !$order['isCancelled'])
                            <h1 class="text-md font-medium text-green-500 dark:text-green-500">Paid</h1>
                        @else
                            <h1 class="text-md font-medium text-red-500 dark:text-red-500">Cancelled</h1>
                        @endif

                        <h1 class="mt-6 mb-1 block text-md font-medium text-gray-900 dark:text-gray-300">Order value:</h1>
                        <h1 class="block text-md font-medium text-gray-900 dark:text-gray-300">€{{ $order->getOrderValue() }}
                    </div>
                    <div>
                        <h1 class="mt-6 mb-1 block text-md font-medium text-gray-900 dark:text-gray-300">Shipping address:</h1>
                        <x-address-card :isSelected="false" :displayButtons="false" :address="$shippingAddress"></x-address-card>
                    </div>
                </div>
                <h1 class="mx-6 mt-12 mb-2 block text-md font-medium text-gray-900 dark:text-gray-300">Purchased products:</h1>


                <table class="my-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Quantity
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products != null)
                            @foreach($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product['id'] }}
                                    </th>
                                    <td class="py-2 px-6">
                                        {{ $product['name'] }}
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ $product->pivot->productQuantity }}
                                    </td>
                                    <td class="py-2 px-6">
                                        €{{ $product->getPastProductPrice($order['created_at']) }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</x-layout>