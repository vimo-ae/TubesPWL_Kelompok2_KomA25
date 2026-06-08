<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index(Request $request)
{
    $categories = \App\Models\Category::all();

    $query = \App\Models\Course::where('status', 'published');

    if ($request->has('category')) {
        $query->where('category_id', $request->category);
    }

    $enrolledCourseIds = [];

    if (auth()->check() && auth()->user()->role === 'student') {
        $enrolledCourseIds = auth()->user()->courses()->pluck('courses.course_id')->toArray();
    }

    $courses = $query->latest()->get();

    return view('courses.index', compact('courses', 'categories', 'enrolledCourseIds'));
}

    public function show($id)
{
    $course = \App\Models\Course::with(['reviews.user', 'lessons'])->findOrFail($id);
    
    $user = auth()->user();
    
    if ($user && $user->role === 'student') {
        $userLevel = $user->profile->level ?? 1;
        $requiredLevel = $course->getRequiredLevel();

        if ($userLevel < $requiredLevel) {
            return back()->with('error', 'Ups! Kamu butuh minimal **Level ' . $requiredLevel . '** untuk mengakses kursus ini.');
        }
    }

    return view('courses.show', compact('course'));
}
}