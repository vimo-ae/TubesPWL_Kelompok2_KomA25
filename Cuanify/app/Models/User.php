<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;

#[Fillable(['username', 'email', 'password', 'role', 'is_approved', 'last_login', 'status'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'role', 
        'is_approved', 
        'last_login', 
        'status'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];

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

    protected static function booted()
    {
        static::created(function ($user) {
            $user->profile()->create([
                'user_id' => $user->user_id
            ]);
        });
    }
    
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }

    public function createdCourses()
    {
        return $this->hasMany(Course::class, 'user_id', 'user_id');
    }

public function lessons()
{
    return $this->belongsToMany(
        Lesson::class,
        'lesson_user',
        'user_id',     
        'lesson_id'    
    )->withTimestamps();
}
}
