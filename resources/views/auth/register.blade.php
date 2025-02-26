<x-guest-layout>
    <div class="text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

        <!-- Portal Title -->
        <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
        <p class="text-sm font-semibold text-blue-500">E-Recruitment Portal</p>
    </div>

    <!-- Processing Notification (Hidden by Default) -->
    <div id="registerProcessingMessage" class="hidden text-center bg-blue-200 text-blue-800 p-2 rounded-md mt-4">
        ⏳ Processing... Creating your account, please wait.
    </div>

    <!-- Registration Form -->
    <form id="registerForm" method="POST" action="{{ route('register') }}" class="mt-5">
        @csrf

        <!-- Full Name -->
        <div>
            <x-input-label for="name" value="Full Name" class="font-semibold" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="block mt-1 w-full text-sm" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" value="Email Address" class="font-semibold" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="block mt-1 w-full text-sm" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" class="font-semibold" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                class="block mt-1 w-full text-sm" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirm Password" class="font-semibold" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="block mt-1 w-full text-sm" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Register & Login Links -->
        <div class="mt-5 flex flex-col gap-3 text-center">
            <!-- Register Button -->
            <x-primary-button class="w-full text-center">
                {{ __('Register') }}
            </x-primary-button>

            <!-- Already Registered? -->
            <a href="{{ route('login') }}"
                class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50">
                Already registered? Log in
            </a>
        </div>
    </form>

    <!-- JavaScript to Show Processing Message -->
    <script>
        document.getElementById("registerForm").addEventListener("submit", function () {
            document.getElementById("registerProcessingMessage").classList.remove("hidden");
        });
    </script>
</x-guest-layout>
