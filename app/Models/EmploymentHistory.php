<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company',
        'designation',
        'salary',
        'start_date',
        'end_date',
        'responsibilities',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
