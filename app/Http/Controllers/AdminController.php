<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Blog;
use App\Models\Fashion;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function showa(Request $request){
        // $blogs = Blog::orderBy('categories', 'asc')->get();
        $category = $request->query('category');

        // Validasi kategori yang diperbolehkan
        $allowedCategories = ['travel', 'topic', 'fashion'];
        $blogs = Blog::where('status', 'active')->orWhere('status', 'inactive')->get();

        // Query blog dengan filter kategori jika ada
        // $blogs = Blog::when(in_array($category, $allowedCategories), function ($query) use ($category) {
        //     $query->where('categories', $category);
        // })->get();

        return view('admin.admin', compact('blogs'));
    }

    function dashboard(){
        $blogs = Blog::all();
        return view('admin.dashboard', compact('blogs'));
    }

    // function show(Request $request)
    // {
    //     // $data['blog'] = Blog::all();
    //     // $blogs = Blog::where('categories')->orderBy('created_at', 'asc')->get();
    //     $blogs = Blog::orderBy('categories', 'asc')->get();
    //     $category = $request->query('category');

    //     // Validasi kategori yang diperbolehkan
    //     $allowedCategories = ['travel', 'topic', 'fashion'];

    //     // Query blog dengan filter kategori jika ada
    //     $blogs = Blog::when(in_array($category, $allowedCategories), function ($query) use ($category) {
    //         $query->where('categories', $category);
    //     })->get();

    //     return view('admin.main', compact('blogs'));
    // }

    function updateStatus($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = $blog->status == 'active' ? 'inactive' : 'active';
        $blog->save();

        return redirect()->back();
    }

    function profile(){
        $blogs = Blog::where('status', 'active')->orWhere('status', 'inactive')->get();
        $user = Auth::user();
        $activities = Activities::with('blog','user')->latest()->get(); // Include relasi blog
        return view('admin.profile', compact('blogs','activities','user'));
    }
}
