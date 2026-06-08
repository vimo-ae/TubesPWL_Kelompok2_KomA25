<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id) 
    {
        $user = auth()->user();

        if ($user && $user->status === 'banned') {
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

        $lesson = Lesson::findOrFail($id); 
        $course = $lesson->course; 

        if (!$lesson->is_published) {
            $isOwner = $user && $user->role === 'instructor' && $course->user_id === $user->user_id;
            if (!$isOwner) {
                abort(404);
            }
        }

        $profileId = $user->profile->profile_id ?? null;

        $completed = \App\Models\Progress::where('profile_id', $profileId)
            ->where('lesson_id', $lesson->lesson_id)
            ->where('is_completed', true)
            ->exists();

        return view('lessons.show', compact('lesson', 'course', 'completed'));
    }
}