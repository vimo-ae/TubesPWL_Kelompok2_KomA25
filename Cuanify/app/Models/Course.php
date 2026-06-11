<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Nama primary key
    protected $primaryKey = 'course_id';

    // Field yang boleh diisi
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'thumbnail',
        'difficulty_level',
        'estimated_duration',
        'status',
        'rejection_reason',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'course_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'course_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id', 'course_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'enrollments',
            'course_id',
            'user_id',
            'course_id',
            'user_id'
        );
    }

    public function enrolledUsers()
    {
        return $this->belongsToMany(
            User::class,
            'enrollments',
            'course_id',
            'user_id',
            'course_id',
            'user_id'
        );
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function getRequiredLevel()
    {
        return match (strtolower($this->difficulty_level)) {
            'advanced'     => 10, 
            'intermediate' => 5,  
            'beginner'     => 0,  
            default        => 0,
        };
    }
}
