<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    protected $primaryKey = 'option_id';

    public function question()
{
    return $this->belongsTo(Question::class, 'question_id', 'question_id');
}
}
