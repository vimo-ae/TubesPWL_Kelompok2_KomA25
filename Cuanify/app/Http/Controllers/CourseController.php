<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
    $courses = Course::with(['instructor', 'category'])->get();

    return view('courses.index', compact('courses'));
    }
}
