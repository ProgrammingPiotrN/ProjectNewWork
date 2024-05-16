<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<div class="max-w-4xl mx-auto sm:px-2 pb-1 pt-1">
    <div class="flex justify-center items-center min-h-screen">
        <div class="container py-8 md:py-20 container--narrow">
            <div class="flex flex-col md:flex-row items-center justify-between pb-2 pt-2 md:pb-8">
                <h2 class="text-2xl md:text-3xl pl-8">{{ $post->title }}</h2>
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

            <!-- Post Card -->
            <div class="max-w-md mx-auto bg-white shadow-md rounded-md overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center justify-between mt-4">
                        <!-- Like Button -->
                        <form action="{{ route('like') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" class="flex items-center text-gray-600 hover:text-red-500 focus:outline-none">
                                <svg class="w-5 h-5 mr-1 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                </svg>
                                <span>{{ $post->likes()->count() }}</span>
                            </button>
                        </form>
                        <!-- Comment Button -->
                        <button class="flex items-center text-gray-600 hover:text-blue-500 focus:outline-none">
                            <svg class="w-5 h-5 mr-1 fill-current" viewBox="0 0 24 24">
                                <path d="M21 4H3c-1.1 0-1.99.9-1.99 2L1 18c0 1.1.89 2 1.99 2H21c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM3 18V6h18l.01 11H3z"/>
                            </svg>
                            <span>{{ $post->comments()->count() }}</span>
                        </button>
                    </div>
                </div>
                <!-- Comments Section -->
                <div class="px-4 pb-2">
                    <h3 class="text-lg font-semibold mt-4 mb-2">Comments</h3>
                    <ul>
                        @foreach($post->comments as $comment)
                        <li class="mb-2 flex items-center">
                            <div>
                                <img src="{{ asset('storage/user_photo/' . $comment->user->user_photo) }}" alt="{{ $comment->user->name }}" class="w-8 h-8 rounded-full mr-4 border border-gray-300">
                            </div>
                            <div>
                                <span class="font-semibold">{{ $comment->user->username }}:</span> {{ $comment->content }}
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <!-- Add Comment Form -->
                    <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" placeholder="Add a comment..."></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none">Post Comment</button>
                    </form>
                </div>


            </div>



            <div class="flex justify-end mt-4 md:mt-6 pr-8">
                <a href="{{ url('profile/' . Auth::user()->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">Return</a>
            </div>
        </div>
    </div>
</div>


@include('includes.footer')















