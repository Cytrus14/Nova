<body>
<script src="../../../node_modules/flowbite/src/flowbite.js"></script>
<form>
    <div class="relative z-0 mb-6 w-1/3 group">
        <div class="mt-3">
            <label for="productNameInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product name</label>
            <input type="text" id="productNameInput" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mt-3">
            <label for="productPriceInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product price</label>
            <input type="text" id="productPriceInput" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mt-3">
            <label for="productQuantityInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product quantity</label>
            <input type="text" id="productQuantityInput" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mt-3">
        <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload file</label>
            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div>

    </div>
    
    <div class="relative z-0 mb-6 w-1/2">
        <label for="productDescriptionInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product description</label>
        <textarea type="text" id="productDescriptionInput" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
    </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

</body>
