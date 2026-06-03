<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends Controller
{
    public function show($quiz_id)
    {
        $user = auth()->user();

        $result = QuizResult::where('user_id', $user->user_id)
            ->where('quiz_id', $quiz_id)
            ->latest()
            ->firstOrFail();

        $quiz = Quiz::with('questions')
            ->where('quiz_id', $quiz_id)
            ->firstOrFail();

        return view('quizzes.result', compact('result', 'quiz'));
    }
}