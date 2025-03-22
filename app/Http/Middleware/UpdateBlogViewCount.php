<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UpdateBlogViewCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'User') {
            $blogId = $request->route('id');
            $userId = Auth::id();
            $blog = Blog::find($blogId);

            if ($blog) {
                $viewedBlogs = session()->get('viewed_blogs', []);

                if (!in_array($blogId, $viewedBlogs)) {
                    $blog->increment('view_count');
                    session()->push('viewed_blogs', $blogId);
                }
            }
        }

        return $next($request);
    }
}
