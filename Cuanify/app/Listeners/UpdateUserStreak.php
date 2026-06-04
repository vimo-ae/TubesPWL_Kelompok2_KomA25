<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Carbon;

class UpdateUserStreak
{
    public function handle(Login $event)
    {
        $user = $event->user;
        $profile = $user->profile;
        $lastLogin = $user->last_login ? Carbon::parse($user->last_login) : null;
        $today = Carbon::today();

        if ($lastLogin && $lastLogin->isToday()) {
            return;
        }

        // 2. Logic Streak
        if ($lastLogin && $lastLogin->isYesterday()) {
            $profile->streak_days += 1;
        } else {
            $profile->streak_days = 1;
        }

        // 3. Update data
        $profile->save();
        $user->last_login = now();
        $user->save();
    }
}