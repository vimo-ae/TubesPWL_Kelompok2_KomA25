<?php

namespace App\Http\Controllers\Instructor;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', Auth::id())->get();

        return view('instructor.courses.index', compact('courses'));
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

        return redirect()->route('instructor.courses.index')
                         ->with('success', 'Course berhasil dibuat.');
    }

    public function show($id)
    {
        $course = Course::where('user_id', Auth::id())->findOrFail($id);

        return view('instructor.courses.show', compact('course'));
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

        $course->update($request->only([
            'title', 'description', 'category_id', 'difficulty_level', 'estimated_duration'
        ]));

        return redirect()->route('instructor.courses.show', $id)
                         ->with('success', 'Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::where('user_id', Auth::id())->findOrFail($id);
        $course->delete();

        return redirect()->route('instructor.courses.index')
                         ->with('success', 'Course berhasil dihapus.');
    }
}