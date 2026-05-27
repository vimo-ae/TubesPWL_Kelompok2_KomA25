<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name' => 'Literasi Keuangan',
                'description' => 'Pembelajaran finansial dan pengelolaan uang',
            ],
            [
                'category_name' => 'UMKM & Kewirausahaan',
                'description' => 'Pembelajaran bisnis dan entrepreneurship',
            ],
            [
                'category_name' => 'Digital Marketing',
                'description' => 'Pembelajaran pemasaran digital',
            ],
            [
                'category_name' => 'Karier & Pengembangan Diri',
                'description' => 'Pembelajaran soft skill dan pengembangan diri',
            ],
            [
                'category_name' => 'Ekonomi Berkelanjutan',
                'description' => 'Pembelajaran ekonomi berkelanjutan dan SDGs',
            ],
        ]);
    }
}