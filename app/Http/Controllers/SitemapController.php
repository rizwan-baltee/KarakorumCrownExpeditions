<?php

namespace App\Http\Controllers;

use App\Models\TrendingTrek;
use App\Models\Type;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $treks = TrendingTrek::where('is_active', true)->get();
        $types = Type::where('is_active', true)->get();
        $posts = BlogPost::where('status', 'published')
                         ->whereNotNull('published_at')
                         ->where('published_at', '<=', now())
                         ->get();

        return response()->view('sitemap', [
            'treks' => $treks,
            'types' => $types,
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }
}
