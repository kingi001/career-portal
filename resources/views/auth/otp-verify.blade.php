<x-guest-layout>
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
        <div class="text-green-600 text-sm mt-3 text-center">{{ session('message') }}</div>
    @endif

    @if (session('error'))
        <div class="text-red-600 text-sm mt-3 text-center">{{ session('error') }}</div>
    @endif

    <!-- OTP Form -->
    <form id="otpForm" method="POST" action="{{ route('otp.verify') }}" class="mt-5">
        @csrf
        <div class="relative">
            <x-input-label for="otp" :value="__('OTP Code')" />
            <div class="relative">
                <x-text-input id="otp" class="block mt-1 w-full text-center text-lg tracking-widest"
                    type="text" name="otp" required autofocus maxlength="6" placeholder="●●●●●●" />
                <span class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                    <i class="fas fa-key"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <!-- Countdown Timer -->
        <div class="mt-3 text-sm text-gray-500">
            <span id="countdown">OTP expires in 10:00</span>
        </div>

        <!-- Submit Button -->
        <div class="mt-4 flex justify-center">
            <button type="submit" id="verifyButton" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold flex items-center justify-center gap-2 hover:bg-blue-700">
                <i class="fas fa-check-circle"></i> <span>Verify</span>
            </button>
        </div>

        <!-- Processing Spinner (Hidden by Default) -->
        <div id="verifyingMessage" class="hidden text-center text-blue-600 mt-3">
            <i class="fas fa-spinner fa-spin"></i> Verifying... Please wait.
        </div>
    </form>

    <!-- Resend OTP Button -->
    <div class="mt-4 w-full max-w-sm flex justify-between items-center">
        <p class="text-sm text-gray-600">Didn't receive the code?</p>

        <form method="GET" action="{{ route('otp.send') }}">
            @csrf
            <button type="submit" id="resend-otp" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700
                text-white font-semibold py-2 px-4 rounded-full flex items-center shadow-lg transition-all duration-300 disabled:opacity-50">
                <i class="fa-solid fa-sync-alt"></i> Resend
            </button>
        </form>
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

    // Show Spinner when Submitting OTP
    document.getElementById("otpForm").addEventListener("submit", function () {
        document.getElementById("verifyingMessage").classList.remove("hidden");

        // Disable the Verify button to prevent multiple clicks
        let verifyBtn = document.getElementById("verifyButton");
        verifyBtn.disabled = true;
        verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verifying...';
    });
</script>
