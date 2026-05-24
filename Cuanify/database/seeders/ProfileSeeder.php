<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
public function run(): void
{

DB::table('profiles')->insert([
[
'user_id' => 1,
'full_name' => 'Ryan Fredryck',
'profile_photo' => 'ryan_profil.jpg',
'bio' => 'Keren coy',
'level' => 12,
'xp_points' => 3450,
'streak_days' => 7
],
[
'user_id' => 3,
'full_name' => 'Vimo Simbolon',
'profile_photo' => 'vimo_profil.jpg',
'bio' => 'Cool parah',
'level' => 5,
'xp_points' => 1200,
'streak_days' => 2
],
[
'user_id' => 5,
'full_name' => 'Aliyah Briek',
'profile_photo' => 'aliyah_profil.png',
'bio' => 'Kece',
'level' => 8,
'xp_points' => 2100,
'streak_days' => 5
]
]);
}
}