<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Quiz;

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

}