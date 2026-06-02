<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;

#[Fillable(['username', 'email', 'password', 'role', 'is_approved'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected $primaryKey = 'user_id';
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }
    
    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'enrollments',
            'user_id',
            'course_id',
            'user_id',
            'course_id'
        );
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(
            Course::class,
            'enrollments',
            'user_id',
            'course_id',
            'user_id',
            'course_id'
        );
    }

public function lessons()
{
    return $this->belongsToMany(
        Lesson::class,
        'lesson_user',
        'user_id',     // foreign key di pivot untuk user
        'lesson_id'    // foreign key di pivot untuk lesson
    )->withTimestamps();
}
}
