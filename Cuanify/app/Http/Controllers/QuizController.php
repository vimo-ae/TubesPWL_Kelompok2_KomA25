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

        return view('quizzes.show', compact('lesson'));
    }

    /**
     * 📌 HALAMAN QUIZ
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

        // 🔥 CEGAH DOUBLE SUBMIT (HARUS DI AWAL)
        $alreadyDone = QuizResult::where('user_id', $user->user_id)
            ->where('quiz_id', $quiz_id)
            ->exists();

        if ($alreadyDone) {
            return back()->with('error', 'Kamu sudah mengerjakan quiz ini.');
        }

        $score = 0;
        $correct = 0;

        foreach ($quiz->questions as $question) {

            // ambil jawaban user dari form
            $answerId = $request->input('question_' . $question->question_id);

            if (!$answerId) continue;

            // validasi jawaban harus sesuai question
            $option = AnswerOption::where('option_id', $answerId)
                ->where('question_id', $question->question_id)
                ->first();

            if ($option && $option->is_correct) {
                $score += $question->points;
                $correct++;
            }
        }

        // simpan hasil quiz
        QuizResult::create([
            'user_id' => $user->user_id,
            'quiz_id' => $quiz_id,
            'score' => $score,
            'total_correct' => $correct,
            'completed_at' => now(),
        ]);

        // cek lulus / tidak
        $passed = $score >= $quiz->passing_score;

        return redirect()
            ->route('quizzes.result', $quiz_id)
            ->with('passed', $passed)
            ->with('score', $score);
    }
}