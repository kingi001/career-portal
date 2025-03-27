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

    <div class="text-center mt-4">
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
    <form id="otpForm" method="POST" action="{{ route('verify.store') }}" class="mt-5">
        @csrf

        <div class="text-center">
            <x-input-label for="otp" :value="__('OTP Code')" class="mb-2" />

            <!-- OTP Boxes -->
            <div class="flex justify-center gap-2">
                @for ($i = 1; $i <= 4; $i++)
                    <input type="text" id="otp-{{ $i }}" class="otp-box" maxlength="1" inputmode="numeric" aria-label="OTP Digit {{ $i }}">
                @endfor
                <input type="hidden" name="otp" id="otp-value">
            </div>

            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <!-- Static OTP Expiry Message -->
        <div class="mt-3 text-sm text-gray-500 text-center">
            OTP expires in 10 minutes.
        </div>

        <!-- Submit Button -->
        <div class="mt-4 flex justify-center">
            <button type="submit" id="verifyButton"
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold flex items-center justify-center gap-2 hover:bg-blue-700">
                <i class="fas fa-check-circle"></i> <span>Verify</span>
            </button>
        </div>

        <!-- Processing Spinner -->
        <div id="verifyingMessage" class="hidden text-center text-blue-600 mt-3">
            <i class="fas fa-spinner fa-spin"></i> Verifying... Please wait.
        </div>
    </form>

    <!-- Resend OTP Button -->
    <div class="mt-4 w-full max-w-sm flex justify-between items-center">
        <p class="text-sm text-gray-600">Didn't receive the code?</p>

        <form method="POST" action="{{ route('otp.resend') }}">
            @csrf
            <button type="submit" id="resend-otp" disabled
                class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700
                text-white font-semibold py-2 px-4 rounded-full flex items-center shadow-lg transition-all duration-300 disabled:opacity-50">
                <i class="fa-solid fa-sync-alt"></i> Resend
            </button>
        </form>
    </div>
    <!-- Back to Login Button -->
    <div class="mt-6 flex justify-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 bg-gradient-to-r from-gray-600 to-gray-800
            hover:from-gray-700 hover:to-black text-white font-semibold py-2.5 px-6 rounded-full
            shadow-md transition-all duration-300 transform hover:scale-105">
                <i class="fas fa-arrow-left"></i> <span>Back to Login</span>
            </button>
        </form>
    </div>
</x-guest-layout>

<script>
    // Show Spinner when Submitting OTP
    document.getElementById("otpForm").addEventListener("submit", function() {
        document.getElementById("verifyingMessage").classList.remove("hidden");
        let verifyBtn = document.getElementById("verifyButton");
        verifyBtn.disabled = true;
        verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verifying...';

        let otpValue = '';
        document.querySelectorAll('.otp-box').forEach(input => otpValue += input.value);
        document.getElementById("otp-value").value = otpValue;
    });

    // OTP Input Handling & Auto-submit when filled
    document.querySelectorAll('.otp-box').forEach((box, index, boxes) => {
        box.addEventListener('input', function () {
            if (this.value.length === 1 && index < boxes.length - 1) {
                boxes[index + 1].focus();
            }

            let otpValue = '';
            document.querySelectorAll('.otp-box').forEach(input => otpValue += input.value);

            if (otpValue.length === 4) {
                document.getElementById("otp-value").value = otpValue;
                document.getElementById("otpForm").submit();
            }
        });

        box.addEventListener('keydown', function (e) {
            if (e.key === "Backspace" && this.value.length === 0 && index > 0) {
                boxes[index - 1].focus();
            }
        });
    });
</script>

<style>
    .otp-box {
        font-size: 24px;
        text-align: center;
        border: 2px solid #ddd;
        width: 50px;
        height: 50px;
        margin: 5px;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .otp-box:focus {
        border-color: #2563eb;
        box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
    }
</style>
