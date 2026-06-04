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
    $lesson = \App\Models\Lesson::findOrFail($lessonId);
    $course = $lesson->course;
    
    $profileId = $profile->profile_id;

    $existingProgress = \App\Models\Progress::where('profile_id', $profileId)
                                ->where('lesson_id', $lessonId)
                                ->first();

    if (!$existingProgress || !$existingProgress->is_completed) {

        \App\Models\Progress::updateOrCreate(
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

        
        $totalMateri = \App\Models\Lesson::where('course_id', $course->course_id)->count();
        $enrolledLessonIds = \App\Models\Lesson::where('course_id', $course->course_id)->pluck('lesson_id');
        $totalKuis = \App\Models\Quiz::whereIn('lesson_id', $enrolledLessonIds)->count();

        $materiSelesai = \App\Models\Progress::where('profile_id', $profileId)
            ->where('is_completed', true)
            ->whereIn('lesson_id', $enrolledLessonIds)
            ->count();

        $kuisSelesai = \App\Models\QuizResult::where('user_id', $user->user_id)
            ->whereIn('quiz_id', function($query) use ($enrolledLessonIds) {
                $query->select('quiz_id')->from('quizzes')->whereIn('lesson_id', $enrolledLessonIds);
            })
            ->count();

        $totalPenyebut = $totalMateri + $totalKuis;
        $totalPembilang = $materiSelesai + $kuisSelesai;
        
        $persentaseCourse = $totalPenyebut > 0 ? round(($totalPembilang / $totalPenyebut) * 100) : 0;
        $statusBaru = $persentaseCourse >= 100 ? 'completed' : 'active';

        $user->courses()->updateExistingPivot($course->course_id, [
            'completion_percentage' => $persentaseCourse,
            'status' => $statusBaru
        ]);

        if ($naikLevel) {
            return back()->with('success', '🎉 Selamat! Kamu mendapatkan ' . $tambahXp . ' XP dan NAIK KE LEVEL ' . $levelBaru . '!');
        }

        return back()->with('success', 'Lesson ditandai selesai! Kamu mendapatkan ' . $tambahXp . ' XP.');
    }

    return back()->with('info', 'Kamu sudah menyelesaikan materi ini sebelumnya.');
}
}