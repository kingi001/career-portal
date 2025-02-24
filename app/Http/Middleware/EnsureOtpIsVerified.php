<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EnsureOtpIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Ensure the user is logged in
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized. Please log in first.']);
        }

        // Check if OTP is verified
        if ($user->otp !== null && Carbon::now()->lessThan($user->otp_expires_at)) {
            return $next($request);
        }

        return redirect()->route('otp.verify')->withErrors(['otp' => 'Please verify your email with OTP before proceeding.']);
    }
}
