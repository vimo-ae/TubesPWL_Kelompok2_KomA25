<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/approve/{user_id}', [AdminController::class, 'approve']);
    Route::post('/admin/reject/{user_id}', [AdminController::class, 'reject']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/quizzes/{lesson_id}', [QuizController::class, 'show'])->name('quizzes.show');

require __DIR__.'/auth.php';
