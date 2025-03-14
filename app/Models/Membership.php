<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'professional_body',
        'membership_no',
        'date_renewed',
        'expiry_date',
    ];

    // Relationship: A membership belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
