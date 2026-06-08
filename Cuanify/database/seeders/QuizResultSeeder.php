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
    }
}