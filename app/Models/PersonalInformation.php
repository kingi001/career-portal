<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'personal_information';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        // Section 1: Personal Details
        'salutation', 'full_names', 'id_number',
        'country_id', 'county_id', 'constituency_id', 'ward_id',
        'date_of_birth', 'gender', 'kra_pin', 'postal_code',
        'email', 'mobile_number', 'is_pwd', 'pwd_type', 'ncpwd_number',

        // Section 2: Current Employment Details
        'bma_applicant', 'department', 'designation',
        'terms_of_service', 'job_scale', 'date_of_appointment',

        // Section 3: Other Personal Details
        'criminal_offense', 'criminal_details',
    ];

    /**
     * Define relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define relationship with Country.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Define relationship with County.
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    /**
     * Define relationship with Constituency.
     */
    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    /**
     * Define relationship with Ward.
     */
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    /**
     * Mutator for full names (capitalize each word).
     */
    public function setFullNamesAttribute($value)
    {
        $this->attributes['full_names'] = ucwords(strtolower($value));
    }

    /**
     * Mutator for email (store lowercase).
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
