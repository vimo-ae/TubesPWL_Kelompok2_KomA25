<?php

namespace App\Http\Controllers;

use App\Models\Lesson;


class LessonController extends Controller
{
    public function show($id)
{
    $lesson = Lesson::findOrFail($id);
    $course = $lesson->course;

    if (!auth()->user()->courses->contains('course_id', $course->course_id)) {
        abort(403);
    }

    $completed = auth()->user()
    ->lessons()
    ->where('lesson_user.lesson_id', $lesson->lesson_id)
    ->whereNotNull('lesson_user.completed_at')
    ->exists();

    return view('lessons.show', compact('lesson', 'completed'));
}
}