<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard student/user biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/approve/{user_id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reject/{user_id}', [AdminController::class, 'reject'])->name('admin.reject');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Courses & Quiz
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/quizzes/{lesson_id}', [QuizController::class, 'show'])->name('quizzes.show');

// Enroll
Route::post('/enroll/{course_id}', [EnrollmentController::class, 'enroll'])
    ->middleware('auth')
    ->name('enroll.course');

require __DIR__.'/auth.php';