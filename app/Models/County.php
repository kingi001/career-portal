<?php

namespace App\Models;

use App\Models\SubCounty;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class County extends Model
{
    use HasFactory;
    protected $fillable = ['county_name'];
    public function subcounties(): HasMany
    {
        return $this->hasMany(SubCounty::class);
    }

    /**
     * A County has many Wards through SubCounties.
     */
    public function wards(): HasMany
    {
        return $this->hasManyThrough(Ward::class, SubCounty::class);
    }
}
