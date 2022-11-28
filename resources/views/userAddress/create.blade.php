<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
            <form method="POST" action="/userAddresses">
                @csrf
                    <div class="mx-8 mt-3 mb-4 w-auto">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full name / Company name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mt-3 mb-4 w-auto">
                        <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number (with dialling code)</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('phoneNumber')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mt-3 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street</label>
                        <input type="text" name="street" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('street')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Street number</label>
                        <input type="text" name="streetNumber" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('streetNumber')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apartment number</label>
                        <input type="text" name="apartmentNumber" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('apartmentNumber')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Zip code</label>
                        <input type="text" name="zipCode" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('zipCode')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">City</label>
                        <input type="text" name="city" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('city')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                    <div class="mx-8 mb-4 w-auto">
                        <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Country</label>
                        <input type="text" name="country" id="street" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @error('country')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                        @enderror
                    </div>

                <button type="submit" class="mx-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add address</button>
            </form>
        </div>
    </div>
</x-layout>