<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'category_id' => 1,
                'title' => 'Laravel Dasar',
                'description' => 'Belajar Laravel dari nol',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 10,
                'status' => 'published',
            ],
            [
                'category_id' => 1,
                'title' => 'Laravel API',
                'description' => 'Belajar REST API Laravel',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 15,
                'status' => 'published',
            ],
        ]);
    }
}