<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Instructor\LessonController as InstructorLessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizResultController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonProgressController;
use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard student/user biasa
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::put('/admin/users/{id}/status', [AdminController::class, 'updateUserStatus'])->name('admin.users.update_status');

    // Instructor Verification
    Route::get('/admin/instructors', [AdminController::class, 'instructors'])->name('admin.instructors');
    Route::get('/admin/all-instructors', [AdminController::class, 'allInstructors'])->name('admin.all_instructors');
    Route::post('/admin/approve/{user_id}', [AdminController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reject/{user_id}', [AdminController::class, 'reject'])->name('admin.reject');

    // Course Management & Verification
    Route::get('/admin/courses', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/course/{course_id}', [AdminController::class, 'showCourse'])->name('admin.courses.show');
    Route::post('/admin/course/{course_id}/approve', [AdminController::class, 'approveCourse'])->name('admin.courses.approve');
    Route::post('/admin/course/{course_id}/reject', [AdminController::class, 'rejectCourse'])->name('admin.courses.reject');

    // Category Management
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{category_id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category_id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
});

// Profile & Student Space
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::delete('/settings', [SettingController::class, 'destroy'])->name('settings.destroy');
    
    Route::get('/my-courses', [MyCourseController::class, 'index'])->name('my-courses.index');
});

// Catalog & Learning Routes (Public/Authenticated)
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');

Route::post('/lessons/{lesson}/complete', [LessonProgressController::class, 'complete'])
    ->middleware('auth')
    ->name('lessons.complete');

// Enroll
Route::post('/enroll/{course_id}', [EnrollmentController::class, 'enroll'])
    ->middleware('auth')
    ->name('enroll.course');

// Quiz Routes
Route::middleware('auth')->group(function () {
    // Halaman list quiz dari lesson
    Route::get('/lessons/{lesson}/quizzes', [QuizController::class, 'show'])->name('quizzes.show');
    // Halaman mengerjakan quiz
    Route::get('/quizzes/{quiz}', [QuizController::class, 'take'])->name('quizzes.take');
    // Submit jawaban quiz
    Route::post('/quizzes/{quiz}/submit', [QuizController::class, 'submit'])->name('quizzes.submit');
    // Hasil kuis
    Route::get('/quiz-result/{quiz_id}', [QuizResultController::class, 'show'])->name('quizzes.result');
});

// Instructor Routes
Route::prefix('instructor')->middleware('auth')->group(function () {
    // Course Management
    Route::get('/courses', [InstructorCourseController::class, 'index'])->name('instructor.courses.index');
    Route::get('/courses/create', [InstructorCourseController::class, 'create'])->name('instructor.courses.create');
    Route::post('/courses', [InstructorCourseController::class, 'store'])->name('instructor.courses.store');
    Route::get('/courses/{course}', [InstructorCourseController::class, 'show'])->name('instructor.courses.show');
    Route::get('/courses/{course}/edit', [InstructorCourseController::class, 'edit'])->name('instructor.courses.edit');
    Route::put('/courses/{course}', [InstructorCourseController::class, 'update'])->name('instructor.courses.update');
    Route::delete('/courses/{course}', [InstructorCourseController::class, 'destroy'])->name('instructor.courses.destroy');
    Route::post('/courses/{course}/submit', [InstructorCourseController::class, 'submitVerification'])->name('instructor.courses.submit');

    // Lesson Management (Menggunakan InstructorLessonController bawaan branch remote)
    Route::get('/courses/{course}/lessons/create', [InstructorLessonController::class, 'create'])->name('instructor.lessons.create');
    Route::post('/courses/{course}/lessons', [InstructorLessonController::class, 'store'])->name('instructor.lessons.store');
    Route::get('/courses/{course}/lessons/{lesson?}/preview', [InstructorLessonController::class, 'preview'])->name('instructor.lessons.preview');
    Route::get('/courses/{course}/lessons/{lesson}/edit', [InstructorLessonController::class, 'edit'])->name('instructor.lessons.edit');
    Route::put('/courses/{course}/lessons/{lesson}', [InstructorLessonController::class, 'update'])->name('instructor.lessons.update');
    Route::delete('/courses/{course}/lessons/{lesson}', [InstructorLessonController::class, 'destroy'])->name('instructor.lessons.destroy');
});

require __DIR__.'/auth.php';