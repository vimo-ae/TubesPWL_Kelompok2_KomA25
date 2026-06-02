<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\AnswerOption;

class AnswerOptionSeeder extends Seeder
{
    public function run(): void
    {
        // Question 1 (MCQ)
        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Menghabiskan uang',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Mengembangkan nilai uang',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Menabung tanpa tujuan',
            'is_correct' => false
        ]);

        // Question 2 (True/False)
        AnswerOption::create([
            'question_id' => 2,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 2,
            'option_text' => 'False',
            'is_correct' => true
        ]);
    }
}