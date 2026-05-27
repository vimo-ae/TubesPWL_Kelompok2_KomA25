<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'user_id' => 1,
            'course_id' => 1,
            'rating' => 5,
            'comment' => 'Course sangat mudah dipahami!',
        ]);

        Review::create([
            'user_id' => 2,
            'course_id' => 1,
            'rating' => 4,
            'comment' => 'Materi bagus dan jelas.',
        ]);

        Review::create([
            'user_id' => 1,
            'course_id' => 2,
            'rating' => 5,
            'comment' => 'Sangat membantu untuk pemula.',
        ]);

        Review::create([
            'user_id' => 3,
            'course_id' => 2,
            'rating' => 3,
            'comment' => 'Lumayan bagus tapi kurang latihan.',
        ]);
    }
}