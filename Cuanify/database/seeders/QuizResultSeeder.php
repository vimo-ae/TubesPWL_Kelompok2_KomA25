<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuizResultSeeder extends Seeder
{
public function run(): void
{
DB::table('quiz_results')->delete();

DB::table('quiz_results')->insert([
[
'user_id' => 1,
'quiz_id' => 1,
'score' => 80,
'total_correct' => 8,
'completed_at' => Carbon::now()
],
[
'user_id' => 3,
'quiz_id' => 1,
'score' => 60,
'total_correct' => 6,
'completed_at' => Carbon::now()
],
[
'user_id' => 5,
'quiz_id' => 2,
'score' => 90,
'total_correct' => 9,
'completed_at' => Carbon::now()
],
[
'user_id' => 1,
'quiz_id' => 3,
'score' => 100,
'total_correct' => 10,
'completed_at' => Carbon::now()
]
]);
}
}