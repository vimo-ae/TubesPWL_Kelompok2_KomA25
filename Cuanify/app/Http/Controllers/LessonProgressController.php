<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

class LessonProgressController extends Controller
{
   

public function complete($lessonId)
{
    $user = Auth::user();

    $user->lessons()->syncWithoutDetaching([
        $lessonId => ['completed_at' => now()]
    ]);

    return back()->with('success', 'Lesson ditandai selesai');
}
}
