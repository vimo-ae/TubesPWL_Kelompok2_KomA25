<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
public function run(): void
{
DB::table('questions')->delete();

DB::table('questions')->insert([
[
'quiz_id' => 1,
'question_text' => 'Apa yang dimaksud dengan kelangkaan dalam ilmu ekonomi?',
'question_type' => 'essay',
'points' => 10
],
[
'quiz_id' => 1,
'question_text' => 'Hukum permintaan berbanding lurus dengan harga.',
'question_type' => 'true_false',
'points' => 5
],
[
'quiz_id' => 2,
'question_text' => 'Faktor utama yang mempengaruhi penawaran adalah biaya produksi.',
'question_type' => 'true_false',
'points' => 5
],
[
'quiz_id' => 3,
'question_text' => 'Sebutkan 3 elemen penting dalam Business Model Canvas (BMC)!',
'question_type' => 'essay',
'points' => 10
]
]);
}
}