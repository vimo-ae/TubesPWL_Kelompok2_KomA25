<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->enrolledCourses;

        return view('courses.my-courses', compact('courses'));
    }
}