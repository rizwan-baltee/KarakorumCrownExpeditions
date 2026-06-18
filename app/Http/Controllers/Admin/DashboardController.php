<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrendingTrek;
use App\Models\Type;
use App\Models\BookTour;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'treks' => TrendingTrek::count(),
            'active_treks' => TrendingTrek::where('is_active', true)->count(),
            'trending' => TrendingTrek::where('is_trending', true)->count(),
            'types' => Type::where('is_active', true)->count(),
            'bookings' => BookTour::count(),
            'inquiries' => BookTour::where('type', 'inquiry')->count(),
            'pending_bookings' => BookTour::where('status', 'Pending')->count(),
            'new_requests' => BookTour::where('status', 'New')->count(),
            'confirmed_bookings' => BookTour::where('status', 'Confirmed')->count(),
        ];

        $recentBookings = BookTour::with(['trendingTrek'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentTreks = TrendingTrek::with(['type', 'galleries'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'recentTreks'));
    }
}
