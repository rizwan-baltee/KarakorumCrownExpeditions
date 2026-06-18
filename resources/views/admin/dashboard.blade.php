@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl shadow-xl p-8 mb-6 text-white">
        <h1 class="text-3xl font-bold mb-2">Welcome back, {{ Auth::user()->name ?? 'Admin' }}! 👋</h1>
        <p class="text-emerald-100">Here's what's happening with your travel website today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Treks -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Treks</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['treks'] }}</h3>
                    <p class="text-emerald-600 text-sm mt-2">
                        {{ $stats['active_treks'] }} active
                    </p>
                </div>
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-hiking text-3xl text-emerald-600"></i>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Categories</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['types'] }}</h3>
                    <p class="text-blue-600 text-sm mt-2">Active types</p>
                </div>
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-tags text-3xl text-blue-600"></i>
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Bookings</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['bookings'] }}</h3>
                    <p class="text-purple-600 text-sm mt-2">
                        {{ $stats['pending_bookings'] }} pending
                    </p>
                </div>
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-check text-3xl text-purple-600"></i>
                </div>
            </div>
        </div>

        <!-- Trending -->
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Trending</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['trending'] }}</h3>
                    <p class="text-orange-600 text-sm mt-2">Featured treks</p>
                </div>
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-fire text-3xl text-orange-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Data -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.treks.create') }}" class="flex items-center gap-3 px-4 py-3 bg-emerald-50 text-emerald-700 rounded-lg hover:bg-emerald-100 transition">
                    <i class="fas fa-plus-circle text-lg"></i> Add New Trek
                </a>
                <a href="{{ route('admin.types.create') }}" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                    <i class="fas fa-tags text-lg"></i> Add New Category
                </a>
                <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-4 py-3 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition">
                    <i class="fas fa-calendar-check text-lg"></i> View Bookings
                </a>
                <a href="{{ route('admin.bookings.index', ['status' => 'Pending']) }}" class="flex items-center gap-3 px-4 py-3 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition">
                    <i class="fas fa-clock text-lg"></i> Pending Bookings
                </a>
                <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition">
                    <i class="fas fa-external-link-alt text-lg"></i> Preview Website
                </a>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Recent Bookings</h3>
                <a href="{{ route('admin.bookings.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">View All</a>
            </div>
            @forelse($recentBookings as $booking)
            <div class="flex items-center gap-3 py-3 {{ !$loop->last ? 'border-b' : '' }}">
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-gray-400 text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $booking->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ $booking->trendingTrek->title ?? 'N/A' }}</p>
                </div>
                <span class="px-2 py-0.5 text-xs rounded-full flex-shrink-0
                    @if($booking->status === 'Confirmed') bg-green-100 text-green-800
                    @elseif($booking->status === 'Pending') bg-yellow-100 text-yellow-800
                    @elseif($booking->status === 'Cancelled') bg-red-100 text-red-800
                    @else bg-blue-100 text-blue-800
                    @endif">
                    {{ $booking->status }}
                </span>
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-calendar-times text-3xl text-gray-300 mb-2"></i>
                <p>No bookings yet</p>
            </div>
            @endforelse
        </div>

        <!-- Recent Treks -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Recent Treks</h3>
                <a href="{{ route('admin.treks.index') }}" class="text-sm text-emerald-600 hover:text-emerald-700">View All</a>
            </div>
            @forelse($recentTreks as $trek)
            <div class="flex items-center gap-3 py-3 {{ !$loop->last ? 'border-b' : '' }}">
                @if($trek->galleries->where('is_featured', true)->first())
                    <img src="{{ asset('storage/' . $trek->galleries->where('is_featured', true)->first()->image_path) }}" alt="{{ $trek->title }}" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                @else
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-mountain text-gray-400 text-sm"></i>
                    </div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-800 truncate">{{ $trek->title }}</p>
                    <p class="text-xs text-gray-500">{{ $trek->type->name ?? 'N/A' }} · {{ $trek->duration_days }} days</p>
                </div>
                @if($trek->is_trending)
                    <span class="px-2 py-0.5 text-xs rounded-full bg-orange-100 text-orange-800 flex-shrink-0">🔥</span>
                @endif
            </div>
            @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-hiking text-3xl text-gray-300 mb-2"></i>
                <p>No treks created yet</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
