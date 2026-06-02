<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // Primary key custom
    protected $primaryKey = 'lesson_id';

    // Field yang boleh diisi
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'video_url',
        'pdf_file',
        'lesson_order',
        'xp_reward',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Lesson belongs to Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    // Lesson has many Quizzes
    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'lesson_id', 'lesson_id');
    }

    // Lesson has many Progress records
    public function progress()
    {
        return $this->hasMany(Progress::class, 'lesson_id', 'lesson_id');
    }

public function users()
{
    return $this->belongsToMany(
        User::class,
        'lesson_user',
        'lesson_id',
        'user_id'
    )->withTimestamps();
}
}