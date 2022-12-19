<x-layout>
    <div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-2/3 dark:bg-gray-700 rounded-md">
            <form method="POST" action="/users/changePassword" class="grid gird-cols-1 justify-items-center">
                @csrf
                @method('POST')
                <div class="mx-8 mt-3 mb-4 w-1/2">
                    <label for="currentPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Current password</label>
                    <input type="password" name="currentPassword" id="currentPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('currentPassword')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                    @enderror
                </div>
                <div class="mx-8 mt-3 mb-4 w-1/2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New password</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                    @enderror
                </div>

                <div class="mx-8 mt-3 mb-4 w-1/2">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Repeat new password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="flex-auto flex space-x-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change password</button>
                    <a href="/dashboard"><button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
</x-layout>