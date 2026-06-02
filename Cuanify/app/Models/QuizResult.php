<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;
    
    protected $table = 'quiz_results';

    protected $primaryKey = 'result_id';
    public $timestamps = false; 

    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'total_correct',
        'completed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id', 'quiz_id');
    }
}
