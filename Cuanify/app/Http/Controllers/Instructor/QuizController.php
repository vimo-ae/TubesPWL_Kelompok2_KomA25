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
    public function upsert(Lesson $lesson)
    {
        $quiz = Quiz::where('lesson_id', $lesson->lesson_id)
            ->with('questions.options')
            ->first();

        return view('instructor.quizzes.upsert', compact('lesson', 'quiz'));
    }

    public function storeOrUpdate(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        /**
         * 1. UPSERT QUIZ (Gunakan updateOrCreate agar ID tidak berubah,
         *    sehingga riwayat nilai siswa yang berelasi ke quiz_id tetap aman)
         */
        $quiz = Quiz::updateOrCreate(
            ['lesson_id' => $lesson->lesson_id],
            [
                'title'         => $request->title,
                'passing_score' => $request->passing_score ?? 70,
                'time_limit'    => $request->time_limit,
            ]
        );

        if ($request->questions) {
            $keptQuestionIds = [];

            foreach ($request->questions as $qIndex => $qData) {

                /**
                 * 2. UPSERT QUESTION (updateOrCreate berdasarkan question_id
                 *    yang dikirim dari hidden input form, bukan delete-recreate)
                 */
                $question = Question::updateOrCreate(
                    [
                        'quiz_id'     => $quiz->quiz_id,
                        'question_id' => $qData['question_id'] ?? null,
                    ],
                    [
                        'question_text' => $qData['question_text'],
                        'question_type' => $qData['question_type'],
                        'points'        => 1,
                    ]
                );

                $keptQuestionIds[] = $question->question_id;

                if ($qData['question_type'] === 'true_false') {
                    /**
                     * 3a. UPSERT OPSI TRUE/FALSE
                     *     Selalu dua opsi tetap, cukup update is_correct-nya saja
                     */
                    AnswerOption::updateOrCreate(
                        ['question_id' => $question->question_id, 'option_text' => 'True'],
                        ['is_correct'  => ($qData['correct_answer'] ?? null) === 'True']
                    );

                    AnswerOption::updateOrCreate(
                        ['question_id' => $question->question_id, 'option_text' => 'False'],
                        ['is_correct'  => ($qData['correct_answer'] ?? null) === 'False']
                    );

                } else {
                    if (!isset($qData['options'])) continue;

                    $keptOptionIds = [];

                    /**
                     * 3b. UPSERT OPSI MULTIPLE CHOICE
                     *     Gunakan option_id dari hidden input untuk sinkronisasi
                     */
                    foreach ($qData['options'] as $oIndex => $optionData) {
                        $text     = is_array($optionData) ? ($optionData['text']      ?? '') : $optionData;
                        $optionId = is_array($optionData) ? ($optionData['option_id'] ?? null) : null;

                        if ($text === '') continue;

                        $option = AnswerOption::updateOrCreate(
                            [
                                'question_id' => $question->question_id,
                                'option_id'   => $optionId,
                            ],
                            [
                                'option_text' => $text,
                                'is_correct'  => isset($qData['correct_answer']) && $qData['correct_answer'] == $oIndex,
                            ]
                        );

                        $keptOptionIds[] = $option->option_id;
                    }

                    // Hapus opsi yang sudah dihilangkan dari form
                    AnswerOption::where('question_id', $question->question_id)
                        ->whereNotIn('option_id', $keptOptionIds)
                        ->delete();
                }
            }

            /**
             * 4. HAPUS PERTANYAAN yang sudah dihapus dari form
             *    (beserta semua opsinya, cascade manual)
             */
            $questionsToDelete = Question::where('quiz_id', $quiz->quiz_id)
                ->whereNotIn('question_id', $keptQuestionIds)
                ->get();

            foreach ($questionsToDelete as $qToDelete) {
                $qToDelete->options()->delete();
                $qToDelete->delete();
            }
        }

        return redirect()
            ->route('instructor.lessons.edit', [
                'course' => $lesson->course_id,
                'lesson' => $lesson->lesson_id,
            ])
            ->with('success', 'Quiz berhasil diperbarui tanpa merusak riwayat nilai.');
    }
}