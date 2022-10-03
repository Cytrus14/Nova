<head>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900">
<h1 class="text-amber-200">Hello</h1>
    <div>
        <table class="table-auto">
            @foreach ($products as $product)
            <td class="text-amber-200"><?php echo $product['id'] ?><td>
            <td class="text-amber-200"><?php echo $product['name'] ?></td>
            <td class="text-amber-200"><?php echo $product['description'] ?></td>
            @endforeach
        </table>
    </div>
    <!-- <div class="flex justify-center">
        <ul>
            <li class="px-6 py-2">
            <x-product-card
        name="testName"
        price="100.00"
        :rating="10"
        :isInStock="false"
        description="test"
        >

    </x-product-card>
            </li>
            <li>
            <x-product-card
        name="testName"
        price="100.00"
        :rating="10"
        :isInStock="false"
        description="test"
        >
        
    </x-product-card>
        </li>

        </ul>
    </div> -->
    <x-paginated-product-list :products="$products">
    </x-paginated-product-list>
    <x-add-product></x-add-product>
</body>