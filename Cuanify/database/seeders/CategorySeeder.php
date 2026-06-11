<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Literasi Keuangan', 'description' => 'Pembelajaran finansial dan pengelolaan uang'],
            ['category_name' => 'UMKM & Kewirausahaan', 'description' => 'Pembelajaran bisnis dan entrepreneurship'],
            ['category_name' => 'Digital Marketing', 'description' => 'Pembelajaran pemasaran digital'],
            ['category_name' => 'Karier & Pengembangan Diri', 'description' => 'Pembelajaran soft skill dan pengembangan diri'],
            ['category_name' => 'Ekonomi Berkelanjutan', 'description' => 'Pembelajaran ekonomi berkelanjutan dan SDGs'],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['category_name' => $category['category_name']],
                $category
            );
        }
    }
}