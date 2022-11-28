<x-layout>
<div class="flex justify-center bg-gray-900 mt-3 ">
        <div class="overflow-x-auto w-2/3 dark:bg-gray-700 rounded-md">
    <form method="POST" action="{{'/products/' . $product['id']}}" enctype="multipart/form-data" class="mx-6 my-4">
        @csrf
        @method('PUT')
        <div class="relative z-0 mb-6 w-1/3 group">
            <div class="mt-3">
                <label for="productName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product name</label>
                <input value="{{$product['name']}}"name="productName" type="text" id="productName" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('productName')
                <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="productPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product price</label>
                <input value="{{$product->getCurrentPriceAttribute()}}" name="productPrice" type="text" id="productPrice" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('productPrice')
                <p class="text-red-500 text-xs mt-1"> {{ $message }}<p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="productQuantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product quantity</label>
                <input value="{{$product['quantity']}}" name="productQuantity" type="text" id="productQuantity" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

    <!-- category menu -->
    <div id="categoryDropdown" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 15085px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
        <div class="p-3">
            <label for="input-group-search" class="sr-only">Search</label>
            <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="input-group-search" class="block p-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search category">
            </div>
        </div>
        <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="categoryDropdownButton">
        @foreach ($productCategories as $productCategory )
            <li>
            <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                @if(in_array($productCategory['id'], $productCategoriesIDs))
                    <input checked name="productCategories[]" id="{{ $productCategory['id'] }}" type="checkbox" value="{{ $productCategory['id'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                @else
                    <input name="productCategories[]" id="{{ $productCategory['id'] }}" type="checkbox" value="{{ $productCategory['id'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                @endif
                <label for="{{ $productCategory['id'] }}" class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $productCategory['categoryName'] }}</label>
            </div>
            </li>
        @endforeach
        </ul>
        <a class="flex items-center p-3 text-sm font-medium text-blue-600 bg-gray-50 border-t border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-500 hover:underline" data-modal-toggle="addProductCategoryModal">
            Add new category
        </a>
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
                @if(strcmp($priceTag['value'], $product->getPriceTag()['value']) == 0)
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
                @if(strcmp($categoryTag['value'], $product->getCategoryTag()['value']) == 0)
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



        
        <div class="relative z-0 mb-6 w-1/2">
            <label for="productDescriptionSummary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product description</label>
            <textarea rows=5 name="productDescriptionSummary" type="text" id="productDescriptionSummary" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$product['descriptionSummary']}}</textarea>
        </div>
        <div class="relative z-0 mb-6 w-1/2">
          <label for="productDescription" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product description</label>
          <textarea rows=20 name="productDescription" type="text" id="productDescription" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$product['description']}}</textarea>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>


    </form>


    <!-- create new product category modal -->
    <div id="addProductCategoryModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="addProductCategoryModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create a new category</h3>
                    <form class="space-y-6" method="Post" action="/productCategories">
                        @csrf
                        <div>
                            <label for="categoryName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category name</label>
                            <input type="text" name="categoryName" id="categoryName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</x-layout>