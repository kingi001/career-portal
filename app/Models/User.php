<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Education;
use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'otp',
        'otp_expires_at'
    ];
    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Random GENERATOR OTP Method
    public function generateCode()
    {
        $this->timestamps = false;

        $otp = rand(1000, 9999); // Generate a 4-digit OTP
        $this->otp = $otp; // Store OTP in plain text
        $this->otp_expires_at = now()->addMinutes(10); // Set expiry time
        $this->save(); // Save the changes

        return $otp; // Return the OTP for email sending
    }
    public function resetCodeAfterLogin()
    {
        $this->timestamps = false;
        $this->update([
            'otp' => null,
            'otp_expires_at' => null,
        ]);
    }
    public function resetCode()
    {
        $this->timestamps = false;
        $otp = rand(1000, 9999); // Generate new OTP

        $this->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        return $otp; // Return OTP for email sending
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function userInformation(): HasOne
    {
        return $this->hasOne(UserInformation::class);
    }

    /**
     * Get the professional qualifications for the user.
     */
    public function professionalQualifications()
    {
        return $this->hasMany(ProfessionalQualification::class);
    }
    // Relationship: A user has many memberships
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
    /**
     * Get the employment history for the user.
     */
    public function employments()
    {
        return $this->hasMany(EmploymentHistory::class);
    }
    /**
     * Get the referees associated with the user.
     */
    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
}
