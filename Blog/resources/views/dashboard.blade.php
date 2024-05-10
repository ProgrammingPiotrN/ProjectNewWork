<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog IT</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </head>

    <body class="bg-gray-200 flex flex-col justify-between min-h-screen">

        @include('includes.header')

        <div class="container mx-auto px-4 py-6">
            @if (session()->has('success'))
                <div class="container mx-auto">
                    <div class="bg-green-500 text-white text-center px-4 py-2">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
        </div>

        <footer class="bg-white py-0">
            <div class="p-10 text-black">
                <div class="max-w-7xl mx-auto text-center">
                    <div class="mb-5">
                        Copyright & Designed by <a href="https://github.com/ProgrammingPiotrN"><strong><span>Piotr Nawrocki</span></strong></a>. All Rights Reserved
                    </div>
                </div>
            </div>

            <button id="scrollToTopBtn" class="fixed bottom-10 right-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded">
                <ion-icon name="arrow-up-outline"></ion-icon>
            </button>
        </footer>




    </body>
</html>

<script src="{{ asset('assets/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/button-scroll.js') }}"></script>






