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

    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@cuanify.com',
                'data' => [
                    'username' => 'Admin',
                    'email_verified_at' => now(),
                    'password' => Hash::make('admin123'),
                    'remember_token' => Str::random(10),
                    'role' => 'admin',
                ],
            ],
            [
                'email' => 'guru0@example.com',
                'data' => [
                    'username' => 'Guru Pending',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => 'instructor',
                    'status_instructor' => 'pending',
                ],
            ],
            [
                'email' => 'guru1@example.com',
                'data' => [
                    'username' => 'Guru 1',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => 'instructor',
                    'status_instructor' => 'approved',
                ],
            ],
            [
                'email' => 'guru2@example.com',
                'data' => [
                    'username' => 'Guru 2',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => 'instructor',
                    'status_instructor' => 'approved',
                ],
            ],
            [
                'email' => 'guru3@example.com',
                'data' => [
                    'username' => 'Guru 3',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => 'instructor',
                    'status_instructor' => 'approved',
                ],
            ],
            [
                'email' => 'test@example.com',
                'data' => [
                    'username' => 'Test User',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'remember_token' => Str::random(10),
                    'role' => 'student',
                ],
            ],
            [
                'email' => 'ryan@gmail.com',
                'data' => [
                    'username' => 'ryan fredryck',
                    'email_verified_at' => now(),
                    'password' => Hash::make('ryan123'),
                    'remember_token' => Str::random(10),
                    'role' => 'student',
                ],
            ],
        ];

        foreach ($users as $entry) {
            $user = User::updateOrCreate(
                ['email' => $entry['email']],
                $entry['data']
            );
            $user->profile()->firstOrCreate(['user_id' => $user->user_id]);
        }

        $instructorIds = User::where('role', 'instructor')
            ->where('status_instructor', 'approved')
            ->pluck('user_id')
            ->toArray();

        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            QuizSeeder::class,
            ReviewSeeder::class,
            QuestionSeeder::class,
            AnswerOptionSeeder::class,
            QuizResultSeeder::class,
        ]);
    }
}