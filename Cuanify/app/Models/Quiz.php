<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'lesson_id');
    }

    protected $table = 'quizzes';
     protected $fillable = [
        'lesson_id',
        'title',
        'passing_score',
        'time_limit'
    ];

    public function questions()
{
    return $this->hasMany(Question::class, 'quiz_id', 'quiz_id');
}

    protected $primaryKey = 'quiz_id';

    public $incrementing = true;
    protected $keyType = 'int';

}
