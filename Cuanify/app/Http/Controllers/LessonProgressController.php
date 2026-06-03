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
        $profile = $user->profile; 
        $lesson = Lesson::findOrFail($lessonId);
        
        $profileId = $profile->profile_id;

        $existingProgress = Progress::where('profile_id', $profileId)
                                    ->where('lesson_id', $lessonId)
                                    ->first();

        if (!$existingProgress || !$existingProgress->is_completed) {

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

            $tambahXp = $lesson->xp_reward ?? 0;
            $profile->xp_points += $tambahXp;

            $levelBaru = floor($profile->xp_points / 500) + 1;

            $naikLevel = $levelBaru > $profile->level;
            
            $profile->level = $levelBaru;
            $profile->save();


            if ($naikLevel) {
                return back()->with('success', '🎉 Selamat! Kamu mendapatkan ' . $tambahXp . ' XP dan NAIK KE LEVEL ' . $levelBaru . '!');
            }

            return back()->with('success', 'Lesson ditandai selesai! Kamu mendapatkan ' . $tambahXp . ' XP.');
        }

        return back()->with('info', 'Kamu sudah menyelesaikan materi ini sebelumnya.');
    }
}