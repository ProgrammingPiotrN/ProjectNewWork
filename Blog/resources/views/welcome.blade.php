<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </head>

    <body class="bg-gray-200">

        <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
            <div class="flex justify-between items-center">
                <span class="text-2xl font-[Poppins] cursor-pointer">
                    <img class="h-10 inline" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                    Blog IT
                </span>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
                </span>
            </div>

            <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto
            md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="text-xl hover:text-blue-500 duration-500">MESSAGE</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="text-xl hover:text-blue-500 duration-500">LOOP</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="text-xl hover:text-blue-500 duration-500">HOME</a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="text-xl hover:text-blue-500 duration-500">CREATE POST</a>
                </li>
                <li class="mx-4 my-6 md:my-0 space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-xl hover:text-blue-500 duration-500">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-xl hover:text-blue-500 duration-500">
                                Log in
                            </a>

                               @if (Route::has('register'))
                                <a  href="{{ route('register') }}" class="text-xl hover:text-blue-500 duration-500">
                                    Register
                                </a>
                                @endif
                        @endauth
                    @endif
                </li>
            </ul>
        </nav>

        <footer>

        </footer>

    </body>
</html>

<script src="{{ asset('assets/js/menu.js') }}"></script>



