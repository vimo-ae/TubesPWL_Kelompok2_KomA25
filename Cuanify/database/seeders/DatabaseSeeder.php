<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'Admin',
            'email' => 'admin@cuanify.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'Ryan',
            'email' => 'ryan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('ryan123'),
            'remember_token' => Str::random(10),
            'role' => 'student',
        ]);

        User::create([
            'username' => 'Alvin',
            'email' => 'alvin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('alvin123'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
        ]);
        
        User::create([
            'username' => 'Vimo',
            'email' => 'vimo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('vimo123'),
            'remember_token' => Str::random(10),
            'role' => 'student',
        ]);

        User::create([
            'username' => 'Dara',
            'email' => 'dara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dara123'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
        ]);

        User::create([
            'username' => 'Aliyah',
            'email' => 'aliyah@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('aliyah123'),
            'remember_token' => Str::random(10),
            'role' => 'student',
        ]);
      
        User::create([
            'username' => 'Guru 1',
            'email' => 'guru1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
            'status_instructor' => 'pending',          
        ]);

        User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            QuizSeeder::class,
            ReviewSeeder::class,
            QuestionSeeder::class,
            AnswerOptionSeeder::class,
            QuizResultSeeder::class, // optional
        ]);
        
    }
}
