<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\TrendingTrek;

class TypePageController extends Controller
{
    /**
     * Show all active treks for a given type (by slug).
     */
    public function index(string $slug)
    {
        $type = Type::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $treks = TrendingTrek::where('type_id', $type->id)
            ->where('is_active', true)
            ->with(['type', 'galleries' => function ($q) {
                $q->orderBy('sort_order');
            }])
            ->orderBy('priority', 'desc')
            ->orderBy('title')
            ->paginate(12);

        return view('type-treks', compact('type', 'treks'));
    }
}
