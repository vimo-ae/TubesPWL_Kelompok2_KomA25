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
    public function create(Lesson $lesson)
    {
        return view('instructor.quizzes.create', compact('lesson'));
    }

    public function store(Request $request, Lesson $lesson)
    {
        $quiz = Quiz::create([
            'lesson_id' => $lesson->lesson_id,
            'title' => $request->title,
            'passing_score' => $request->passing_score,
            'time_limit' => $request->time_limit,
        ]);

        foreach ($request->questions as $questionData) {

            $question = Question::create([
                'quiz_id' => $quiz->quiz_id,
                'question_text' => $questionData['question_text'],
                'question_type' => $questionData['question_type'],
                'points' => 1,
            ]);

            // TRUE FALSE
            if ($questionData['question_type'] == 'true_false') {

                AnswerOption::create([
                    'question_id' => $question->question_id,
                    'option_text' => 'True',
                    'is_correct' => $questionData['correct_answer'] == 'True',
                ]);

                AnswerOption::create([
                    'question_id' => $question->question_id,
                    'option_text' => 'False',
                    'is_correct' => $questionData['correct_answer'] == 'False',
                ]);
            }

            // MULTIPLE CHOICE
            else {

                foreach ($questionData['options'] as $index => $optionText) {

                    AnswerOption::create([
                        'question_id' => $question->question_id,
                        'option_text' => $optionText,
                        'is_correct' => $index == $questionData['correct_answer'],
                    ]);
                }
            }
        }

        return redirect()->route(
            'instructor.lessons.edit',
            [
                'course' => $lesson->course_id,
                'lesson' => $lesson->lesson_id,
            ]
        )->with('success', 'Quiz berhasil dibuat');
    }
}