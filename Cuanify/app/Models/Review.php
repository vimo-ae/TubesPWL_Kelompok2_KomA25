<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // Sesuaikan primary key kalau kamu pakai nama lain
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'user_id',
        'course_id',    
        'rating',
        'comment'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}