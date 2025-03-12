<?php

namespace App\Models;

use App\Models\County;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCounty extends Model
{
    use HasFactory;
    protected $fillable = ['county_id','subcounty_name'];
     /**
     * A SubCounty belongs to a County.
     */
    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

    /**
     * A SubCounty has many Wards.
     */
    public function wards(): HasMany
    {
        return $this->hasMany(Ward::class);
    }
}
