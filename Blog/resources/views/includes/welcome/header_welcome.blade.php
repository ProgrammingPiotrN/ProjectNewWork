<nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center">
        <span class="text-2xl font-[Poppins] cursor-pointer">
            <img class="h-24 inline" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
        </span>
        <span class="text-3xl cursor-pointer mx-2 md:hidden block">
            <ion-icon name="menu-outline" onclick="Menu(this)"></ion-icon>
        </span>
    </div>

    <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto
        md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">

            <li class="mx-4 my-6 md:my-0">
                <a href="{{ url('posts') }}" class="text-xl hover:text-blue-500 duration-500">Posts</a>
            </li>

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

<script>
    function Menu(e){
        let list = document.querySelector('ul');

        e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'),
        list.classList.add('opacity-100')) :(e.name = "menu", list.classList.remove('top-[80px]'),
        list.classList.remove('opacity-100'))
    }
</script>
