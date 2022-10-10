<head>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
</head>
<body class="bg-gray-900">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<x-product-list :products='$products'></x-product-list>
</body>