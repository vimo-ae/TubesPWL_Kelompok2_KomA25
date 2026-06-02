<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
public function show($id) 
    {
        $user = auth()->user();

        // 1. Cek status banned
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

        // 2. AMBIL DATA LESSON (Ini yang tadi hilang)
        // Menghindari error jika ID tidak ditemukan di database
        $lesson = Lesson::findOrFail($id); 

        // 3. RETURN VIEW HALAMAN LESSON (Ini yang bikin halaman tidak putih lagi)
        // Silakan sesuaikan 'lessons.show' dengan nama file blade Anda (misal: resources/views/lessons/show.blade.php)
        return view('lessons.show', compact('lesson'));
    }
}