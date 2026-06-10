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
         * 1. UPSERT QUIZ — updateOrCreate agar quiz_id tidak berubah,
         *    sehingga riwayat nilai siswa yang berelasi tetap aman.
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
            // dd($qData['question_id'] ?? 'KOSONG'); 
                /**
                 * 2. UPSERT QUESTION — gunakan question_id dari hidden input.
                 *    Soal baru (tanpa question_id) akan di-insert fresh.
                 */
                $questionId = $qData['question_id'] ?? null;

                if ($questionId) {
                    // Soal existing — update
                    $question = Question::where('question_id', $questionId)
                        ->where('quiz_id', $quiz->quiz_id)
                        ->first();

                    if ($question) {
                        $question->update([
                            'question_text' => $qData['question_text'],
                            'question_type' => $qData['question_type'],
                        ]);
                    } else {
                        // Fallback jika ID tidak ditemukan (edge case)
                        $question = Question::create([
                            'quiz_id'       => $quiz->quiz_id,
                            'question_text' => $qData['question_text'],
                            'question_type' => $qData['question_type'],
                            'points'        => 1,
                        ]);
                        // dd($question->question_id, $question->toArray()); // tambah ini
                    }
                } else {
                    // Soal baru — insert
                    $question = Question::create([
                        'quiz_id'       => $quiz->quiz_id,
                        'question_text' => $qData['question_text'],
                        'question_type' => $qData['question_type'],
                        'points'        => 1,
                    ]);
                }

                $keptQuestionIds[] = $question->question_id;

                if ($qData['question_type'] === 'true_false') {
                    /**
                     * 3a. TRUE/FALSE — cari by (question_id + option_text) bukan pakai
                     *     updateOrCreate dengan option_id supaya tidak duplikat.
                     */
                    $trueOption = AnswerOption::firstOrCreate(
                        ['question_id' => $question->question_id, 'option_text' => 'True']
                    );
                    $trueOption->update([
                        'is_correct' => ($qData['correct_answer'] ?? null) === 'True',
                    ]);

                    $falseOption = AnswerOption::firstOrCreate(
                        ['question_id' => $question->question_id, 'option_text' => 'False']
                    );
                    $falseOption->update([
                        'is_correct' => ($qData['correct_answer'] ?? null) === 'False',
                    ]);

                } else {
                    if (!isset($qData['options'])) continue;

                    $keptOptionIds = [];

                    foreach ($qData['options'] as $oIndex => $optionData) {
                        $text     = is_array($optionData) ? ($optionData['text']      ?? '') : $optionData;
                        $optionId = is_array($optionData) ? ($optionData['option_id'] ?? null) : null;

                        // dd(compact('text', 'optionId', 'oIndex', 'qData')); // tambah ini

                        if (is_null($text) || trim($text) === '') {
                                continue;
                            }

                        /**
                         * 3b. MULTIPLE CHOICE — pisahkan antara existing (update by ID)
                         *     dan baru (insert fresh). Jangan pakai updateOrCreate(option_id: null)
                         *     karena WHERE option_id IS NULL tidak pernah match row manapun.
                         */
                        if ($optionId) {
                            // Opsi existing — update
                            $option = AnswerOption::where('option_id', $optionId)
                                ->where('question_id', $question->question_id)
                                ->first();

                            if ($option) {
                                $option->update([
                                    'option_text' => $text,
                                    'is_correct'  => isset($qData['correct_answer']) && $qData['correct_answer'] == $oIndex,
                                ]);
                            } else {
                                $option = AnswerOption::create([
                                    'question_id' => $question->question_id,
                                    'option_text' => $text,
                                    'is_correct'  => isset($qData['correct_answer']) && $qData['correct_answer'] == $oIndex,
                                ]);
                            }
                            
                        } else {
                            // Opsi baru — insert fresh
                            $option = AnswerOption::create([
                                'question_id' => $question->question_id,
                                'option_text' => $text,
                                'is_correct'  => isset($qData['correct_answer']) && $qData['correct_answer'] == $oIndex,
                            ]);
                        }

                        $keptOptionIds[] = $option->option_id;
                    }

                    // Hapus opsi yang sudah dihilangkan dari form
                    AnswerOption::where('question_id', $question->question_id)
                        ->whereNotIn('option_id', $keptOptionIds)
                        ->delete();
                }
            }

            /**
             * 4. Hapus pertanyaan yang sudah dihapus dari form (cascade manual)
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