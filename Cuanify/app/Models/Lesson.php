<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Progress;

class Lesson extends Model
{

    protected $primaryKey = 'lesson_id';

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

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function quiz()
{
    return $this->hasOne(Quiz::class, 'lesson_id', 'lesson_id');
}

    public function progress()
    {
        return $this->hasMany(
            \App\Models\Progress::class,
            'lesson_id',
            'lesson_id'
        );
    }

    public function getEmbedVideoUrlAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
        preg_match($regExp, $this->video_url, $matches);

        if (isset($matches[2]) && strlen($matches[2]) == 11) {
            return 'https://www.youtube.com/embed/' . $matches[2];
        }

        return $this->video_url;
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