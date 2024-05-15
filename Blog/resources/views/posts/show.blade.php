<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<div class="max-w-4xl mx-auto sm:px-2 pb-1 pt-1">
    <div class="flex justify-center items-center min-h-screen">
        <div class="container py-8 md:py-20 container--narrow">
            <div class="flex flex-col md:flex-row items-center justify-between pb-2 pt-2 md:pb-8">
                <h2  class="text-2xl md:text-3xl pl-8">{{ $post->title }}</h2>
                <div class="flex items-center pl-8 md:pl-8 lg:pl-16 pr-8 pt-6">
                    @if($post->user_id == auth()->id())
                    <a href="{{route('posts.edit', $post->id)}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                        <ion-icon name="create-outline" class="text-2xl"></ion-icon>
                    </a>

                    <form class="delete-post-form inline-block mr-2" action="{{ route('posts.delete', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-post-button text-danger" data-toggle="tooltip" type="submit" data-placement="top"
                        title="Delete" onsubmit="return confirm('Are you sure you want to delete this post?')">
                            <ion-icon name="trash-outline" class="text-2xl"></ion-icon>
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <p class="text-gray-500 text-sm mb-4 pl-8 mt-1">
                <a href="#">
                    @if($post->user->user_photo)
                    <img src="{{ asset('storage/user_photo/' . $post->user->user_photo) }}" alt="{{ $post->user->name }}" class="w-8 h-8 rounded-full mr-2">
                    @endif
                </a>
                Posted by <a href="#" class="text-gray-700">{{ $post->user->username }}</a> on {{ $post->created_at->format('d/m/Y') }}
            </p>

            <div class="body-content pl-8 mt-1">
                {!! $post->content !!}
            </div>

            <div class="post bg-white p-4 shadow-md rounded-md mb-4">
                <!-- Post content here -->

                <!-- Comment form -->
                <form action="{{ route('comments') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="comment" placeholder="Add a comment..." rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Comment</button>
                </form>

                <!-- Display comments -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Comments:</h3>
                    @foreach ($post->comments as $comment)
                        <div class="border-t border-gray-200 mt-2">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-sm text-gray-600">By: {{ $comment->user->name }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Like button -->
                <form action="{{ route('likes.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button type="submit" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md mt-2 hover:bg-gray-300 focus:outline-none focus:bg-gray-300">Like</button>
                </form>
            </div>


            <div class="flex justify-end mt-4 md:mt-6 pr-8">
                <a href="{{ url('profile/' . Auth::user()->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">Return</a>
            </div>
        </div>
    </div>
</div>


@include('includes.footer')















