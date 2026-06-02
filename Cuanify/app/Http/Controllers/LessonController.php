<?php

namespace App\Http\Controllers;

use App\Models\Lesson;


class LessonController extends Controller
{
    public function show($id) 
{
    $user = auth()->user();

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
}
}