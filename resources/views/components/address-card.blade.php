<form method="POST" action="{{route('userAddresses.destroy', $address->id)}}" >
  @csrf
  @method('DELETE')
  @if ($isSelected)
    <div class="grid grid-cols-2 my-3 flex font-sans rounded-lg bg-cyan-600 shadow-lg">
  @else
    <div class="grid grid-cols-2 my-3 flex font-sans rounded-lg bg-cyan-900 shadow-lg">
  @endif
    <div class="flex-none w-full relative">
      <p class="mx-4 mt-2 mb-2 font-semibold text-gray-900 dark:text-gray-300">{{$address['name']}}</p>
      @if($address['apartmentNumber'] == null)
        <p class="mx-4 text-gray-900 dark:text-gray-300">{{$address['street']}} {{$address['streetNumber']}}</p>
      @else
        <p class="mx-4 text-gray-900 dark:text-gray-300">{{$address['street']}} {{$address['streetNumber']}} / {{$address['apartmentNumber']}}</p>
      @endif
        <p class="mx-4 text-gray-900 dark:text-gray-300">{{$address['zipCode']}} {{$address['city']}}</p>
        <p class="mx-4 mb-1 text-gray-900 dark:text-gray-300">{{$address['country']}}</p>
        <p class="mx-4 mb-3 text-gray-900 dark:text-gray-300">{{$address['phoneNumber']}}  </p>
    </div>
    <div>
    <div class="flex w-full place-content-end">
      @if($displayButtons && count($address->orders) == 0)
            <button type="submit" class="mr-2 mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete address</button>
      @endif
      @if($isSelected)
          <svg class="mx-3 my-3 w-12 h-12" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
      @endif 
    </div>
  </div>
  </div>
</form>