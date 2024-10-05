<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'institution',
        'level_of_study',
        'field_of_study',
        'award',
        'start_date',
        'end_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
