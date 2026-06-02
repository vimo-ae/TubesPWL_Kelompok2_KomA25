<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Question::create([
            'question_id' => 1,
            'quiz_id' => 1,
            'question_text' => 'Apa tujuan utama investasi?',
            'question_type' => 'multiple_choice',
            'points' => 10
        ]);

        Question::create([
            'question_id' => 2,
            'quiz_id' => 1,
            'question_text' => 'Investasi selalu tanpa risiko',
            'question_type' => 'true_false',
            'points' => 10
        ]);
    }
}