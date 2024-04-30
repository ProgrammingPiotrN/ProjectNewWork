<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    </head>
    <body class="bg-gray-200">
        <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
            <div>
                <span class="text-2xl font-[Poppins] cursor-pointer">
                    <img class="h-10 inline" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                    Blog IT
                </span>
            </div>

            <ul class="md:flex md:items-center">
                <li class="mx-4">
                    <a href="#" class="text-xl hover:text-black-200 duration-500">MESSAGE</a>
                </li>
                <li class="mx-4">
                    <a href="#" class="text-xl hover:text-black-200 duration-500">LOOP</a>
                </li>
                <li class="mx-4">
                    <a href="#" class="text-xl hover:text-black-200 duration-500">HOME</a>
                </li>
                <li class="mx-4">
                    <a href="#" class="text-xl hover:text-black-200 duration-500">CREATE POST</a>
                </li>
                <li class="mx-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-xl hover:text-black-200 duration-500">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-xl hover:text-black-200 duration-500">
                                Log in
                            </a>

                            <li>
                               @if (Route::has('register'))
                                <a  href="{{ route('register') }}" class="text-xl hover:text-black-200 duration-500">
                                    Register
                                </a>
                                @endif
                            </li>
                        @endauth
                    @endif
                </li>
            </ul>
        </nav>
    </body>
</html>


