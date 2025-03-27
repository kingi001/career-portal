<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    protected $fillable = ['user_id', 'label', 'category', 'file_path', 'size'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
}
