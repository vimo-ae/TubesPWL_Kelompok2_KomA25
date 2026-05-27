<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProgressSeeder extends Seeder
{
public function run(): void
{
DB::table('progress')->delete();

DB::table('progress')->insert([
[
'profile_id' => 1,
'lesson_id' => 1,
'is_completed' => true,
'completed_at' => Carbon::now(),
'xp_earned' => 100
],
[
'profile_id' => 2,
'lesson_id' => 6,
'is_completed' => true,
'completed_at' => Carbon::now(),
'xp_earned' => 100
],
[
'profile_id' => 3,
'lesson_id' => 1,
'is_completed' => false,
'completed_at' => null,
'xp_earned' => 0
],
[
'profile_id' => 1,
'lesson_id' => 2,
'is_completed' => false,
'completed_at' => null,
'xp_earned' => 0
]
]);
}
}