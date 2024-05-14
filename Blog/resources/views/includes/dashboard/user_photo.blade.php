<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

@include('includes.dashboard.header')

<form method="post" action="{{ route('photo') }}" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 md:mt-16">
    @csrf
    <div class="mb-4">
        <label for="user_photo" class="block text-sm font-medium text-gray-700">User Photo</label>
        <div class="mt-1 flex items-center">
            <input type="file" name="user_photo" id="user_photo" class="appearance-none bg-transparent border border-gray-300 p-2 rounded-md shadow-sm text-sm leading-5 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            @error('user_photo')
            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            Upload Avatar
        </button>
    </div>
</form>


@include('includes.footer')
