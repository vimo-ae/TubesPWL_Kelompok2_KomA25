<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Progress;
use App\Models\Lesson;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Logika Redirect Admin
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $profile = $user->profile;

        // Data Level & XP
        $xp = $profile->xp_points ?? 0;
        $level = $profile->level ?? 1;
        $xpPercentage = ($xp % 100); 

        // Data Progress Belajar
        $completedLessons = Progress::where('profile_id', $profile->profile_id ?? null)
                                    ->where('is_completed', true)->count();
        $totalLessons = Lesson::count();
        $progressPercentage = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;

        // Pencapaian Terbaru
        $recentAchievements = Progress::where('profile_id', $profile->profile_id ?? null)
                                        ->where('is_completed', true)
                                        ->latest('completed_at')
                                        ->take(5)
                                        ->get();

        $recommendedCourses = Category::has('courses') // Hanya ambil kategori yang punya kursus
            ->with(['courses' => function($query) {
                $query->where('status', 'published')->limit(1); // Ambil 1 saja yang published
            }])
            ->get();

        return view('dashboard', compact(
            'profile', 'level', 'xp', 'xpPercentage', 
            'completedLessons', 'totalLessons', 'progressPercentage', 'recentAchievements', 
            'recommendedCourses'
        ));
    }
}