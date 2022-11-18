<x-layout>
    <div class="flex justify-center bg-white mt-3 ">
        <div class="overflow-x-auto w-1/2 dark:bg-gray-700">
            <div class="mx-6">
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-2xl font-medium text-gray-900 dark:text-gray-300">Order placed successfully!</h1>
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-md font-medium text-gray-900 dark:text-gray-300">You can pay for your order by sending a money transfer to the following recipient:</h1>
                <h1 class="mx-6 mt-5 block text-md font-medium text-gray-900 dark:text-gray-300">Recipient name:</h1>
                <h1 class="mx-6 text-md font-medium text-blue-500 dark:text-blue-500">Nova Ltd.</h1>
                <h1 class="mx-6 mt-2 block text-md font-medium text-gray-900 dark:text-gray-300">Transfer message:</h1>
                <h1 class="mx-6 text-md font-medium text-blue-500 dark:text-blue-500">Order#{{$createdOrder['id']}}</h1>
                <h1 class="mx-6 mt-2 block text-md font-medium text-gray-900 dark:text-gray-300">Account number:</h1>
                <h1 class="mx-6 text-md font-medium text-blue-500 dark:text-blue-500">12 3456 7890 1234 5678 9012 3456</h1>
                <h1 class="mx-6 mt-2 block text-md font-medium text-gray-900 dark:text-gray-300">Amount:</h1>
                <h1 class="mx-6 text-md font-medium text-blue-500 dark:text-blue-500">{{$createdOrder->getOrderValue()}} €</h1>
                <h1 class="mx-6 my-3 mt-6 block mb-4 text-md font-medium text-gray-900 dark:text-gray-300">Your order will be shipped within 24 hours of booking the payment. If no payment is booked within 72 hours the order will be automatically cancelled.</h1>
            </div>
        </div>
    </div>
</x-layout>