<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="bg-gray-100 flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div class="bg-white shadow-md rounded-md p-6">

            <img class="mx-auto h-24 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="" />

            <h2 class="my-3 text-center text-3xl font-bold tracking-tight text-gray-900">
                {{ __('login_register.login') }}
            </h2>


            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('login_register.email') }}:</label>
                    <div class="mt-1">
                        <input name="email" type="email" autocomplete="email-address"
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('login_register.password') }}:</label>
                    <div class="mt-1">
                        <input name="password" type="password" autocomplete="password"
                            class="px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md border border-transparent  py-2 px-4 text-sm font-medium text-black shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-blue focus:ring-offset-2">{{ __('login_register.login') }}
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>


