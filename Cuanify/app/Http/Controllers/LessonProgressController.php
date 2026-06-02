<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Progress;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

class LessonProgressController extends Controller
{
   

public function complete($lessonId)
{
    $user = Auth::user();

    $lesson = Lesson::findOrFail($lessonId);
    
    $profileId = $user->profile->profile_id;

    Progress::updateOrCreate(
                [
                    'profile_id' => $profileId,
                    'lesson_id'  => $lessonId
                ],
                [
                    'is_completed' => true,
                    'completed_at' => now(),
                    'xp_earned'    => $lesson->xp_reward ?? 0
                ]
            );
    return back()->with('success', 'Lesson ditandai selesai! Kamu mendapatkan ' . ($lesson->xp_reward ?? 0) . ' XP.');
}
}
