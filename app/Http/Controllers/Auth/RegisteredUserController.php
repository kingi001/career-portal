<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Generate OTP
    $otp = random_int(100000, 999999);

    // Store OTP
    $user->otp = $otp;
    $user->otp_expires_at = now()->addMinutes(10);
    $user->save();

    // Refresh the user model to ensure OTP is stored
    $user->refresh(); // ✅ Ensures we get the latest OTP from the database

    // Log OTP for debugging
    Log::info("Generated OTP for {$user->email}: {$user->otp}");

    // Send OTP via email
    Mail::to($user->email)->send(new SendOtpMail($user->otp));

    // Fire registered event
    event(new Registered($user));

    // Log in the user immediately after registration
    Auth::login($user);

    // Store user ID in session for OTP verification
    session(['otp_user_id' => $user->id]);

    // Redirect user to OTP verification page
    return redirect()->route('otp.send')->with('message', 'A verification code has been sent to your email.');
}

}
