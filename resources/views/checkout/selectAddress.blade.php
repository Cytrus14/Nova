<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
        <div class="mx-6">
            <h1 class="mt-6 block mb-2 text-2xl font-medium text-gray-900 dark:text-gray-300">Select a shipping address or add a new one</h1>
            <h1 class="mt-6 block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300">Your addresses</h1>

            <!-- address selection logic -->
            <div x-data="{ selectedAddress: -1 }">
            @foreach (Auth::user()->addresses as $address)
            <div x-on:click="{{ 'selectedAddress = ' . $address['id']}}">
                <div  x-show="{{ 'selectedAddress == ' . $address['id']}}">
                    <x-address-card x-show="{{ 'selectedAddress == ' . $address['id']}}" :isSelected="true" :displayButtons="false" :address="$address"></x-address-card>
                </div>
                <div x-show="{{ 'selectedAddress != ' . $address['id']}}">
                    <x-address-card :isSelected="false" :displayButtons="false" :address="$address"></x-address-card>
                </div>
            </div>
            @endforeach

            <div class="grid grid-cols-2">
                <div>
                    <form action="/userAddresses/create">
                        @csrf
                        @php
                            session()->put('redirectTo', 'checkout/proceed');
                        @endphp
                        <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Address</button>
                    </form>
                </div>
                <div class="flex place-content-end">
                    <form method="POST" action="/checkout/previewOrder">
                        @csrf
                        <!-- this hidden input is used to include the "selectedAddress" alpine.js value in the form request -->
                        <input hidden type="number" name="selectedAddress" x-model="selectedAddress"/> 
                        <button x-show="selectedAddress == -1" disabled type="submit" class="mt-2 text-white bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600">Next</button>
                        <button x-show="selectedAddress != -1" type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
                    </form>
                </div>

            </div>
        </div>
        </div>
        </div>
    </div>
</x-layout>