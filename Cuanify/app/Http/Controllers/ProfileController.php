<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Progress;
use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $profile = $user->profile()->firstOrCreate(
            ['user_id' => $user->user_id],
            ['full_name' => $user->username]
        );
      
        if ($user->role === 'admin') {

        $totalUsers = \App\Models\User::count();
        $totalInstructors = \App\Models\User::where('role', 'instructor')->count();
        $totalCourses = \App\Models\Course::count(); 

        $pendingApprovals = \App\Models\Course::where('status', 'pending')->count();

        $recentLogs = []; 

        return view('admin.profile', [
            'user' => $user,
            'profile' => $user->profile,
            'totalUsers' => $totalUsers,
            'totalInstructors' => $totalInstructors,
            'totalCourses' => $totalCourses,
            'pendingApprovals' => $pendingApprovals,
            'recentLogs' => $recentLogs
        ]);
    }if ($user->role === 'admin') {
        return view('admin.profile', [
            'user' => $user,
            'profile' => $user->profile 
        ]);
    }

        if ($user->role === 'instructor') {
            $createdCourses = $user->createdCourses()->withCount('enrollments')->get();

            return view('instructor.profile', compact('user', 'profile', 'createdCourses'));
        }


        $enrolledCourseIds = $user->courses()->pluck('courses.course_id');

        $totalMateri = Lesson::whereIn('course_id', $enrolledCourseIds)->count();
        $enrolledLessonIds = Lesson::whereIn('course_id', $enrolledCourseIds)->pluck('lesson_id');
        $totalKuis = Quiz::whereIn('lesson_id', $enrolledLessonIds)->count();

        $materiSelesai = Progress::where('profile_id', $profile->profile_id)
            ->where('is_completed', true)
            ->count();

        $kuisSelesai = QuizResult::where('user_id', $user->user_id)
            ->whereIn('quiz_id', function($query) use ($enrolledLessonIds) {
                $query->select('quiz_id')->from('quizzes')->whereIn('lesson_id', $enrolledLessonIds);
            })
            ->count();
        $totalPenyebut = $totalMateri + $totalKuis;
        $totalPembilang = $materiSelesai + $kuisSelesai;
        
        $persentaseTotal = $totalPenyebut > 0 ? round(($totalPembilang / $totalPenyebut) * 100) : 0;

        $enrolledCoursesRaw = $user->courses; 

        foreach ($enrolledCoursesRaw as $course) {
            $totalMateriDiCourse = Lesson::where('course_id', $course->course_id)->count();

            $materiSelesaiDiCourse = Progress::where('profile_id', $profile->profile_id)
                ->where('is_completed', true)
                ->whereIn('lesson_id', function($query) use ($course) {
                    $query->select('lesson_id')->from('lessons')->where('course_id', $course->course_id);
                })
                ->count();

            $persentaseCourse = $totalMateriDiCourse > 0 
                ? round(($materiSelesaiDiCourse / $totalMateriDiCourse) * 100) 
                : 0;

            $statusBaru = $persentaseCourse >= 100 ? 'completed' : 'active';

            $user->courses()->updateExistingPivot($course->course_id, [
                'completion_percentage' => $persentaseCourse,
                'status' => $statusBaru
            ]);
        }

        $progress = Progress::with('lesson')
            ->where('profile_id', $profile->profile_id)
            ->where('is_completed', true)
            ->latest('completed_at')
            ->paginate(5);

        $enrolledCourses = $user->courses()->withPivot('status', 'completion_percentage')->get();

        return view('profile.index', compact(
            'user',
            'profile',
            'progress',
            'enrolledCourses',
            'totalMateri',
            'totalKuis',
            'materiSelesai',
            'kuisSelesai',
            'persentaseTotal'
        ));    
    }

    public function edit()
    {
        $user    = Auth::user();
        $profile = $user->profile()->firstOrCreate(
            ['user_id' => $user->user_id],
            ['full_name' => $user->username]
        );

        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user    = Auth::user();
        $profile = $user->profile;

        $request->validate([
            'full_name'     => 'required|string|max:255',
            'bio'           => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile->full_name = $request->full_name;
        $profile->bio       = $request->bio;

        if ($request->hasFile('profile_photo')) {

            if ($profile->profile_photo && Storage::disk('public')->exists($profile->profile_photo)) {
                Storage::disk('public')->delete($profile->profile_photo);
            }

            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $profile->profile_photo = $path;
        }

        $profile->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}