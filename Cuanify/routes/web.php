<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::get('/profile-edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/settings', [SettingController::class, 'edit'])
        ->name('settings.edit');

    Route::patch('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

    Route::delete('/settings', [SettingController::class, 'destroy'])
        ->name('settings.destroy');

    Route::get('/my-courses', [MyCourseController::class, 'index'])->name('my-courses.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/instructors', [AdminController::class, 'instructors'])->name('admin.instructors');
    Route::post('/admin/approve/{user_id}', [AdminController::class, 'approve']);
    Route::post('/admin/reject/{user_id}', [AdminController::class, 'reject']);

    Route::get('/admin/courses', [AdminController::class, 'courses'])->name('admin.courses');
    Route::get('/admin/course/{course_id}', [AdminController::class, 'showCourse'])->name('admin.courses.show');
    Route::post('/admin/course/{course_id}/approve', [AdminController::class, 'approveCourse'])->name('admin.courses.approve');
    Route::post('/admin/course/{course_id}/reject', [AdminController::class, 'rejectCourse'])->name('admin.courses.reject');

    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{category_id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category_id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/all-instructors', [AdminController::class, 'allInstructors'])->name('admin.all_instructors');
    
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::put('/admin/users/{id}/status', [AdminController::class, 'updateUserStatus'])->name('admin.users.update_status');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');

Route::get('/quizzes/{lesson_id}', [QuizController::class, 'show'])->name('quizzes.show');

require __DIR__.'/auth.php';

Route::post('/enroll/{course_id}', [EnrollmentController::class, 'enroll'])
    ->middleware('auth')
    ->name('enroll.course');


Route::prefix('instructor')->group(function () {

    Route::get('/courses', [InstructorCourseController::class, 'index'])->name('instructor.courses.index');

    Route::get('/courses/create', [InstructorCourseController::class, 'create'])->name('instructor.courses.create');

    Route::post('/courses', [InstructorCourseController::class, 'store'])->name('instructor.courses.store');

    Route::get('/courses/{course}', [InstructorCourseController::class, 'show'])->name('instructor.courses.show');

    Route::get('/courses/{course}/lessons/create', [InstructorCourseController::class, 'createLesson'])->name('instructor.lessons.create');

    Route::post('/courses/{course}/lessons', [InstructorCourseController::class, 'storeLesson'])->name('instructor.lessons.store');

    Route::post('/courses/{course}/submit',[InstructorCourseController::class, 'submitVerification'])->name('instructor.courses.submit');

    Route::get('/courses/{course}/edit', [InstructorCourseController::class, 'edit'])->name('instructor.courses.edit');

    Route::put('/courses/{course}', [InstructorCourseController::class, 'update'])->name('instructor.courses.update');

    Route::delete('/courses/{course}', [InstructorCourseController::class, 'destroy'])->name('instructor.courses.destroy');
    
    Route::get('/courses/{course}/lessons/{lesson}/edit', [InstructorCourseController::class, 'editLesson'])->name('instructor.lessons.edit');

    Route::put('/courses/{course}/lessons/{lesson}', [InstructorCourseController::class, 'updateLesson'])->name('instructor.lessons.update');

    Route::delete('/courses/{course}/lessons/{lesson}', [InstructorCourseController::class, 'destroyLesson'])->name('instructor.lessons.destroy');
});