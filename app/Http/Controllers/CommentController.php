<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CommentController extends Controller
{
    function comment(Request $request)
    {
        $data['blog'] = Blog::find($request->id);
        return view('main-blog.comments', $data);
    }

    function addcomment(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|uuid|exists:blogs,id',
            'desc_comment' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->blog_id = $request->blog_id;
        $comment->user_id = Auth::id();
        $comment->desc_comment = $request->desc_comment;
        $comment->save();

        return redirect('/detail/' . $request->id)->with('success', 'Komentar berhasil ditambahkan.');
        // return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'desc_comment' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
    
        Comment::create([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::id(),
            'desc_comment' => $request->desc_comment,
            'parent_id' => $request->parent_id, // This handles the reply
        ]);
    
        return back()->with('success', 'Comment or reply added successfully.');
    }
}
