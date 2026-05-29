<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function enroll($course_id)
    {
        Enrollment::create([
            'user_id' => auth()->user()->user_id,
            'course_id' => $course_id,
        ]);

        return redirect()->route('my.courses');
    }

    public function myCourses()
    {
        $enrollments = Enrollment::with('course.category', 'course.lessons')
            ->where('user_id', auth()->user()->user_id)
            ->get();

        return view('courses.my-courses', compact('enrollments'));
    }
}