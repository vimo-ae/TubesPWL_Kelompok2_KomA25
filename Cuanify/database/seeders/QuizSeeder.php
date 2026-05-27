<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'lesson_id' => 1,
            'title' => 'Ekonomi Asik',
            'passing_score' => 70,
            'time_limit' => 30,
        ]);

        Quiz::create([
            'lesson_id' => 2,
            'title' => 'Ekonomi Pemula',
            'passing_score' => 75,
            'time_limit' => 20,
        ]);

        Quiz::create([
            'lesson_id' => 3,
            'title' => 'Usaha',
            'passing_score' => 80,
            'time_limit' => 25,
        ]);
    }
}