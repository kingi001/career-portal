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

        <!-- Instruction Text -->
        <p class="mt-2 text-gray-600 text-sm leading-relaxed">
            <i class="fas fa-info-circle text-blue-500"></i>
            {{ __('Forgot your password? No problem. Enter your email, and we will send a password reset link to help you set a new one.') }}
        </p>
    </div>

    <!-- Session Status Message -->
    @if (session('status'))
        <div class="text-green-600 text-sm font-semibold mt-3 text-center">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    <!-- Forgot Password Form -->
    <form method="POST" action="{{ route('password.email') }}" class="mt-5 bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="font-semibold text-gray-700" />
            <div class="relative">
                <x-text-input id="email" class="block mt-1 w-full text-sm pl-10" type="email" name="email" :value="old('email')" required autofocus />
                <span class="absolute inset-y-0 left-3 flex items-center text-gray-500">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mt-5 flex flex-col gap-3">
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg flex items-center justify-center gap-2 hover:bg-blue-700 transition-all">
                <i class="fas fa-paper-plane"></i> <span>Send Password Reset Link</span>
            </button>

            <!-- Back to Login -->
            <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i> Back to Login
            </a>
        </div>
    </form>
</x-guest-layout>
