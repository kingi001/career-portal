<x-guest-layout>
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg mt-10">
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Bandari Maritime Academy Logo" class="mx-auto w-24 h-24 mb-4">

            <!-- Portal Title -->
            <h2 class="text-xl font-semibold text-gray-700">Bandari Maritime Academy</h2>
            <p class="text-sm font-semibold text-blue-500">Career Portal</p>
        </div>
        <div class="text-center">
            <h2 class="text-xl font-semibold text-gray-700">Verify Your Email</h2>
            <p class="text-sm text-gray-500">Enter the OTP sent to your email</p>
        </div>

        <!-- Flash Messages -->
        @if (session('message'))
            <div class="text-green-600 text-sm mt-3">{{ session('message') }}</div>
        @endif

        @if (session('error'))
            <div class="text-red-600 text-sm mt-3">{{ session('error') }}</div>
        @endif

        <!-- OTP Form -->
        <form method="POST" action="{{ route('otp.verify') }}" class="mt-5">
            @csrf
            <div>
                <x-input-label for="otp" :value="__('OTP Code')" />
                <x-text-input id="otp" class="block mt-1 w-full text-sm" type="text" name="otp" required autofocus maxlength="6" />
                <x-input-error :messages="$errors->get('otp')" class="mt-2" />
            </div>

            <!-- Countdown Timer -->
            <div class="mt-3 text-sm text-gray-500">
                <span id="countdown">OTP expires in 10:00</span>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <x-primary-button class="w-full">
                    {{ __('Verify') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Resend OTP Button -->
        <form method="GET" action="{{ route('otp.send') }}" class="mt-4">
            @csrf
            <x-primary-button class="w-full" id="resend-otp" enabled>
                {{ __('Resend OTP') }}
            </x-primary-button>
        </form>

          <!-- Back Button -->
          <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline">
                ← Back
            </a>
        </div>
    </div>
</x-guest-layout>

<script>
    // Countdown Timer (10 minutes)
    let timeLeft = 600; // 600 seconds = 10 minutes
    let countdownEl = document.getElementById("countdown");
    let resendButton = document.getElementById("resend-otp");

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        countdownEl.textContent = `OTP expires in ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

        if (timeLeft <= 0) {
            countdownEl.textContent = "OTP expired. Request a new one.";
            resendButton.removeAttribute("disabled"); // Enable resend button
        } else {
            timeLeft--;
            setTimeout(updateTimer, 1000);
        }
    }

    updateTimer(); // Start the countdown
</script>
