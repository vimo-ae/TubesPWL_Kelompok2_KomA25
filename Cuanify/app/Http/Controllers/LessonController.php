<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        $course->load('lessons');

        return view('lessons.index', compact('course'));
    }

    public function show(Lesson $lesson)
    {
        $course = $lesson->course;

        if (!auth()->user()->courses->contains('course_id', $course->course_id)) {
            abort(403);
        }

        return view('lessons.show', compact('lesson'));
    }
}