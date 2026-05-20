<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'course_id' => 1,
            'title' => 'Ekonomi asik',
            'content' => 'Gatau isinya apa',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 1000,
            'lesson_order' => 1,
        ]);

        Lesson::create([
            'course_id' => 1,
            'title' => 'Hemat duit',
            'content' => 'Jan boros',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 1600,
            'lesson_order' => 2,
        ]);

        Lesson::create([
            'course_id' => 1,
            'title' => 'Usaha kecil kecilan',
            'content' => 'Bikin usaha, jangan malas',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 3000,
            'lesson_order' => 3,
        ]);

        Lesson::create([
            'course_id' => 2,
            'title' => 'Isi sendiri',
            'content' => 'Rawrrr',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 16090,
            'lesson_order' => 1,
        ]);

        Lesson::create([
            'course_id' => 2,
            'title' => 'Isi sendiri',
            'content' => 'Rawrrr',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 16090,
            'lesson_order' => 2,
        ]);

        Lesson::create([
            'course_id' => 3,
            'title' => 'Males gwejh',
            'content' => 'Rawrrr',
            'video_url' => 'Belum ada rek',
            'pdf_file' => 'Ini juga belum ada rekk',
            'xp_reward' => 16090,
            'lesson_order' => 1,
        ]);
    }
}