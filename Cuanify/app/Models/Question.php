<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $primaryKey = 'question_id';

    public $timestamps = false;

    protected $fillable = [
        'quiz_id',
        'question_text',
        'question_type',
        'points',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];

    public function quiz()
{
    return $this->belongsTo(Quiz::class, 'quiz_id', 'quiz_id');
}

public function options()
{
    return $this->hasMany(AnswerOption::class, 'question_id', 'question_id');
}
}