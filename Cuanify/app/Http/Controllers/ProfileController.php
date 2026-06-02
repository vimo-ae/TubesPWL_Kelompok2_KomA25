<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Progress;
use App\Models\Quiz;
use App\Models\QuizResult;
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

        // 1. Ambil ID semua course yang di-enroll oleh user
        $enrolledCourseIds = $user->courses()->pluck('courses.course_id');

        // 2. HITUNG PENYEBUT (Total seluruh Materi & Kuis dari course yang diikuti)
        // Ambil model Lesson & Quiz melalui kecocokan course_id
        $totalMateri = Lesson::whereIn('course_id', $enrolledCourseIds)->count();
        
        //Ambil semua lesson_id dari course yang di-enroll (Jembatan untuk ke tabel quizzes)
        $enrolledLessonIds = Lesson::whereIn('course_id', $enrolledCourseIds)->pluck('lesson_id');
        
        // Sesuaikan nama model Quiz kamu jika berbeda (misal: App\Models\Quiz)
        $totalKuis = Quiz::whereIn('lesson_id', $enrolledLessonIds)->count();

        // 3. HITUNG PEMBILANG (Materi & Kuis yang sudah diselesaikan user)
        $materiSelesai = Progress::where('profile_id', $profile->profile_id)
            ->where('is_completed', true)
            ->count();

        $kuisSelesai = QuizResult::where('user_id', $user->user_id)
            ->whereIn('quiz_id', function($query) use ($enrolledLessonIds) {
                $query->select('quiz_id')->from('quizzes')->whereIn('lesson_id', $enrolledLessonIds);
            })
            ->count();

        // 4. HITUNG PERSENTASE TOTAL (Untuk lingkaran ungu)
        $totalPenyebut = $totalMateri + $totalKuis;
        $totalPembilang = $materiSelesai + $kuisSelesai;
        
        $persentaseTotal = $totalPenyebut > 0 ? round(($totalPembilang / $totalPenyebut) * 100) : 0;

        $enrolledCoursesRaw = $user->courses; // Ambil koleksi course lewat relation

        foreach ($enrolledCoursesRaw as $course) {
            // Hitung total materi di kelas ini
            $totalMateriDiCourse = Lesson::where('course_id', $course->course_id)->count();

            // Hitung materi yang sudah dicentang selesai oleh siswa di kelas ini
            $materiSelesaiDiCourse = Progress::where('profile_id', $profile->profile_id)
                ->where('is_completed', true)
                ->whereIn('lesson_id', function($query) use ($course) {
                    $query->select('lesson_id')->from('lessons')->where('course_id', $course->course_id);
                })
                ->count();

            // Hitung persentase kelasnya
            $persentaseCourse = $totalMateriDiCourse > 0 
                ? round(($materiSelesaiDiCourse / $totalMateriDiCourse) * 100) 
                : 0;

            $statusBaru = $persentaseCourse >= 100 ? 'completed' : 'active';

            // Update data pivot menggunakan Eloquent bawaan relation User
            $user->courses()->updateExistingPivot($course->course_id, [
                'completion_percentage' => $persentaseCourse,
                'status' => $statusBaru
            ]);
        }

        // Ambil progress lengkap untuk kebutuhan list di bawah (kode lamamu)
        $progress = Progress::with('lesson')
            ->where('profile_id', $profile->profile_id)
            ->where('is_completed', true)
            ->latest('completed_at')
            ->get();

        $enrolledCourses = $user->courses()->withPivot('status', 'completion_percentage')->get();

        return view('profile.index', compact(
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

    public function update(Request $request)
    {
        $user = Auth::user();

        $profile = $user->profile;

        $request->validate([
            'full_name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update basic data
        $profile->full_name = $request->full_name;
        $profile->bio = $request->bio;

        // handle foto
        if ($request->hasFile('profile_photo')) {

            // if ($profile->profile_photo) {
            //     Storage::disk('public')->delete($profile->profile_photo);
            // }

            $path = $request->file('profile_photo')
                ->store('profile_photos', 'public');

            $profile->profile_photo = $path;
        }

        $profile->save();

        return redirect()
            ->route('profile')
            ->with('success', 'Profil berhasil diperbarui');
    }
}