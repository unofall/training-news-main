<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show()
    {
        $categories = Category::with([
            'blogs' => function ($query) {
                $query->where('status', 'active')->latest();
            },
        ])->get();

        $categories = $categories->sortByDesc(function ($category) {
            return $category->name === 'Culture' ? 1 : 0;
        });

        $popularBlogs = Blog::where('likes_count', '>', 0)->orderBy('likes_count', 'desc')->orderBy('view_count', 'desc')->where('status', 'active')->paginate(6);
        return view('user.main-user', compact( 'popularBlogs', 'categories'));
    }
}
