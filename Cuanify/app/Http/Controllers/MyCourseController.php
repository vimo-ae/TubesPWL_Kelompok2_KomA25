<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;

class MyCourseController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
    
        /** @var User $user */
        $user = Auth::user();
    
        $courses = $user->courses();
    
        if ($request->category) {
            $courses->where('category_id', $request->category);
        }
    
        $courses = $courses->get();
    
        return view('courses.my-courses', compact('courses', 'categories'));
    }
}