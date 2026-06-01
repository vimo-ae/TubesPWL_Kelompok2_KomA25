<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll($course_id)
    {
        Enrollment::firstOrCreate([
            'user_id' => Auth::id(),
            'course_id' => $course_id,
        ]);

        return redirect()->back()
            ->with('success', 'Berhasil enroll!');
    }
}