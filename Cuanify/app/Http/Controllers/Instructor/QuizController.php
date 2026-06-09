<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\AnswerOption;

class QuizController extends Controller
{
    /**
     * HALAMAN CREATE / EDIT (UPSERT)
     */
    public function upsert(Lesson $lesson)
    {
        $quiz = Quiz::where('lesson_id', $lesson->lesson_id)
            ->with('questions.options')
            ->first();

        return view('instructor.quizzes.upsert', compact('lesson', 'quiz'));
    }

    /**
     * SIMPAN / REBUILD QUIZ
     */
    public function storeOrUpdate(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        /**
         * HAPUS QUIZ LAMA (REBUILD SYSTEM)
         */
        $oldQuiz = Quiz::where('lesson_id', $lesson->lesson_id)->first();

        if ($oldQuiz) {
            foreach ($oldQuiz->questions as $q) {
                $q->options()->delete();
            }
            $oldQuiz->questions()->delete();
            $oldQuiz->delete();
        }

        /**
         * CREATE QUIZ BARU
         */
        $quiz = Quiz::create([
            'lesson_id' => $lesson->lesson_id,
            'title' => $request->title,
            'passing_score' => $request->passing_score ?? 70,
            'time_limit' => $request->time_limit,
        ]);

        /**
         * CREATE QUESTIONS + OPTIONS
         */
        if ($request->questions) {

            foreach ($request->questions as $qIndex => $qData) {

                $question = Question::create([
                    'quiz_id' => $quiz->quiz_id,
                    'question_text' => $qData['question_text'],
                    'question_type' => $qData['question_type'],
                    'points' => 1,
                ]);

                // TRUE / FALSE
                if ($qData['question_type'] === 'true_false') {

                    AnswerOption::create([
                        'question_id' => $question->question_id,
                        'option_text' => 'True',
                        'is_correct' => ($qData['correct_answer'] ?? null) === 'True',
                    ]);

                    AnswerOption::create([
                        'question_id' => $question->question_id,
                        'option_text' => 'False',
                        'is_correct' => ($qData['correct_answer'] ?? null) === 'False',
                    ]);
                }

                // MULTIPLE CHOICE
                else {

                    if (!isset($qData['options'])) continue;

                    foreach ($qData['options'] as $oIndex => $optionData) {

                        $text = is_array($optionData)
                            ? ($optionData['text'] ?? '')
                            : $optionData;

                        if ($text === '') continue;

                        AnswerOption::create([
                            'question_id' => $question->question_id,
                            'option_text' => $text,
                            'is_correct' => isset($qData['correct_answer'])
                                && $qData['correct_answer'] == $oIndex,
                        ]);
                    }
                }
            }
        }

        return redirect()
    ->route('instructor.lessons.edit', [
        'course' => $lesson->course_id,
        'lesson' => $lesson->lesson_id
    ])
    ->with('success', 'Quiz berhasil disimpan');
    }
}