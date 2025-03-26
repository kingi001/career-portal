<x-guest-layout>
    <div class="text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-50 h-50 mb-1 animate-fade-in">

        <!-- Portal Title -->
        <h2 class="text-2xl font-semibold text-gray-800">Bandari Maritime Academy</h2>
        <p class="text-sm font-semibold text-blue-500">E-Recruitment Portal</p>
    </div>

    <!-- Processing Notification -->
    <div id="registerProcessingMessage" class="hidden text-center bg-blue-200 text-blue-800 p-2 rounded-md mt-2 shadow-md">
        <i class="fas fa-spinner fa-spin"></i> Processing... Creating your account, please wait.
    </div>

    <!-- Registration Form -->
    <form id="registerForm" method="POST" action="{{ route('register') }}" class="mt-1 space-y-4 p-6 bg-white shadow-lg rounded-lg max-w-lg mx-auto">
        @csrf

        <!-- Full Name -->
        <div class="relative">
            <x-input-label for="name" value="Full Name" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-user"></i>
                </span>
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your full name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative">
            <x-input-label for="email" value="Email Address" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-envelope"></i>
                </span>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                    class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your email address" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative">
            <x-input-label for="password" value="Password" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-lock"></i>
                </span>
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Create a strong password" />
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 focus:outline-none">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <p id="password-strength" class="text-xs text-gray-500 mt-1"></p>

            <!-- Password Strength Indicator -->
            <div class="w-full bg-gray-200 h-1 rounded mt-1">
                <div id="password-strength-bar" class="h-1 rounded transition-all duration-300"></div>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <x-input-label for="password_confirmation" value="Confirm Password" class="font-semibold" />
            <div class="relative">
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-key"></i>
                </span>
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block mt-1 w-full text-sm pl-10 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" placeholder="Re-enter your password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

          <!-- Register & Login Links -->
          <div class="mt-5 flex flex-col gap-3">
            <!-- Register Button -->
            <button type="submit" id="registerButton"
                class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 text-white text-sm py-2 rounded-lg font-semibold
                hover:from-indigo-700 hover:to-blue-600 flex justify-center items-center gap-2 transition-all duration-300 shadow-md">
                <i class="fas fa-user-plus"></i> Register
            </button>

            <!-- Already have an account -->
            <div class="text-center text-sm text-gray-600">
                Already have an account?
            </div>

            <!-- Login Link -->
            <a href="{{ route('login') }}"
                class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg
                hover:bg-indigo-50 flex justify-center items-center gap-2 transition-all duration-300">
                <i class="fas fa-sign-in-alt"></i> Log in
            </a>
        </div>
    </form>

    <!-- JavaScript -->
    <script>
        document.getElementById("registerForm").addEventListener("submit", function (event) {
            event.preventDefault();
            document.getElementById("registerProcessingMessage").classList.remove("hidden");

            let registerBtn = document.getElementById('registerButton');
            registerBtn.disabled = true;
            registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registering...';

            this.submit();
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

        // Password Strength Indicator
        document.getElementById("password").addEventListener("input", function () {
            let password = this.value;
            let strengthBar = document.getElementById("password-strength-bar");
            let strengthIndicator = document.getElementById("password-strength");
            let strength = 0;

            if (password.length >= 6) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            let colors = ["bg-red-500", "bg-yellow-500", "bg-green-500"];
            strengthBar.className = `h-1 rounded transition-all duration-300 ${colors[Math.min(strength, 2)]}`;
            strengthBar.style.width = `${strength * 25}%`;

            strengthIndicator.textContent = ["Weak", "Medium", "Strong"][Math.min(strength, 2)];
        });
    </script>
</x-guest-layout>
