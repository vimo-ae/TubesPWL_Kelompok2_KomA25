<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function instructors()
    {
        $instructors = User::where('role', 'instructor')->get();

        $approvedInstructors = User::where('role', 'instructor')
                                ->where('status_instructor', 'approved')
                                ->get();

        $rejectedInstructors = User::where('role', 'instructor')
                                ->where('status_instructor', 'rejected')
                                ->get();

        return view('admin.instructors', compact('instructors', 'approvedInstructors', 'rejectedInstructors'));
    }

    public function courses()
    {
        $pendingCourses = Course::with('instructor')->where('status', 'pending')->get();
        $publishedCourses = Course::with('instructor')->where('status', 'published')->get();

        return view('admin.courses', compact('pendingCourses', 'publishedCourses'));
    }

    public function approve(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->status_instructor = 'approved';
        $user->save();

        return redirect()->back();
    }

    public function reject(Request $request, int $user_id)
    {
        $request->validate(['reason' => 'required|string|max:255']);
    
        $user = User::findOrFail($user_id);
        $user->status_instructor = 'rejected';
        $user->rejection_reason = $request->reason;
        $user->save();

        return redirect()->back()->with('success', 'Instruktur berhasil ditolak.');
    }

    public function approveCourse(int $course_id)
    {
        $course = Course::findOrFail($course_id);
        $course->status = 'published';
        $course->save();

        return redirect()->back();
    }

    public function rejectCourse(Request $request, int $course_id)
    {
        $request->validate(['reason' => 'required|string|max:255']);
    
        $course = Course::findOrFail($course_id);
        $course->status = 'draft';
        $course->rejection_reason = $request->reason;
        $course->save();

        return redirect()->back()->with('success', 'Course berhasil ditolak.');
    }

    public function showCourse(int $course_id)
    {
        $course = Course::with(['instructor', 'lessons'])->findOrFail($course_id);
        
        return view('admin.courses-show', compact('course'));
    }
}