<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
public function run(): void
{
DB::table('enrollments')->delete();

DB::table('enrollments')->insert([
[
'user_id' => 1,
'course_id' => 1,
'status' => 'active',
'completion_percentage' => 50.00
],
[
'user_id' => 3,
'course_id' => 2,
'status' => 'completed',
'completion_percentage' => 100.00
],
[
'user_id' => 5,
'course_id' => 1,
'status' => 'dropped',
'completion_percentage' => 10.50
],
[
'user_id' => 1,
'course_id' => 3,
'status' => 'active',
'completion_percentage' => 25.00
]
]);
}
}