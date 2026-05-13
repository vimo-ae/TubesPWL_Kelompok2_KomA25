<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Course extends Model
{
    protected $primaryKey = 'course_id';

    protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'description',
    'thumbnail',
    'difficulty_level',
    'estimated_duration',
    'status',
];

public function instructor()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
}
