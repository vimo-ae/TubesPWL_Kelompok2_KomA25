<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\AnswerOption;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * 📌 LIST QUIZ DALAM LESSON
     */
    public function show($lesson_id)
    {
        $lesson = Lesson::with('quizzes.questions')
            ->where('lesson_id', $lesson_id)
            ->firstOrFail();
    
        $user = auth()->user();
    
        foreach ($lesson->quizzes as $quiz) {
    
            $bestResult = QuizResult::where('user_id', $user->user_id)
                ->where('quiz_id', $quiz->quiz_id)
                ->orderByDesc('score')
                ->first();
    
            $quiz->best_score = $bestResult?->score;
        }
    
        return view('quizzes.show', compact('lesson'));
    }

    /**
     * 📌 HALAMAN MENGERJAKAN QUIZ
     */
    public function take($quiz_id)
    {
        $quiz = Quiz::with('questions.options')
            ->where('quiz_id', $quiz_id)
            ->firstOrFail();

        return view('quizzes.take', compact('quiz'));
    }

    /**
     * 📌 SUBMIT QUIZ
     */
    public function submit(Request $request, $quiz_id)
    {
        $quiz = Quiz::with('questions.options')
            ->where('quiz_id', $quiz_id)
            ->firstOrFail();

        $user = auth()->user();

        $correct = 0;

        foreach ($quiz->questions as $question) {

            $answerId = $request->input(
                'question_' . $question->question_id
            );

            if (!$answerId) {
                continue;
            }

            $option = AnswerOption::where('option_id', $answerId)
                ->where('question_id', $question->question_id)
                ->first();

            if ($option && $option->is_correct) {
                $correct++;
            }
        }

        // Hitung skor dalam bentuk persentase (0 - 100)
        $totalQuestions = $quiz->questions->count();

        $score = $totalQuestions > 0
            ? round(($correct / $totalQuestions) * 100)
            : 0;

        // Cari hasil quiz sebelumnya
        $result = QuizResult::where('user_id', $user->user_id)
            ->where('quiz_id', $quiz_id)
            ->first();

        $isNewBestScore = false;

        if (!$result) {

            // Percobaan pertama
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

            // Update jika skor baru lebih tinggi
            $result->update([
                'score' => $score,
                'total_correct' => $correct,
                'completed_at' => now(),
            ]);

            $bestScore = $score;
            $bestCorrect = $correct;
            $isNewBestScore = true;

        } else {

            // Pertahankan skor terbaik lama
            $bestScore = $result->score;
            $bestCorrect = $result->total_correct;
        }

        // Cek lulus berdasarkan skor terbaik
        $passed = $bestScore >= $quiz->passing_score;

        return redirect()
            ->route('quizzes.result', $quiz_id)
            ->with([
                'score' => $score,
                'best_score' => $bestScore,
                'correct' => $correct,
                'best_correct' => $bestCorrect,
                'total_questions' => $totalQuestions,
                'passed' => $passed,
                'new_best' => $isNewBestScore,
            ]);
    }
};