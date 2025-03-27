<x-guest-layout>
    <div class="text-center">
        <!-- Logo -->
         <!-- Desktop Logo -->
         <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo"
         class="hidden md:block mx-auto w-50 h-50 mb-1 animate-fade-in">

     <!-- Mobile Logo -->
     <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo"
         class="block md:hidden mx-auto w-24 h-24 mb-1 animate-fade-in">


        <!-- Portal Title -->
        <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
        <p class="text-sm font-semibold text-blue-500">E-Recruitment Portal</p>
    </div>

    <!-- Information Message -->
    <div class="mb-4 text-sm text-gray-600 text-center">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Processing Notification Bar (Hidden by Default) -->
    <div id="confirmProcessingMessage" class="hidden text-center bg-blue-200 text-blue-800 p-2 rounded-md mt-4">
        ⏳ Processing... Verifying your password, please wait.
    </div>

    <!-- JavaScript to Show the Processing Message -->
    <script>
        document.getElementById("confirmForm").addEventListener("submit", function() {
            document.getElementById("confirmProcessingMessage").classList.remove("hidden");
        });
    </script>

    <form id="confirmForm" method="POST" action="{{ route('password.confirm') }}" class="mt-5">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Button -->
        <div class="mt-5 flex flex-col gap-3">
            <x-primary-button class="w-full">
                {{ __('Confirm Password') }}
            </x-primary-button>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50">
                Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>
