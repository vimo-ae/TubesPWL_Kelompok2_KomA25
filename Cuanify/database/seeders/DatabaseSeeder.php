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

        $user1 = User::firstOrCreate([
            'username' => 'Admin',
            'email' => 'admin@cuanify.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
        $user1->profile()->firstOrCreate(['user_id' => $user1->user_id]);

        $user2 = User::firstOrCreate([
            'username' => 'Guru 1',
            'email' => 'guru1@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
            'status_instructor' => 'approved',          
        ]);
        $user2->profile()->firstOrCreate(['user_id' => $user2->user_id]);

        $user3 = User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        $user3->profile()->firstOrCreate(['user_id' => $user3->user_id]);

        $user4 = User::firstOrCreate([
            'username' => 'Guru 2',
            'email' => 'guru2@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
            'status_instructor' => 'approved',          
        ]);
        $user4->profile()->firstOrCreate(['user_id' => $user4->user_id]);

        $user5 = User::firstOrCreate([
            'username' => 'Guru 3',
            'email' => 'guru3@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'instructor',
            'status_instructor' => 'approved',          
        ]);
        $user5->profile()->firstOrCreate(['user_id' => $user5->user_id]);

        $instructorIds = [$user2->user_id, $user4->user_id, $user5->user_id];

        $user6 = User::factory()->create([
            'username' => 'ryan fredryck',
            'email' => 'ryan@gmail.com',
            'password' => Hash::make('ryan123'),
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
