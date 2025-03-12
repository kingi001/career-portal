<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salutation',
        'surname',
        'other_names',
        'national_id_number',
        'ethnicity_id',
        'county_id',
        'sub_county_id',
        'ward_id',
        'date_of_birth',
        'gender',
        'mobile_number',
        'postal_code',
        'is_pwd',
        'pwd_type',
        'ncpwd_number',
        'bma_applicant',
        'department',
        'designation',
        'terms_of_service',
        'job_scale',
        'date_of_appointment',
        'criminal_offense',
        'criminal_details',
    ];

    /**
     * A UserInformation belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A UserInformation belongs to an Ethnicity.
     */
    public function ethnicity(): BelongsTo
    {
        return $this->belongsTo(Ethnicity::class);
    }

    /**
     * A UserInformation belongs to a County.
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    /**
     * A UserInformation belongs to a SubCounty.
     */
    public function subCounty(): BelongsTo
    {
        return $this->belongsTo(SubCounty::class);
    }

    /**
     * A UserInformation belongs to a Ward.
     */
    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }
}
