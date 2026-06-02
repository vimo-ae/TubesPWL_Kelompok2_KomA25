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

    public function dashboard()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalInstructors = User::where('role', 'instructor')->count();
        $pendingInstructors = User::where('role', 'instructor')->where('status_instructor', 'pending')->count();
        $totalCourses = Course::count();

        return view('admin.dashboard', compact(
            'totalStudents', 
            'totalInstructors', 
            'pendingInstructors', 
            'totalCourses'
        ));
    }

    public function students()
    {
        $users = User::where('role', 'student')->latest()->get();
        $title = 'Daftar Student';
        
        return view('admin.users', compact('users', 'title'));
    }

    public function allInstructors()
    {
        $users = User::where('role', 'instructor')->latest()->get();
        $title = 'Daftar Seluruh Instruktur';
        
        return view('admin.users', compact('users', 'title'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-detail', compact('user'));
    }

    public function updateUserStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive,banned',
            'ban_duration' => 'nullable|integer', 
            'ban_reason' => 'nullable|string'
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;

        if ($request->status === 'banned') {

            $user->ban_reason = $request->ban_reason;
    
            if ($request->ban_duration == 9999) {
                $user->banned_until = now()->addYears(100);
            } else {
                $user->banned_until = now()->addDays((int) $request->ban_duration);
            }
        } else {

            $user->banned_until = null;
            $user->ban_reason = null;
        }

        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diperbarui!');
    }
}