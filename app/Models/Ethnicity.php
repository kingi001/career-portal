<?php

namespace App\Models;

use App\Models\UserInformation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ethnicity extends Model
{
    use HasFactory;
    protected $fillable = ['ethnicity_name'] ;
     /**
     * An Ethnicity has many Users.
     */
    public function users(): HasMany
    {
        return $this->hasMany(UserInformation::class);
    }
}
