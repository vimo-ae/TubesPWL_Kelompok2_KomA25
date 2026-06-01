<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalInstructors = User::where('role', 'instructor')->count();
        $totalCourses = 0; 
        $pendingInstructors = User::where('role', 'instructor')
                                  ->where('status_instructor', 'pending')
                                  ->count();

        $instructors = User::where('role', 'instructor')->get();
        $approvedInstructors = User::where('role', 'instructor')
                                    ->where('status_instructor', 'approved')
                                    ->get();
        $rejectedInstructors = User::where('role', 'instructor')
                                    ->where('status_instructor', 'rejected')
                                    ->get();

        return view('admin.dashboard', compact(
            'totalStudents', 'totalInstructors', 'totalCourses', 'pendingInstructors',
            'instructors', 'approvedInstructors', 'rejectedInstructors'
        ));
    }

    public function manageUsers()
    {
        $students = User::where('role', 'student')->get();
        $allApprovedInstructors = User::where('role', 'instructor')
                                      ->where('status_instructor', 'approved')
                                      ->get();

        return view('admin.users', compact('students', 'allApprovedInstructors'));
    }

    public function approve(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->status_instructor = 'approved';
        $user->save();
        return redirect()->back();
    }

    public function reject(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->status_instructor = 'rejected';
        $user->save();
        return redirect()->back();
    }
}