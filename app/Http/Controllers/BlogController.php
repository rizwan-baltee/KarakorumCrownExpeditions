<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with(['category', 'author', 'tags'])
                         ->where('status', 'published')
                         ->whereNotNull('published_at')
                         ->where('published_at', '<=', now())
                         ->latest('published_at');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(9);
        $categories = BlogCategory::where('is_active', true)->withCount('posts')->get();
        $tags = BlogTag::all();

        return view('blog.index', compact('posts', 'categories', 'tags'));
    }

    public function show($slug)
    {
        $post = BlogPost::with(['category', 'author', 'tags'])
                        ->where('slug', $slug)
                        ->where('status', 'published')
                        ->firstOrFail();

        // Increment views
        $post->increment('views');

        $relatedPosts = BlogPost::where('category_id', $post->category_id)
                                ->where('id', '!=', $post->id)
                                ->where('status', 'published')
                                ->latest('published_at')
                                ->take(3)
                                ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }

    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        $posts = BlogPost::with(['category', 'author', 'tags'])
                         ->where('category_id', $category->id)
                         ->where('status', 'published')
                         ->whereNotNull('published_at')
                         ->where('published_at', '<=', now())
                         ->latest('published_at')
                         ->paginate(9);

        $categories = BlogCategory::where('is_active', true)->withCount('posts')->get();
        $tags = BlogTag::all();

        return view('blog.index', compact('category', 'posts', 'categories', 'tags'));

    }

    public function tag($slug)
    {
        $tag = BlogTag::where('slug', $slug)->firstOrFail();
        
        $posts = $tag->posts()
                     ->with(['category', 'author', 'tags'])
                     ->where('status', 'published')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now())
                     ->latest('published_at')
                     ->paginate(9);

        $categories = BlogCategory::where('is_active', true)->withCount('posts')->get();
        $tags = BlogTag::all();

        return view('blog.index', compact('tag', 'posts', 'categories', 'tags'));
    }
}
