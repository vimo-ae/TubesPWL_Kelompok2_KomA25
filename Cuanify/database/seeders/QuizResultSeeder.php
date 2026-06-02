<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuizResult;
use App\Models\User;
use App\Models\Quiz;

class QuizResultSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $quiz = Quiz::first();

        if (!$user || !$quiz) {
            return;
        }

        QuizResult::create([
            'user_id' => $user->user_id,
            'quiz_id' => $quiz->quiz_id,
            'score' => 80,
            'total_correct' => 2,
            'completed_at' => now(),
        ]);
    }
}