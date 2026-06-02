<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $primaryKey = 'progress_id';
    public $timestamps = false;

    protected $fillable = [
        'profile_id',
        'lesson_id',
        'is_completed',
        'completed_at',
        'xp_earned',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'profile_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'lesson_id');
    }
}
