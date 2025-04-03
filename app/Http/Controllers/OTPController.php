<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OTPController extends Controller
{
    /**
     * Show the OTP verification form.
     */
    public function index()
    {
        return view('auth.otp-verify');
    }

    public function store(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        $user = Auth::user();
        // Check if OTP is expired
        if (!$user->otp_expires_at || Carbon::now()->greaterThan($user->otp_expires_at)) {
            return redirect()->back()->withErrors(['otp' => 'OTP has expired. Request a new one.']);
        }
        // Check if the entered OTP matches the stored OTP
        if ($request->input('otp') == $user->otp) {
            $user->resetCodeAfterLogin(); // Reset OTP after successful login
            return redirect()->route('dashboard')->with('verification_success', 'Verification Successful'); // Redirect to dashboard
        }
        return redirect()->back()->withErrors(['otp' => 'Incorrect OTP. Try again.']);
    }

    public function resend()
    {
        $user = Auth::user();

        // Generate and update new OTP
        $otp = $user->resetCode(); // Uses resetCode() method

        // Send OTP email
        Mail::to($user->email)->send(new SendOtpMail($otp, $user->email)); // Pass the second argument

        return redirect()->back()->with('message', 'A new OTP has been sent to your email.');
    }
}
