<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<div class="bg-grey-200 max-w-4xl mx-auto py-8 pt-6 pr-4 pl-4 sm:px-6 lg:px-8">
    <div class="bg-grey overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-400">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input id="title" type="text" name="title" class="pt-2 pb-2 pr-2 pl-2 form-input w-full border border-black @error('title') @enderror" value="{{ old('title', $post->title) }}" autofocus>
                    @error('title')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                    <textarea id="content" name="content" class="pt-2 pb-2 pr-2 pl-2 form-textarea w-full border border-black @error('content') @enderror" rows="6">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <a href="{{ route('posts.show', $post->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded m-2">Return</a>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')

