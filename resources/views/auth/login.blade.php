<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-2">
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

            <!-- Portal Title -->
            <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
            <p class="text-sm font-semibold text-blue-500">Career Portal</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="mt-5">
            @csrf
            
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center text-sm text-gray-600">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <!-- Login & Register Buttons -->
            <div class="mt-5 flex flex-col gap-3">
                <x-primary-button class="w-full">
                    {{ __('Log in') }}
                </x-primary-button>

                <a href="{{ route('register') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50">
                    Create an Account
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
