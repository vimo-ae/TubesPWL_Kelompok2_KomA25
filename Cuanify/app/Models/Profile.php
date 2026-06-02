<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = 'profile_id';

    protected $fillable = [
        'user_id',
        'full_name',
        'profile_photo',
        'bio',
        'level',
        'xp_points',
        'streak_days',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}