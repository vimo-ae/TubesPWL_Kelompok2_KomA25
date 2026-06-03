<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        Quiz::create([
            'quiz_id' => 1,
            'lesson_id' => 1,
            'title' => 'Quiz Dasar Finansial',
            'passing_score' => 70,
            'time_limit' => 300
        ]);
    }
}