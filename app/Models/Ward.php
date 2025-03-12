<?php

namespace App\Models;

use App\Models\County;
use App\Models\SubCounty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['sub_county_id','ward_name'] ;
     /**
     * A Ward belongs to a SubCounty.
     */
    public function subcounty(): BelongsTo
    {
        return $this->belongsTo(SubCounty::class);
    }

    /**
     * A Ward belongs to a County through a SubCounty.
     */
    public function county(): BelongsTo
    {
        return $this->belongsToThrough(County::class, SubCounty::class);
    }
}
