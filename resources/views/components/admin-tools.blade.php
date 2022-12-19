<div x-data="{adminTab: $persist(0), isLoading: false}">

    <!-- alpine scripts for updating pagination on tab change -->
    <div x-init="$watch('adminTab', value => {
        window.location.assign('/dashboard?page=1');
    })"></div>
    <div x-init="isLoading = false"
    ></div>

    <div class="border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="mr-2">
                <!-- tab inactive -->
                <a x-show="adminTab != 0" x-on:click="adminTab = 0; isLoading = true" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                <svg x-show="adminTab != 0" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Product management
                </a>

                <!-- tab active -->
                <a x-show="adminTab == 0" x-on:click="adminTab = 0" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                <svg x-show="adminTab == 0" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Product management
                </a>
            </li>
            <li class="mr-2">
                <!-- tab inactive -->
                <a x-show="adminTab != 1" x-on:click="adminTab = 1; isLoading = true" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                <svg x-show="adminTab != 1" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Order management
                </a>

                <!-- tab active -->
                <a x-show="adminTab == 1" x-on:click="adminTab = 1" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                <svg x-show="adminTab == 1" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Order management
                </a>
            </li>
            <li class="mr-2">
                <!-- tab inactive -->
                <a x-show="adminTab != 2" x-on:click="adminTab = 2; isLoading = true" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                <svg x-show="adminTab !=2" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                User management
                </a>

                <!-- tab active -->
                <a x-show="adminTab == 2" x-on:click="adminTab = 2" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                <svg x-show="adminTab == 2" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                User management
                </a>
            </li>
        </ul>
    </div>

    <div class="mx-6" x-show="adminTab == 0 && !isLoading">
        <a href="/products/create"><button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add product</button></a>
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
                            <th scope="col" class="py-3 px-6">
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
                                        {{ $product['name']}}
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ $product['quantity']}}
                                    </td>
                                    <td class="py-2 px-6">
                                        €{{ $product->getCurrentPriceAttribute() }}
                                    </td>
                                    <td class="py-2 px-6 grid grid-cols-2">
                                        <a href="{{  '/products/' . $product['id'] . '/edit' }}">
                                            <button type="button" class="inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mb-0">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="inline-flex relative items-center p-2 text-sm font-medium text-center text-white bg-red-700 rounded-md hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="mb-6">
                    {{$products->links()}}
                </div>
            </div>

        

        <!-- Orders tab content -->
        <div class="mx-6" x-show="adminTab == 1 && !isLoading"">
                <table class="my-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Order ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Payment status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Order date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Order value
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($orders != null)
                        @foreach($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        #{{ $order['id'] }}
                                    </th>
                                    <td class="py-2 px-6">
                                        @if (!$order['isBooked'] && !$order['isCancelled'] && !$order['is_shipped'])
                                            Awaiting payment
                                        @elseif ($order['is_shipped'] && !$order['isCancelled'])
                                            Shipped
                                        @elseif ($order['isBooked'] && !$order['isCancelled'])
                                            Paid
                                        @else
                                            Cancelled
                                        @endif
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ $order['created_at'] }}
                                    </td>
                                    <td class="py-2 px-6">
                                        €{{ $order->getOrderValue() }}
                                    </td>
                                    <td class="py-2 px-6">
                                        <a href="{{'/orders/' . $order['id'] }}">
                                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Details</button>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="mb-6">
                    {{$orders->links()}}
                </div>
            </div>

            <!-- Users tab content -->
            <div class="mx-6" x-show="adminTab == 2 && !isLoading"">
                <table class="my-6 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                User ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Username
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Joined
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($users != null)
                        @foreach($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        #{{ $user['id'] }}
                                    </th>
                                    <td class="py-2 px-6">
                                        {{ $user['username']}}
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ $user['email']}}
                                    </td>
                                    <td class="py-2 px-6">
                                        {{ $user['created_at'] }}
                                    </td>
                                </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div class="mb-6">
                    {{$users->links()}}
                </div>
            </div>
</div>