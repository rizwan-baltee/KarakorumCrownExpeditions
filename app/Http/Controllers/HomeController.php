<?php

namespace App\Http\Controllers;

use App\Models\TrendingTrek;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the dynamic, visual homepage
     */
    public function index()
    {
        // 1. Featured treks / expeditions
        $featuredTreks = TrendingTrek::where('is_active', true)
            ->with(['type', 'galleries' => fn($q) => $q->orderBy('sort_order'), 'prices'])
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // 2. Trending / Popular treks
        $trendingTreks = TrendingTrek::where('is_active', true)
            ->where('is_trending', true)
            ->with(['type', 'galleries' => fn($q) => $q->orderBy('sort_order'), 'prices'])
            ->orderBy('priority', 'desc')
            ->take(6)
            ->get();

        // Fallback if no treks marked as trending yet
        if ($trendingTreks->isEmpty()) {
            $trendingTreks = $featuredTreks;
        }

        // 3. Categories with active trek counts
        $categories = Type::where('is_active', true)
            ->withCount(['trendingTreks' => fn($q) => $q->where('is_active', true)])
            ->orderBy('order')
            ->get();

        // 4. Dynamic stats
        $totalTreksCount = TrendingTrek::where('is_active', true)->count();
        $totalExpeditionsCount = TrendingTrek::where('is_active', true)
            ->whereHas('type', fn($q) => $q->where('slug', 'like', '%expedition%'))
            ->count();

        $stats = [
            'happy_travelers' => 2500,
            'total_trips' => max(45, $totalTreksCount),
            'expert_guides' => 30,
            'satisfaction_rate' => 99,
        ];

        return view('index', compact(
            'featuredTreks',
            'trendingTreks',
            'categories',
            'stats'
        ));
    }
}
