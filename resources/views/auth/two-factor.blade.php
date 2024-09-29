<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4 w-100" style="max-width: 400px; border-radius: 12px; background-color: #ffffff;">
            <div class="card-body">
                <h4 class="card-title text-center mb-3" style="color: #333333;">Two-Factor Authentication</h4>
                <p class="text-center mb-4" style="color: #6c757d;">
                    We've sent a verification code to your email. Please check your inbox and enter the code below to verify your identity.
                </p>

                <p class="text-center text-danger" id="countdown">
                    Your verification code will expire in <span id="time">05:00</span> minutes.
                </p>

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('two-factor.verify') }}" method="POST" id="verify-form">
                    @csrf
                    <div class="mb-3">
                        <label for="code" class="form-label" style="color: #495057;">Verification Code</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Enter the code" required style="border-color: #ced4da;">
                    </div>
                    <div class="d-grid mt-2">
                        <x-primary-button class="btn btn-primary btn-lg" type="submit" style="background-color: #007bff; border-color: #007bff;">
                            {{ __('Verify Code') }}
                        </x-primary-button>
                    </div>
                </form>

                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        @foreach ($errors->all() as $error)
                           <p class="mb-0" style="background-color:red;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <p class="text-center mt-4" style="color: #6c757d;">
                    Didn't receive the email? <a href="" class="text-primary" style="color: #007bff;">Resend Code</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Set the countdown time (5 minutes in milliseconds)
        var countdownTime = 5 * 60 * 1000; // 5 minutes in milliseconds
        var countdownElement = document.getElementById('time');

        function startCountdown(duration) {
            var startTime = Date.now();
            var interval = setInterval(function () {
                var elapsedTime = Date.now() - startTime;
                var remainingTime = duration - elapsedTime;

                // Calculate minutes and seconds remaining
                var minutes = Math.floor(remainingTime / 1000 / 60);
                var seconds = Math.floor((remainingTime / 1000) % 60);

                // Format time as MM:SS
                countdownElement.textContent = 
                    (minutes < 10 ? '0' : '') + minutes + ":" + 
                    (seconds < 10 ? '0' : '') + seconds;

                // If time runs out, stop the timer and disable form submission
                if (remainingTime <= 0) {
                    clearInterval(interval);
                    countdownElement.textContent = '00:00';
                    alert('The verification code has expired. Please request a new code.');
                    document.getElementById('verify-form').querySelector('x-primary-button').disabled = true;
                }
            }, 1000);
        }

        // Start the countdown on page load
        startCountdown(countdownTime);
    </script>
</x-guest-layout>
