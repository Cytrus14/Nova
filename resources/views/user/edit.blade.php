<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
            <form method="POST" action="{{'/users/' . $user['id'] }}">
                @csrf
                @method('PUT')
                <div class="mx-8 mt-3 mb-4 w-auto">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                    <input type="text" name="username" id="username" value="{{$user['username']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('username')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                    @enderror
                </div>

                <div class="mx-8 mt-3 mb-4 w-auto">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">E-mail</label>
                    <input type="text" name="email" id="email" value="{{$user['email']}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                    @enderror
                </div>

                <button type="submit" class="mx-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save changes</button>
            </form>
        </div>
    </div>
</x-layout>