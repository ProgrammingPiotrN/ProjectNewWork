<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog IT</title>

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

    <body class="bg-gray-200 flex flex-col justify-between min-h-screen">

        <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
            <div class="flex justify-between items-center">
                <span class="text-2xl font-[Poppins] cursor-pointer">
                    Blog IT
                    <img class="h-20 inline" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                </span>
                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
                </span>
            </div>

            {{-- <div class="flex justify-center w-100 items-center">
                <span class="text-3xl cursor-pointer mx-2   flex justify-between">
                    <ion-icon name="chatbox-outline" class="text-5xl"></ion-icon>
                </span>
                <span class="text-3xl cursor-pointer mx-2   flex justify-between">
                    <ion-icon name="search-circle-outline" class="text-5xl"></ion-icon>
                </span>
            </div> --}}

            <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto
            md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
                {{-- <li class="mx-4 my-6 md:my-0">
                    <a href="#" class="text-xl hover:text-blue-500 duration-500">CREATE POST</a>
                </li> --}}

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-xl hover:text-blue-500 duration-500">
                                Dashboard
                            </a>
                        @else
                        <li class="mx-4 my-6 md:my-0">
                            <a href="{{ route('login') }}" class="text-xl hover:text-blue-500 duration-500">
                                Log in
                            </a>
                        </li>


                            @if (Route::has('register'))
                                <li class="mx-4 my-6 md:my-0">
                                    <a  href="{{ route('register') }}" class="text-xl hover:text-blue-500 duration-500">
                                    Register
                                    </a>
                                </li>

                            @endif
                        @endauth
                    @endif



            </ul>
        </nav>

        <div class="container mx-auto px-6 py-8">
            <div class="flex flex-col md:flex-row items-center justify-center">
                <div class="md:w-1/2 pr-8">
                    <img src="{{ asset('assets/img/welcome.jpg') }}" alt="Your Image" class="centered-image">
                </div>
                <div class="md:w-1/2 p-8">
                    <p class="text-left md:text-left text-lg">
                        Welcome to Blog IT.
                        Here you will find the
                        answer to every question
                        from the IT world and the solution
                        to the problem. Share your knowledge.
                    </p>
                </div>
            </div>
        </div>

        <footer class="bg-white py-0">
            <div class="p-10 text-black">
                <div class="max-w-7xl mx-auto text-center">
                    <div class="mb-5">
                        Copyright & Designed by <a href="https://github.com/ProgrammingPiotrN"><strong><span>Piotr Nawrocki</span></strong></a>. All Rights Reserved
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>

<script src="{{ asset('assets/js/menu.js') }}"></script>



