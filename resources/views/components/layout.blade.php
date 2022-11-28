<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-900 flex flex-col h-screen">
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <!-- Alpine Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <div>
        <!-- navbar -->
        <nav class="grid grid-cols-3 gap-4 w-auto bg-white border-gray-200 px-2 sm:px-4  rounded dark:bg-gray-900">
            <div class="p-4">
                <a href="/home" class="flex items-center">
                    <img src="{{ 'http://127.0.0.1:8000/storage/other/storeLogo.png' }}" class="mr-3 h-6 sm:h-9" alt="Nova Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Nova</span>
                </a>
            </div>
            <!-- <div class="flex md:order-2 w-1/3 justify-end">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Search</span>
                </button>
                <div class="hidden relative md:block w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar" class="block p-2 pl-10 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                </div>
                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div> -->
            <div class="flex justify-center">
                <ul class="flex flex-col mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class="grid content-center">
                    <a href="/home" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Home</a>
                    </li>
                    <li class="grid content-center">
                    <a href="/about" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li class="grid content-center">
                    <a href="/privacy" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Privacy Policy</a>
                    </li>
                    <li class="grid content-center">
                    <a href="/contact" class="block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="flex justify-end">
                <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/cart/show">
                    <button type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        <span class="sr-only">Notifications</span>
                        @if(session("productsInCart") != null)
                            @php
                                $itemCount = 0;
                                foreach(session("productsInCart") as $item) {
                                    $itemCount += $item->quantity;
                                }
                            @endphp
                            <div class="inline-flex absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">{{ $itemCount }}</div>
                        @endif
                    </button>
                    </a>
                </li>

                <li>
                    <button id="userButton" data-dropdown-toggle="userButtonDropdown" type="button" class="inline-flex relative items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </button>
                    <div id="userButtonDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        @auth
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="userButton">
                            <li>
                                <a href="{{ url('/dashboard') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <form method="POST" class="mb-0" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</button>
                                </form>
                            </li>
                        </ul>
                        @else
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="userButton">
                            <li>
                                <a href="{{ url('/login') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Log in</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Register</a>
                            </li>
                        </ul>
                        @endauth
                    </div>
                </li>
            </div>
            </nav>
        </div>
        <!-- main content -->
        <div>
            {{$slot}}
        </div>
        <!-- empty space filler -->
        <div class="flex flex-grow"></div>
        <!-- footer -->
        <footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="/home" class="flex items-center mb-4 sm:mb-0">
                <img src="{{ 'http://127.0.0.1:8000/storage/other/storeLogo.png' }}" class="mr-3 h-8" alt="Nova Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Nova</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="/about" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="/privacy" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="/contact" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
        </span>
    </footer>
    </body>
</html>