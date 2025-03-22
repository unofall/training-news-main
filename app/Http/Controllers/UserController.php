<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(){
        $blog = Blog::paginate(5);
        $blogs = Blog::where('status', 'active')->get();
        $category = Category::where('name', 'Travel')->first();
        $travel = $category ? $category->blogs()->where('status', 'active')->get() : collect();
        $popularBlogs = Blog::where('likes_count', '>', 0)->orderBy('likes_count', 'desc')->orderBy('view_count', 'desc')->where('status', 'active')->paginate(6);

        foreach ($blog as $b) {
            $b->formatComments = sprintf('%02d', Comment::where('blog_id', $b->id)->count());
        }
        foreach ($blogs as $b) {
            $b->formatComments = sprintf('%02d', Comment::where('blog_id', $b->id)->count());
        }
        return view('user.main-user', compact('blogs', 'blog', 'popularBlogs','travel'));
    }


}
