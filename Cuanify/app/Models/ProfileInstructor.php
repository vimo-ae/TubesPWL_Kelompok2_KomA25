<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileInstructor extends Model
{
    use HasFactory;
    
    protected $table = 'profile_instructors'; 
    protected $primaryKey = 'profile_id';

    protected $fillable = [
        'user_id',
        'deskripsi',
        'linkedin',
        'cv',
    ];
    public $timestamps = false;
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
