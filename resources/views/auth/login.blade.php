<x-guest-layout>
    <div class="text-center mt-1 animate-fade-in">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-50 h-50 mb-1 animate-fade-in">

        <!-- Portal Title -->
        <h2 class="text-2xl font-semibold text-gray-800">Bandari Maritime Academy</h2>
        <p class="text-sm font-semibold text-blue-500">E-Recruitment Portal</p>
    </div>

    <!-- Processing Notification Bar -->
    <div id="processingMessage" class="hidden text-center bg-blue-200 text-blue-800 p-2 rounded-md mt-3 mx-auto max-w-md shadow-md">
        <i class="fas fa-spinner fa-spin"></i> Processing... Logging in, please wait.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="mt-1 mx-auto max-w-md bg-white p-6 rounded-lg shadow-lg animate-fade-in" id="loginForm">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <x-input-label for="email" value="Email Address" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-envelope"></i>
                </span>
                <x-text-input id="email" class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email address" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" value="Password" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-lock"></i>
                </span>
                <x-text-input id="password" class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 focus:outline-none">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="flex items-center text-sm text-gray-600">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2"><i class="fas fa-check-circle text-indigo-600"></i> Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                    <i class="fas fa-key"></i> Forgot Password?
                </a>
            @endif
        </div>

        <!-- Login & Register Buttons -->
        <div class="mt-5 flex flex-col gap-3">
            <!-- Login Button -->
            <button type="submit" id="loginButton"
                class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white text-sm py-2 rounded-lg font-semibold
                hover:from-indigo-700 hover:to-blue-600 flex justify-center items-center gap-2 transition-all duration-300 shadow-md">
                <i class="fas fa-sign-in-alt"></i> Log in
            </button>

            <!-- Register Section -->
            <div class="text-center text-sm text-gray-600">
                Don't have an account?
            </div>

            <!-- Register Link -->
            <a href="{{ route('register') }}"
                class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg
                hover:bg-indigo-50 flex justify-center items-center gap-2 transition-all duration-300">
                <i class="fas fa-user-plus"></i> Create an Account
            </a>
        </div>

    </form>

    <!-- JavaScript for Interactivity -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function (event) {
            // Show processing message
            document.getElementById("processingMessage").classList.remove("hidden");

            // Disable login button to prevent multiple submissions
            let loginBtn = document.getElementById('loginButton');
            loginBtn.disabled = true;
            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
        });

        // Toggle Password Visibility
        document.getElementById("togglePassword").addEventListener("click", function () {
            let passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.type = "password";
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
</x-guest-layout>
