<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Profile extends Model
{
    protected $primaryKey = 'profile_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'full_name',
        'profile_photo',
        'bio',
        'level',
        'xp_points',
        'streak_days',
    ];

    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->profile_photo && trim($this->profile_photo) !== '') {
                    return asset('storage/' . $this->profile_photo);
                }
                
                return asset('images/profile-default.jpg');
            }
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function progress()
    {
        return $this->hasMany(\App\Models\Progress::class, 'profile_id', 'profile_id');
    }

    protected function levelTitle(): Attribute
{
    return Attribute::make(
        get: fn () => match (true) {
            $this->level >= 20 => '🌟 Grandmaster',
            $this->level >= 15 => '🏅 Expert',
            $this->level >= 10 => '⚡ Proficient',
            $this->level >= 5  => '🛠 Competent',
            $this->level >= 2  => '🧠 Apprentice',
            default            => '🚀 Novice',
        },
    );
}

    protected function levelBadgeClass(): Attribute
{
    return Attribute::make(
        get: fn () => match (true) {
            $this->level >= 20 => 'bg-amber-500 text-white',
            $this->level >= 15 => 'bg-yellow-400 text-indigo-900',
            $this->level >= 10 => 'bg-purple-500 text-white',
            $this->level >= 5  => 'bg-green-500 text-white',
            $this->level >= 2  => 'bg-blue-400 text-white',
            default            => 'bg-gray-200 text-gray-700',
        },
    );
}
}
