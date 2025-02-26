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
        <i class="fas fa-spinner fa-spin"></i> Resetting your password, please wait...
    </div>

    <form id="resetForm" method="POST" action="{{ route('password.store') }}" class="mt-5 bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-700" />
            <div class="relative">
                <x-text-input id="email" class="block mt-1 w-full text-sm pl-10" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('New Password')" class="font-semibold text-gray-700" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full text-sm pl-10" type="password" name="password" required autocomplete="new-password" />
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm New Password')" class="font-semibold text-gray-700" />
            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm pl-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Reset Password Button -->
        <div class="mt-5 flex flex-col gap-3">
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-blue-700 transition-all">
                <i class="fas fa-key"></i> <span>Reset Password</span>
            </button>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i> Back to Login
            </a>
        </div>
    </form>

    <!-- JavaScript to Show the Processing Message -->
    <script>
        document.getElementById("resetForm").addEventListener("submit", function() {
            document.getElementById("resetProcessingMessage").classList.remove("hidden");
        });
    </script>
</x-guest-layout>
