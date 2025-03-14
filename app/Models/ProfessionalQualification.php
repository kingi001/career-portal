<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'institution',
        'certification',
        'award',
        'start_date',
        'end_date'
    ];

    /**
     * Get the user who owns the qualification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
