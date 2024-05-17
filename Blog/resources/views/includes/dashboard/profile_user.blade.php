<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<div class="container py-7 container--narrow lg:w-1/2 mx-auto pl-0 pt-12 lg:pl-20">

    <div class="flex items-center lg:pl-24 pl-4"> <!-- Zmniejszono lewy padding na małych ekranach -->
        <img class="avatar-small rounded-full w-24 h-24 lg:w-32 lg:h-32 pl-2" src="{{ asset('storage/user_photo/' . auth()->user()->user_photo) }}" alt="Avatar" /> <!-- Dostosowano rozmiar zdjęcia avataru -->
        <span class="text-xl pl-4">{{ Auth::user()->username }}</span>
        <form method="post" action="#" class="flex items-center ml-auto"> <!-- Przesunięto formularz do prawej strony -->
            @csrf
            @if(auth()->check())
            <a href="{{ route('photo') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center ml-4 md:ml-0" style="z-index: 999;">
                {{ __('profil.manage_photo') }}
            </a>
        @endif
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

        @foreach ($posts as $post)
            <a href="/posts/{{ $post->id }}" class="list-group-item bg-white shadow-md rounded-md overflow-hidden">
                <div class="flex items-center px-4 py-3">
                    <img class="avatar-tiny rounded-full w-8 h-8" src="{{ asset('storage/user_photo/' . auth()->user()->user_photo) }}" alt="Avatar" />
                    <strong class="ml-2">{{ $post->title }}</strong>
                </div>
                <div class="px-4 py-3 border-t border-gray-200">
                    <p class="text-gray-700">{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </a>
        @endforeach
    </div>

    <div class="flex justify-center mt-8">
        {{ $posts->links() }}
    </div>

    <div class="flex justify-center lg:justify-start pt-6">
        <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-2">{{ __('buttons.return') }}</a>
    </div>
    <div class="px-4 py-6">
        @if (session()->has('success'))
            <div class="container mx-auto">
                <div class="bg-green-500 text-white text-center px-4 py-2">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>
</div>


@include('includes.footer')
