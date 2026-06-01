<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
        public function index()
    {
        $user = Auth::user();

        $profile = $user->profile;

        $progress = Progress::with('lesson')
            ->where('profile_id', error)
            ->where('is_completed', true)
            ->latest('completed_at')
            ->get();

        return view('profile.index', compact(
            'profile',
            'progress'
        ));
    }
}
