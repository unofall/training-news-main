<?php

namespace App\Http\Controllers;

use App\Models\Activities;
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
        $activities = Activities::with('blog', 'user')->latest()->get(); // Include relasi blog
        $popularBlogs = Blog::where('likes_count', '>', 0)->orderBy('likes_count', 'desc')->orderBy('view_count', 'desc')->where('status', 'active')->paginate(6);
        return view('user.main-user', compact('popularBlogs', 'categories', 'activities'));
    }

    function viewall(Request $request)
    {
        $category = Category::findOrFail($request->id);
        // Ambil kategori berdasarkan nama
        // $category = Category::where('name', $categoryName)->firstOrFail();

        // Ambil semua blog dalam kategori tersebut
        $blogs = Blog::where('category_id', $category->id)->orderBy('created_at', 'desc')->paginate(10); // Pagination 10 blog per halaman
        $popularPosts = Blog::where('likes_count', '>', 0)->orderBy('likes_count', 'desc')->orderBy('view_count', 'desc')->where('status', 'active')->get();
        return view('user.viewall', compact('category', 'blogs', 'popularPosts'));
    }

    function culture()
    {
        $category = Category::where('name', 'Culture')->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)
            ->where('status', 'active') // Hanya blog dengan status aktif
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan yang terbaru
            ->get();

        return view('user.culture', compact('category','blogs'));
    }

    function fashion()
    {
        $category = Category::where('name', 'Fashion')->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)
            ->where('status', 'active') // Hanya blog dengan status aktif
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan yang terbaru
            ->get();

        return view('user.fashion', compact('category','blogs'));
    }

    function travel()
    {
        $category = Category::where('name', 'Travel')->firstOrFail();

        $blogs = Blog::where('category_id', $category->id)
            ->where('status', 'active') // Hanya blog dengan status aktif
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan yang terbaru
            ->get();

        return view('user.travel', compact('category','blogs'));
    }
}
