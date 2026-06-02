<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CourseController extends Controller
{
    public function index(Request $request)
{
    $categories = Category::all();

    $courses = Course::query();

    if ($request->category) {
        $courses->where('category_id', $request->category);
    }

    $courses = $courses->get();

    return view('courses.index', compact('courses', 'categories'));
}

    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);

        return view('courses.show', compact('course'));
    }
}