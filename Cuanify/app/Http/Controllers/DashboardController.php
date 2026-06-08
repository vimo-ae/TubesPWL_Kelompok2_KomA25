<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Progress;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\Review;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'instructor') {
            $courseIds = $user->createdCourses()->pluck('course_id');
            
            $totalCourses = $courseIds->count();
            $totalStudents = Enrollment::whereIn('course_id', $courseIds)->count();
            $averageRating = Review::whereIn('course_id', $courseIds)->avg('rating') ?? 0;
            $recentCourses = $user->createdCourses()->latest()->take(4)->get();

            return view('dashboard-instructor', compact('totalCourses', 'totalStudents', 'averageRating', 'recentCourses'));
        }

        $profile = $user->profile;

        $xp = $profile->xp_points ?? 0;
        $level = $profile->level ?? 1;
        $xpPercentage = ($xp % 500) / 500 * 100; 

        $completedLessons = Progress::where('profile_id', $profile->profile_id ?? null)
                                    ->where('is_completed', true)->count();
        $totalLessons = Lesson::count();
        $progressPercentage = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;

        $recentAchievements = Progress::where('profile_id', $profile->profile_id ?? null)
                                    ->where('is_completed', true)
                                    ->latest('completed_at')
                                    ->take(5)
                                    ->get();

        $recommendedCourses = Category::has('courses')
            ->with(['courses' => function($query) {
                $query->limit(1); 
            }])
            ->get();

        $categories = \App\Models\Category::all();

        return view('dashboard', compact(
            'profile', 'level', 'xp', 'categories', 'xpPercentage', 
            'completedLessons', 'totalLessons', 'progressPercentage', 'recentAchievements',
            'recommendedCourses'
        ));
    }
}