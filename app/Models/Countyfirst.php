<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Countyfirst extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'county_name'];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function constituencies(): HasMany
    {
        return $this->hasMany(Constituency::class);
    }
}
