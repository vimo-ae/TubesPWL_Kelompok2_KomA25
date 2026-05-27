<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerOptionSeeder extends Seeder
{
public function run(): void
{
DB::table('answer_options')->delete();

DB::table('answer_options')->insert([
[
'question_id' => 2,
'option_text' => 'Benar',
'is_correct' => false
],
[
'question_id' => 2,
'option_text' => 'Salah',
'is_correct' => true
],
[
'question_id' => 3,
'option_text' => 'Benar',
'is_correct' => true
],
[
'question_id' => 3,
'option_text' => 'Salah',
'is_correct' => false
]
]);
}
}