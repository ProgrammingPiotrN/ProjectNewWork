<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.welcome.header_welcome')

<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-6 text-center">{{ __('public_posts.all_posts') }}</h1>

    <form action="{{ route('welcome.posts') }}" method="GET" class="mb-4">
        <div class="flex justify-center">
            <input type="text" name="search" placeholder="{{ __('public_posts.search') }}" class="px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">{{ __('public_posts.search') }}</button>
        </div>
    </form>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-2">{{ $post->content }}</p>
                <div class="flex items-center">
                    @if($post->user->user_photo)
                        <img src="{{ asset('storage/user_photo/' . $post->user->user_photo) }}" alt="{{ $post->user->name }}" class="w-8 h-8 rounded-full mr-2">
                    @endif
                    <div class="text-sm text-gray-500">{{ $post->user->name }}</div>
                </div>
                <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:underline">Read more</a>
            </div>
        @endforeach
    </div>
</div>

{{ $posts->links() }}


@include('includes.footer')
