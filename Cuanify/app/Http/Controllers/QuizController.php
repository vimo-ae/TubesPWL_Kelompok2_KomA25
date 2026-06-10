<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\AnswerOption;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function show($lesson_id)
    {
        $lesson = Lesson::with('quiz.questions.options')
            ->where('lesson_id', $lesson_id)
            ->firstOrFail();

        $user = auth()->user();

        if ($lesson->quiz) {

            $bestResult = QuizResult::where('user_id', $user->user_id)
                ->where('quiz_id', $lesson->quiz->quiz_id)
                ->orderByDesc('score')
                ->first();

            $lesson->quiz->best_score = $bestResult?->score;
        }

        return view('quizzes.show', compact('lesson'));
    }

    public function take($quiz_id)
    {
        $quiz = Quiz::with('questions.options')
            ->where('quiz_id', $quiz_id)
            ->firstOrFail();

        return view('quizzes.take', compact('quiz'));
    }

    public function submit(Request $request, $quiz_id)
{
    $quiz = Quiz::with('questions.options')
        ->where('quiz_id', $quiz_id)
        ->firstOrFail();

    $user = auth()->user();

    $correct = 0;

    foreach ($quiz->questions as $question) {

        $answerId = $request->input('question_' . $question->question_id);

        if (!$answerId) {
            continue;
        }

        // Tetap menggunakan query database seperti kodemu
        $option = AnswerOption::where('option_id', $answerId)
            ->where('question_id', $question->question_id)
            ->first();
        
        if ($option && $option->is_correct) {
            $correct++;
        }
    }

    $totalQuestions = $quiz->questions->count();

    $score = $totalQuestions > 0
        ? round(($correct / $totalQuestions) * 100)
        : 0;

    $result = QuizResult::where('user_id', $user->user_id)
        ->where('quiz_id', $quiz_id)
        ->first();

    $isNewBestScore = false;

    if (!$result) {

        QuizResult::create([
            'user_id' => $user->user_id,
            'quiz_id' => $quiz_id,
            'score' => $score,
            'total_correct' => $correct,
            'completed_at' => now(),
        ]);

        $bestScore = $score;
        $bestCorrect = $correct;
        $isNewBestScore = true;

    } elseif ($score > $result->score) {

        $result->update([
            'score' => $score,
            'total_correct' => $correct,
            'completed_at' => now(),
        ]);

        $bestScore = $score;
        $bestCorrect = $correct;
        $isNewBestScore = true;

    } else {
        $bestScore = $result->score;
        $bestCorrect = $result->total_correct;
    }

    $passed = $bestScore >= $quiz->passing_score;

    // --- TETAP PAKAI WITH JIKA KAMU BUTUH DATA FLASH SESSION ---
    // Tapi pastikan di Blade kamu panggil dengan {{ session('score') }}
    dd([
        'total_soal' => $quiz->questions->count(),
        'jawaban_benar' => $correct,
        'skor_hitung' => $score
    ]);
    return redirect()->route('quizzes.result', $quiz_id);
}
}