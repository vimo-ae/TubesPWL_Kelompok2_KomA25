<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $instructors = User::where('role', 'instructor')->get();

        $approvedInstructors = User::where('role', 'instructor')
                                ->where('status', 'approved')
                                ->get();

        return view('admin.dashboard', compact('instructors', 'approvedInstructors'));
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
