<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $user;

    public function __construct($otp, $user)
    {
        $this->otp = $otp;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Your OTP Code')
            ->view('emails.otp')
            ->with([
                'otp' => $this->otp,
                'user' => $this->user, // Ensure user data is available in the email
            ])
            ->attach(public_path('images/logo.png'), [
                'as' => 'logo.png',
                'mime' => 'image/png',
            ]);
    }
}
