<x-guest-layout>
    <div class="text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

        <!-- Portal Title -->
        <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
        <p class="text-sm font-semibold text-blue-500">E-Recruitment Portal</p>
    </div>

    <!-- Processing Notification Bar (Hidden by Default) -->
    <div id="resetProcessingMessage" class="hidden text-center bg-blue-200 text-blue-800 p-2 rounded-md mt-4">
        ⏳ Processing... Resetting your password, please wait.
    </div>

    <!-- JavaScript to Show the Processing Message -->
    <script>
        document.getElementById("resetForm").addEventListener("submit", function() {
            document.getElementById("resetProcessingMessage").classList.remove("hidden");
        });
    </script>

    <form id="resetForm" method="POST" action="{{ route('password.store') }}" class="mt-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" class="font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="font-semibold" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Reset Password Button -->
        <div class="mt-5 flex flex-col gap-3">
            <x-primary-button class="w-full">
                {{ __('Reset Password') }}
            </x-primary-button>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50">
                Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>
