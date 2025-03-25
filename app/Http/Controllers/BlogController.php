<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Fashion;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    function index(Request $request)
    {
        // $topic = Blog::where('categories', 'topic')->where('status', 'active')->paginate(9);
        // $fashions = Blog::where('categories', 'fashion')->where('status', 'active')->paginate(9);
        $blog = Blog::paginate(3);
        $blogs = Blog::where('status', 'active')->get();
        $popularBlogs = Blog::where('likes_count', '>', 0)->orderBy('likes_count', 'desc')->orderBy('view_count', 'desc')->where('status', 'active')->paginate(6);

        foreach ($blog as $b) {
            $b->formatComments = sprintf('%02d', Comment::where('blog_id', $b->id)->count());
        }
        foreach ($blogs as $b) {
            $b->formatComments = sprintf('%02d', Comment::where('blog_id', $b->id)->count());
        }
        // foreach ($topic as $t) {
        //     $t->formatComments = sprintf('%02d', Comment::where('blog_id', $t->id)->count());
        // }
        // foreach ($fashions as $f) {
        //     $f->formatComments = sprintf('%02d', Comment::where('blog_id', $f->id)->count());
        // }

        return view('main-blog.show', compact('blogs', 'blog', 'popularBlogs'));
    }

    function profil()
    {
        $user = Auth::user();
        return view('profie', compact('user'));
    }

    function create()
    {
        // $data['blog'] = Blog::all();
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    function add(Request $request)
    {
        $isDraft = $request->status === 'draft';

        // Validasi input (longgar untuk draft)
        $rules = [
            'foto' => 'nullable|image|mimes:png,jpg,jpeg',
            'title' => $isDraft ? 'nullable|string' : 'required|string',
            'category_id' => $isDraft ? 'nullable|exists:categories,id' : 'required|exists:categories,id',
            'description' => $isDraft ? 'nullable|string' : 'required|string',
            'status' => 'required|in:active,draft,inactive',
        ];

        $request->validate($rules);

        // Simpan foto ke storage jika ada
        $filename = '';
        if ($request->hasFile('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }

        // Simpan data blog
        $blog = Blog::create([
            'id' => Str::uuid(),
            'foto' => $filename,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        Activities::create([
            'id' => Str::uuid(),
            'blog_id' => $blog->id,
            'action' => 'Created New Blog',
            'user_id' => Auth::id(),
        ]);

        // Redirect sesuai status
        if ($isDraft) {
            return redirect('/admin/drafts')->with('success', 'Blog post saved as draft!');
        }

        return redirect('/admin')->with('success', 'Blog post created successfully!');
    }

    function edit(Request $request)
    {
        $data['blog'] = Blog::find($request->id);
        $data['categories'] = Category::all();
        return view('admin.update', $data);
    }

    function update(Request $request)
    {
        $filename = '';

        if ($request->file('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }

        // Ambil data blog sebelum update (untuk log perubahan)
        $blog = Blog::findOrFail($request->id);

        // Update blog
        Blog::where('id', $request->id)->update([
            'foto' => $filename ?: $blog->foto, // Gunakan foto lama jika tidak ada update foto
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        // Simpan history ke tabel activities
        Activities::create([
            'id' => \Illuminate\Support\Str::uuid(),
            'blog_id' => $blog->id,
            'user_id' => auth()->id(),
            'action' => 'updated',
            'created_at' => Carbon::now(),
        ]);

        return redirect('/admin')->with('update', 'Blog updated successfully!');
    }

    function delete(Request $request)
    {
        $blog = Blog::find($request->id);
        $delete = Blog::where('id', $request->id)->delete();

        if ($delete) {
            if ($blog->foto) {
                Storage::delete('foto/', $blog->foto);
            }
        }

        return redirect('/admin')->with('delete', 'Blog Deleted successfully!');
    }

    function detail(Request $request)
    {
        // Cari blog berdasarkan ID
        $blog = Blog::findOrFail($request->id);

        // Hitung semua komentar termasuk replies (tanpa memeriksa parent_id)
        $blog->formatComments = sprintf('%02d', Comment::where('blog_id', $blog->id)->count());

        $otherBlogs = Blog::where('category_id', $blog->category_id) // Gunakan category_id
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Ambil komentar utama (tanpa parent_id) beserta semua replies secara rekursif
        $comments = Comment::with(['replies.user', 'user'])
            ->where('blog_id', $blog->id)
            ->whereNull('parent_id')
            ->get();
        return view('main-blog.detail', compact('blog', 'comments', 'otherBlogs'));
    }

    public function like($id)
    {
        $blog = Blog::findOrFail($id);
        $liked = false;

        if (Auth::check()) {
            if ($blog->likes->contains(Auth::user()->id)) {
                $blog->likes()->detach(Auth::user()->id);
                $blog->decrement('likes_count');
            } else {
                $blog->likes()->attach(Auth::user()->id);
                $blog->increment('likes_count');
                $liked = true;
            }
        }

        return response()->json(['likes_count' => $blog->likes_count, 'liked' => $liked]);
    }

    // Bagian Drafts

    public function drafts()
    {
        $blogs = Blog::where('status', 'draft')->get();
        return view('admin.drafts', compact('blogs'));
    }

    public function publish($id)
    {
        $blog = Blog::findOrFail($id);

        // Tentukan field yang wajib diisi untuk bisa dipublish
        $requiredFields = [
            'foto' => 'Foto',
            'title' => 'Judul',
            'categories_id' => 'Kategori',
            'description' => 'Deskripsi',
            'location' => 'Lokasi',
        ];

        // Cek apakah ada field yang belum diisi
        $missingFields = [];
        foreach ($requiredFields as $field => $label) {
            if (empty($blog->$field)) {
                $missingFields[] = $label;
            }
        }

        // Jika ada field yang kosong, kembalikan ke halaman sebelumnya dengan error
        if (!empty($missingFields)) {
            return redirect()
                ->back()
                ->withErrors(['msg' => 'Harap isi kolom berikut sebelum dipublish: ' . implode(', ', $missingFields) . '.'])
                ->withInput();
        }

        // Jika semua field sudah terisi, ubah status menjadi active
        $blog->update(['status' => 'active']);
        return redirect('/admin')->with('success', 'Blog berhasil dipublish!');
    }

    function editDrafts($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit-drafts', compact('blog', 'categories'));
    }

    public function updateDrafts(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $filename = '';

        if ($request->file('foto')) {
            $extfile = $request->file('foto')->getClientOriginalExtension();
            $filename = time() . '.' . $extfile;
            $request->file('foto')->storeAs('foto', $filename);
        }

        $blog->update([
            'foto' => $filename,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.drafts')->with('success', 'Draft updated successfully!');
    }

    public function deleteDraft($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.drafts')->with('success', 'Draft has been deleted!');
    }
}
