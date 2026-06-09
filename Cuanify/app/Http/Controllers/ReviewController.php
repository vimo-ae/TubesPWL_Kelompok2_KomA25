<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $course_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        $user = Auth::user();
        
        $enrollment = $user->courses()
                           ->withPivot('status')
                           ->where('courses.course_id', $course_id)
                           ->first();

        if (!$enrollment || $enrollment->pivot->status !== 'completed') {
            return back()->with('error', 'Kamu harus menyelesaikan kursus ini 100%!');
        }

        \App\Models\Review::updateOrCreate(
    [
        'user_id'   => $user->user_id, 
        'course_id' => $course_id
    ],
    [
        'rating'    => $request->rating,
        'comment'   => $request->comment
    ]
);

        return back()->with('success', 'Ulasan berhasil disimpan!');
    }
}