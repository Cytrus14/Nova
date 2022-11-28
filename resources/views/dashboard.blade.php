@php
    $orders = Auth::user()->getPaginatedOrders();
    $user = Auth::user();
@endphp

<x-layout>
    <div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-2/3 dark:bg-gray-700 rounded-md">
            <div  x-data="{ dashboardTab: $persist(0) }">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="dashboardTab != 0" x-on:click="dashboardTab = 0" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="dashboardTab != 0" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                            </a>

                            <!-- tab active -->
                            <a x-show="dashboardTab == 0" x-on:click="dashboardTab = 0" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="dashboardTab == 0" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                            </a>
                        </li>
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="dashboardTab != 2" x-on:click="dashboardTab = 2" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="dashboardTab !=2" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Orders
                            </a>

                            <!-- tab active -->
                            <a x-show="dashboardTab == 2" x-on:click="dashboardTab = 2" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="dashboardTab == 2" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Orders
                            </a>
                        </li>

                        <!-- The following tabs are for admins only! -->
                        @if($user->is_admin)
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="dashboardTab != 3" x-on:click="dashboardTab = 3" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="dashboardTab !=3" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Administration tools
                            </a>

                            <!-- tab active -->
                            <a x-show="dashboardTab == 3" x-on:click="dashboardTab = 3" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="dashboardTab == 3" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Administration tools
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            
            <!-- Profile tab content -->
            <div class="mx-6 grid grid-cols-2" x-show="dashboardTab == 0">
                <div>
                    <h1 class="mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Your Profile</h1>

                    <p class="mt-4 font-semibold text-gray-900 dark:text-gray-300">Username:</p>
                    <p class="text-gray-900 dark:text-gray-300">{{Auth::user()->username}}</p>

                    <p class="mt-3 font-semibold text-gray-900 dark:text-gray-300">E-mail:</p>
                    <p class="text-gray-900 dark:text-gray-300">{{Auth::user()->email}}</p>


                    <form method="GET" action="{{'users/' . Auth::user()->id . '/edit' }}">
                        @csrf
                        <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Profile</button>
                    </form>

                </div>

                <!-- Addresses column -->
                <div>
                    <h1 class="mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Your Addresses</h1>
                    @foreach (Auth::user()->addresses as $address)
                        
                        <x-address-card :isSelected="false" :displayButtons="true" :address="$address"></x-address-card>
                    @endforeach
                    <form action="/userAddresses/create">
                        @php
                            session()->put('redirectTo', 'dashboard');
                        @endphp
                        @csrf
                        <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Address</button>
                    </form>
                </div>
            </div>

            <!-- Orders tab content -->
            <div class="mx-6" x-show="dashboardTab == 2">
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
                                        @if ($order['isBooked'])
                                            Paid
                                        @else
                                            Awaiting Payment 
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

                <!-- Admin tools tab content -->
                <!-- This section is for admins only -->
                <div x-show="dashboardTab == 3">
                    @if($user->is_admin)
                        <x-admin-tools></x-admin-tools>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-layout>
