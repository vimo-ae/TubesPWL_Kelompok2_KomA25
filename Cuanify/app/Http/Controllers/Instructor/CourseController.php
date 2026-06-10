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
        $courses = Course::where('user_id', Auth::id())->get();

        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('instructor.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'difficulty_level' => 'required',
        ]);

        Course::create([
            'user_id' => Auth::id(),
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
        $course = Course::where('user_id', Auth::id())->findOrFail($id);

        return view('instructor.courses.show', compact('course'));
    }

    public function submitVerification($courseId)
    {
        $course = Course::where('user_id', Auth::id())->findOrFail($courseId);

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
        $course = Course::where('user_id', Auth::id())->findOrFail($id);
        $categories = Category::all();

        return view('instructor.courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::where('user_id', Auth::id())->findOrFail($id);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'difficulty_level' => $request->difficulty_level,
            'estimated_duration' => $request->estimated_duration,
        ]);

        return redirect()
            ->route('instructor.courses.show', $course->course_id ?? $course->id)
            ->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::where('user_id', Auth::id())->findOrFail($id);
        $course->delete();

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course berhasil dihapus.');
    }
}