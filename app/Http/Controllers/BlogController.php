<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = DB::table('blogs')
                ->join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
                ->join('users', 'blogs.user_id', '=', 'users.id')
                ->select('blogs.*', 'blog_categories.name as blog_category_name', 'users.name as user_name')
                ->where('blogs.status', 'active')
                ->orderBy('blogs.created_at', 'desc')
                ->when($request->blog_category_id, function ($query) use ($request) {
                    return $query->where('blogs.blog_category_id', $request->blog_category_id);
                })
                ->when($request->search, function ($query) use ($request) {
                    return $query->where(function ($q) use ($request) {
                        $q->where('blogs.title', 'like', '%' . $request->search . '%')
                            ->orWhere('blogs.body', 'like', '%' . $request->search . '%');
                    });
                })
                ->paginate(10);

            $response = [
                'success' => true,
                'html' => view('blog_data', compact('blogs'))->render(),
            ];

            return response()->json($response);
        }


        return view('blog');
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $prev = Blog::where('id', '<', $blog->id)
            ->where('status', 'active')
            ->orderBy('id', 'desc')->first();
        $next = Blog::where('id', '>', $blog->id)
            ->where('status', 'active')
            ->orderBy('id', 'asc')->first();

        $latests = Blog::where('id', '!=', $blog->id)
            ->where('status', 'active')
            ->orderBy('id', 'desc')->take(3)->get();

        $categories = BlogCategory::orderBy('name')->get();

        return view('blog_detail', compact('blog', 'prev', 'next', 'latests', 'categories'));
    }
}
