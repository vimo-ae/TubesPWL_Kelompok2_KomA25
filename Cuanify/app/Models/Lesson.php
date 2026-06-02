<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Progress;

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
        'has_quiz',
        'is_published',
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

    public function progress()
    {
        return $this->hasMany(
            Progress::class,
            'lesson_id',
            'lesson_id'
        );
    }

    public function getEmbedVideoUrlAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        // Cari ID unik video YouTube dari berbagai format link
        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
        preg_match($regExp, $this->video_url, $matches);

        // Jika ID video ketemu (panjang ID YouTube biasanya 11 karakter)
        if (isset($matches[2]) && strlen($matches[2]) == 11) {
            return 'https://www.youtube.com/embed/' . $matches[2];
        }

        // Kalau bukan link YouTube (misal link mp4 langsung), kembalikan aslinya
        return $this->video_url;
    }
}