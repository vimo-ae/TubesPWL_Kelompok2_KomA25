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

    return view('lessons.show', compact('lesson'));
    }
}