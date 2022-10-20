<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-900">
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <div>
            {{$slot}}
        </div>
    </body>
</html>