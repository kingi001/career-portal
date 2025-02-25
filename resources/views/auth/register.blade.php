<x-guest-layout>
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

            <!-- Portal Title -->
            <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
            <p class="text-sm font-semibold text-blue-500">Career Portal</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-5">
            @csrf

            <!-- Full Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="font-semibold" />
                <x-text-input id="name" class="block mt-1 w-full text-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email Address')" class="font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full text-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Register & Login Buttons -->
            <div class="mt-5 flex flex-col gap-3">
                <!-- Register Button -->
                <x-primary-button class="w-full">
                    {{ __('Register') }}
                </x-primary-button>

                <!-- Already Registered? -->
                <a href="{{ route('login') }}" class="w-full text-center px-4 py-2 text-sm font-medium text-indigo-600 border border-indigo-600 rounded-lg hover:bg-indigo-50">
                    Already registered? Log in
                </a>
            </div>
        </form>
</x-guest-layout>
