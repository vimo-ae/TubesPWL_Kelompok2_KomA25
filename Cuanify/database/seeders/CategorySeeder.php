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
                'category_name' => 'Programming',
                'description' => 'Belajar coding dan development',
            ],
            [
                'category_name' => 'Design',
                'description' => 'Belajar UI/UX dan desain grafis',
            ],
            [
                'category_name' => 'Business',
                'description' => 'Belajar bisnis dan marketing',
            ],
        ]);
    }
}