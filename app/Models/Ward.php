<?php

namespace App\Models;

use App\Models\Constituency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['constituency_id', 'ward_name'];

    public function constituency(): BelongsTo
    {
        return $this->belongsTo(Constituency::class);
    }
}
