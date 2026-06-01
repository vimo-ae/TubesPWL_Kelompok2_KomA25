<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();

        return view(
            'instructor.courses.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'difficulty_level' => 'required',
        ]);

        Course::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'difficulty_level' => $request->difficulty_level,
            'estimated_duration' => $request->estimated_duration,
            'status' => 'draft',
        ]);

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course berhasil dibuat.');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view(
            'instructor.courses.show',
            compact('course')
        );
    }

    public function createLesson($courseId)
    {
        $course = Course::findOrFail($courseId);

        return view(
            'instructor.lessons.create',
            compact('course')
        );
    }

    public function storeLesson(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Lesson::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'content' => $request->content,
            'xp_reward' => 10,
        ]);

        return redirect()->route(
            'instructor.courses.show',
            $courseId
        );
    }

    public function submitVerification($courseId)
    {
        $course = Course::findOrFail($courseId);

        if ($course->lessons()->count() < 3) {

            return back()->with(
                'error',
                'Minimal 3 lesson sebelum mengajukan verifikasi.'
            );
        }

        $course->update([
            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Course berhasil diajukan ke admin.'
        );
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $categories = Category::all();

        return view(
            'instructor.courses.edit',
            compact('course', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'difficulty_level' => $request->difficulty_level,
            'estimated_duration' => $request->estimated_duration,
        ]);

        return redirect()
            ->route('instructor.courses.show', $course->course_id)
            ->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course berhasil dihapus.');
    }

    public function editLesson($courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        return view('instructor.lessons.edit', compact('course', 'lesson'));
    }

    public function updateLesson(Request $request, $courseId, $lessonId)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $lesson = Lesson::findOrFail($lessonId);
        $lesson->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('instructor.courses.show', $courseId)
            ->with('success', 'Lesson berhasil diperbarui.');
    }

    public function destroyLesson($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->delete();

        return redirect()->route('instructor.courses.show', $courseId)
            ->with('success', 'Lesson berhasil dihapus.');
    }
}