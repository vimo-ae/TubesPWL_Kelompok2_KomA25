<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('courses')->insert([

            // Literasi Keuangan
            [
                'category_id' => 1,
                'title' => 'Finansial Pribadi untuk Pemula',
                'description' => 'Belajar dasar pengelolaan finansial pribadi',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 1,
                'title' => 'Smart Money Management',
                'description' => 'Strategi mengatur uang dengan bijak',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 1,
                'title' => 'Financial Planning & Wealth Management',
                'description' => 'Perencanaan keuangan dan manajemen kekayaan',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 8,
                'status' => 'published',
            ],
            [
                'category_id' => 1,
                'title' => 'Dasar Investasi untuk Pemula',
                'description' => 'Belajar dasar investasi',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 4,
                'status' => 'published',
            ],

            // UMKM & Kewirausahaan
            [
                'category_id' => 2,
                'title' => 'Membangun UMKM dari Nol',
                'description' => 'Panduan membangun UMKM',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 6,
                'status' => 'published',
            ],
            [
                'category_id' => 2,
                'title' => 'Fundamental Entrepreneurship',
                'description' => 'Dasar entrepreneurship modern',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 2,
                'title' => 'Scale Up UMKM di Era Digital',
                'description' => 'Strategi scale up bisnis digital',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 8,
                'status' => 'published',
            ],

            // Digital Marketing
            [
                'category_id' => 3,
                'title' => 'Digital Marketing untuk Pemula',
                'description' => 'Belajar digital marketing dasar',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 3,
                'title' => 'Social Media Marketing Essentials',
                'description' => 'Dasar pemasaran media sosial',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 3,
                'title' => 'Growth Marketing & Brand Strategy',
                'description' => 'Strategi pertumbuhan dan branding',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 8,
                'status' => 'published',
            ],

            // Karier & Pengembangan Diri
            [
                'category_id' => 4,
                'title' => 'Personal Branding & Produktivitas',
                'description' => 'Pengembangan personal branding',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 4,
                'title' => 'Leadership & Professional Growth',
                'description' => 'Leadership dan pengembangan profesional',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 7,
                'status' => 'published',
            ],

            // Ekonomi Berkelanjutan
            [
                'category_id' => 5,
                'title' => 'Ekonomi dan SDGs untuk Generasi Muda',
                'description' => 'Pengenalan ekonomi dan SDGs',
                'difficulty_level' => 'beginner',
                'estimated_duration' => 5,
                'status' => 'published',
            ],
            [
                'category_id' => 5,
                'title' => 'Ekonomi Digital dan Dampak Sosial',
                'description' => 'Ekonomi digital dan dampak sosial',
                'difficulty_level' => 'intermediate',
                'estimated_duration' => 7,
                'status' => 'published',
            ],
        ]);
    }
}