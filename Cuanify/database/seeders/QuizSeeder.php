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
            'time_limit' => 1
        ]);

        Quiz::create([
            'quiz_id' => 2,
            'lesson_id' => 2,
            'title' => 'Quiz Anggaran 50/30/20',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 3,
            'lesson_id' => 3,
            'title' => 'Quiz Dana Darurat',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 4,
            'lesson_id' => 4,
            'title' => 'Quiz Menabung dan Tujuan Keuangan',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 5,
            'lesson_id' => 5,
            'title' => 'Quiz Dasar Investasi',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 6,
            'lesson_id' => 6,
            'title' => 'Quiz Mengelola Utang',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 7,
            'lesson_id' => 7,
            'title' => 'Quiz Manajemen Risiko',
            'passing_score' => 70,
            'time_limit' => 5
        ]);

        Quiz::create([
            'quiz_id' => 8,
            'lesson_id' => 8,
            'title' => 'Ujian Akhir Finansial Pribadi',
            'passing_score' => 75,
            'time_limit' => 5
        ]);
    }
}