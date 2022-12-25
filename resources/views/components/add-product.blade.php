<div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-2/3 dark:bg-gray-700 rounded-md">
  <form method="POST" action="/products" enctype="multipart/form-data" class="mx-6 my-4">
    @csrf
      <div class="relative z-0 mb-6 w-2/3 group">
          <div class="mt-3">
              <label for="productName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product name</label>
              <input name="productName" type="text" id="productName" value="{{old('productName')}}" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              @error('productName')
              <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
              @enderror
          </div>

          <div class="mt-3">
              <label for="productPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product price</label>
              <input name="productPrice" type="text" id="productPrice" value="{{old('productPrice')}}" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              @error('productPrice')
              <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
              @enderror
          </div>

          <div class="mt-3">
              <label for="productQuantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product quantity</label>
              <input name="productQuantity" type="text" id="productQuantity" value="{{old('productQuantity')}}" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              @error('productQuantity')
              <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
              @enderror
          </div>

          <div class="mt-3">
          <label for="productThumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload product thumbnail</label>
              <input name="productThumbnail" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="productThumbnail" type="file">
          </div>

          <div class="mt-3">
          <label for="productImages" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload additional images</label>
              <!-- Never forget to add "[]" to the input name while working with multiple files-->
              <input name="productImages[]" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="productImages" type="file" multiple>
          </div>

      </div>



  <div class="mb-4">
    <button id="categoryDropdownButton" data-dropdown-toggle="categoryDropdown" data-dropdown-placement="bottom" class="mb text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Product categories <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    @error('productCategories')
    <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
    @enderror
  </div>

  <!-- category dropdown menu -->
  <div id="categoryDropdown" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 15085px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
      <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="categoryDropdownButton">
      @foreach ($productCategories as $productCategory )
        <li>
          <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
            @if(old('productCategories') != null && in_array($productCategory['id'], old('productCategories')))
                <input checked name="productCategories[]" id="{{ $productCategory['id'] }}" type="checkbox" value="{{ $productCategory['id'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            @else
                <input name="productCategories[]" id="{{ $productCategory['id'] }}" type="checkbox" value="{{ $productCategory['id'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            @endif
            <label for="{{ $productCategory['id'] }}" class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $productCategory['categoryName'] }}</label>
          </div>
        </li>
      @endforeach
      </ul>
  </div>

  <div class="mb-4">
    <!-- price tag dropdown menu -->
    <button id="priceTagDropdownButton" data-dropdown-toggle="priceTagDropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Price tag<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    @error('priceTag')
      <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
    @enderror

    <div id="priceTagDropdown" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="priceTagDropdownButton">
          @foreach ($priceTags as $priceTag)
            <li>
              <div class="flex items-center">
                  @if(old('priceTag') != null && strcmp($priceTag['value'], old('priceTag')) == 0)
                    <input checked name="priceTag" id="{{ $priceTag['value'] }}" type="radio" value="{{ $priceTag['value'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                  @else
                    <input name="priceTag" id="{{ $priceTag['value'] }}" type="radio" value="{{ $priceTag['value'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                  @endif
                  <label for="{{ $priceTag['value'] }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$priceTag['value']}}</label>
              </div>
            </li>
          @endforeach
        </ul>
    </div>
  </div>

  <div class="mb-4">
    <!-- category tag dropdown menu -->
    <button id="categoryTagDropdownButton" data-dropdown-toggle="categoryTagDropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Category tag<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    @error('categoryTag')
      <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
    @enderror

    <div id="categoryTagDropdown" class="hidden z-10 w-64 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="categoryTagDropdownButton">
          @foreach ($categoryTags as $categoryTag)
            <li>
              <div class="flex items-center">
                @if(old('categoryTag') != null && strcmp($categoryTag['value'], old('categoryTag')) == 0)
                  <input checked name="categoryTag" id="{{ $categoryTag['value'] }}" type="radio" value="{{ $categoryTag['value'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                @else
                  <input name="categoryTag" id="{{ $categoryTag['value'] }}" type="radio" value="{{ $categoryTag['value'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                @endif
                  <label for="{{ $categoryTag['value'] }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$categoryTag['value']}}</label>
              </div>
            </li>
          @endforeach
        </ul>
    </div>
  </div>




      
      <div class="relative z-0 mb-6 w-2/3">
          <label for="productDescriptionSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product short description</label>
          <textarea rows=5 name="productDescriptionSummary" type="text" id="productDescriptionSummary" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('productDescriptionSummary')}}</textarea>
          @error('productDescriptionSummary')
            <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
          @enderror
      </div>
      <div class="relative z-0 mb-6 w-2/3">
          <label for="productDescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product description</label>
          <textarea rows=20 name="productDescription" type="text" id="productDescription" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('productDescription')}}</textarea>
      </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>


  </form>
</div>
</div>