<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-2">
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

            <!-- Portal Title -->
            <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
            <p class="text-sm font-semibold text-blue-500">Career Portal

            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="text-green-600 text-sm font-semibold mt-2 text-center">
                {{ session('status') }}
            </div>
        @endif

        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="mt-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="mt-5 flex flex-col gap-3">
                <x-primary-button class="w-full">
                    {{ __('Send Password Reset Link') }}
                </x-primary-button>

                <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100">
                    Back to Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
