<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendOtpMail;
use Carbon\Carbon;

class OTPController extends Controller
{
    /**
     * Show the OTP verification form.
     */
    public function showOtpForm()
    {
        return view('auth.otp-verify');
    }

    /**
     * Generate and send OTP to the user's email.
     */
    public function sendOtp()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized. Please log in first.']);
        }

        // Generate a 6-digit OTP
        $otp = random_int(100000, 999999);

        // Store hashed OTP securely
        $user->update([
            'otp' => Hash::make($otp), // Ensure OTP is hashed before storage
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        try {
            // Send OTP via email
            Mail::to($user->email)->send(new SendOtpMail($otp));

            return redirect()->route('otp.verify')->with('message', 'A verification code has been sent to your email.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send OTP. Please try again.']);
        }
    }

    /**
     * Verify the OTP entered by the user.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'Unauthorized. Please log in first.']);
        }

        // Check if OTP exists and hasn't expired
        if (!$user->otp || !$user->otp_expires_at || Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'No OTP found or OTP expired. Please request a new one.']);
        }

        // Verify OTP correctly against the hashed version
        if (Hash::check($request->otp, $user->otp)) {
            // Clear OTP after successful verification
            $user->update([
                'otp' => null,
                'otp_expires_at' => null,
            ]);

            return redirect()->route('dashboard')->with('success', 'Verification successful!');
        }

        return back()->withErrors(['otp' => 'Invalid OTP. Please try again.']);
    }
}
