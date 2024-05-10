<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<div class="max-w-2xl mx-auto py-4 sm:px-4 lg:px-6">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-center items-center min-h-screen">
            <div class="container py-8 md:py-20 container--narrow">
                <div class="flex justify-between items-center flex-col md:flex-row">
                    <h2 class="text-2xl md:text-3xl">{{ $post->title }}</h2>
                    <span class="pt-2 flex items-center md:pt-0">
                        <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="delete-post-form inline-block" action="#" method="POST">
                            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </span>
                </div>

                <p class="text-gray-500 text-sm mb-4">
                    <a href="#">
                        <img class="inline-block w-6 h-6 rounded-full" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
                    </a>
                    Posted by <a href="#" class="text-gray-700">{{ $post->user->username }}</a> on {{ $post->created_at->format('d/m/Y') }}
                </p>

                <div class="body-content">
                    {!! $post->content !!}
                </div>
                <div class="flex justify-end mt-4 md:mt-6">
                    <a href="{{ route('dashboard') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">Return</a>
                </div>
            </div>
        </div>
    </div>
</div>














