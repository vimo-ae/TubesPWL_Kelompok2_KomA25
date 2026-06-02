<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
public function show($id) 
{
    $user = auth()->user();

    // 1. Cek status banned (Dari branch 4c9ed2bc...)
    if ($user->status === 'banned') {
        if ($user->banned_until && now()->lessThan($user->banned_until)) {
            $waktuSelesai = \Carbon\Carbon::parse($user->banned_until)->format('d M Y H:i');
            $alasan = $user->ban_reason ?? 'Melanggar aturan komunitas.';
            
            $pesanError = "<strong>Akses Ditolak!</strong> Akun kamu sedang diblokir sementara karena: <em>{$alasan}</em> <br> Blokir akan otomatis terbuka pada: <strong>{$waktuSelesai} WIB</strong>.";
            return redirect()->route('dashboard')->with('error', $pesanError);
        } else {
            $user->status = 'active';
            $user->banned_until = null;
            $user->save();
        }
    }

    // 2. Ambil data Lesson & Course (Gabungan yang paling rapi)
    $lesson = Lesson::findOrFail($id); 
    $course = $lesson->course; // Dibutuhkan jika view butuh data course-nya

    // 3. Cek apakah lesson sudah selesai (Dari branch HEAD)
    $profileId = $user->profile->profile_id ?? null;

    $completed = \App\Models\Progress::where('profile_id', $profileId)
        ->where('lesson_id', $lesson->lesson_id)
        ->where('is_completed', true)
        ->exists();

    // 4. Return view dengan membawa semua variabel yang dibutuhkan (Gabungan)
    return view('lessons.show', compact('lesson', 'course', 'completed'));
}
}