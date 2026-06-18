<?php

namespace App\Http\Controllers;

use App\Models\TrendingTrek;
use Illuminate\Http\Request;

class TrekController extends Controller
{
    /**
     * Display trek details by slug
     */
    public function show($slug)
    {
        // Find trek by slug with all relationships
        $trek = TrendingTrek::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'type',
                'galleries' => function ($query) {
                    $query->orderBy('sort_order');
                },
                'prices' => function ($query) {
                    $query->orderBy('min_persons');
                }
            ])
            ->first();

        // If trek not found, redirect to home with error
        if (!$trek) {
            return redirect()->route('home')->with('error', 'Trek not found');
        }

        // Return view with trek data
        return view('trek-detail', compact('trek'));
    }
}
