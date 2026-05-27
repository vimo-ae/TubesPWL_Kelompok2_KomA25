<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class QuizController extends Controller
{
    public function show($lesson_id)
    {
        $lesson = Lesson::with('quizzes')->findOrFail($lesson_id);

        return view('quizzes.show', compact('lesson'));
    }
}