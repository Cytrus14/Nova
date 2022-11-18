@php
    $orders = Auth::user()->orders;
@endphp

<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
            <div  x-data="{ tab: 0 }">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="tab != 0" x-on:click="tab = 0" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="tab != 0" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                            </a>

                            <!-- tab active -->
                            <a x-show="tab == 0" x-on:click="tab = 0" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="tab == 0" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                            </a>
                        </li>
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="tab != 1" x-on:click="tab = 1" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="tab != 1" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Addresses
                            </a>

                            <!-- tab active -->
                            <a x-show="tab == 1" x-on:click="tab = 1" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="tab == 1" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Addresses
                            </a>
                        </li>
                        <li class="mr-2">
                            <!-- tab inactive -->
                            <a x-show="tab != 2" x-on:click="tab = 2" class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                            <svg x-show="tab !=2" class="mr-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Orders
                            </a>

                            <!-- tab active -->
                            <a x-show="tab == 2" x-on:click="tab = 2" class="inline-flex p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500 group">
                            <svg x-show="tab == 2" class="mr-2 w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Orders
                            </a>
                        </li>
                    </ul>
                </div>
            
            <!-- Profile tab content -->
            <div class="mx-6 grid grid-cols-2" x-show="tab == 0">
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

                    <!-- TODO: remove this form -->
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
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
            <div class="mx-6" x-show="tab == 2">
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
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>

            </div>
        </div>
    </div>
</x-layout>
