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

    $courses = $query->latest()->get();

    return view('courses.index', compact('courses', 'categories'));
}

    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        $user = auth()->user();
    
    
    $userLevel = $user->profile->level ?? 1;
    $requiredLevel = $course->getRequiredLevel();

    // Satpam: Cek akses
    if ($userLevel < $requiredLevel) {
        return back()->with('error', 'Ups! Kamu butuh minimal **Level ' . $requiredLevel . '** untuk mengakses kursus ini.');
    }

    return view('courses.show', compact('course'));
}
}