@extends('admin.layouts.app')

@section('title', 'Booking & Inquiry Management')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Bookings & Inquiries</h1>
            <p class="text-gray-600 mt-1">Manage all customer requests</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.bookings.export', request()->query()) }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition text-sm">
                <i class="fas fa-download mr-2"></i>Export CSV
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Stats Cards Row 1: Overview -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
        <a href="{{ route('admin.bookings.index') }}" class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition border-2 {{ !request('type') && !request('status') ? 'border-emerald-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-blue-100 rounded-xl flex items-center justify-center"><i class="fas fa-list text-blue-600"></i></div>
                <div><p class="text-gray-500 text-xs">Total</p><h3 class="text-xl font-bold text-gray-800">{{ $stats['total'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['type' => 'booking']) }}" class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition border-2 {{ request('type') === 'booking' ? 'border-emerald-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-emerald-100 rounded-xl flex items-center justify-center"><i class="fas fa-calendar-check text-emerald-600"></i></div>
                <div><p class="text-gray-500 text-xs">Bookings</p><h3 class="text-xl font-bold text-gray-800">{{ $stats['bookings'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['type' => 'inquiry']) }}" class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition border-2 {{ request('type') === 'inquiry' ? 'border-indigo-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-indigo-100 rounded-xl flex items-center justify-center"><i class="fas fa-comment-dots text-indigo-600"></i></div>
                <div><p class="text-gray-500 text-xs">Inquiries</p><h3 class="text-xl font-bold text-gray-800">{{ $stats['inquiries'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['status' => 'New']) }}" class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition border-2 {{ request('status') === 'New' ? 'border-amber-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-amber-100 rounded-xl flex items-center justify-center"><i class="fas fa-bell text-amber-600"></i></div>
                <div><p class="text-gray-500 text-xs">New</p><h3 class="text-xl font-bold text-gray-800">{{ $stats['new'] }}</h3></div>
            </div>
        </a>
    </div>

    <!-- Stats Cards Row 2: Pipeline -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <a href="{{ route('admin.bookings.index', ['status' => 'Contacted']) }}" class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition border-2 {{ request('status') === 'Contacted' ? 'border-indigo-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-indigo-100 rounded-lg flex items-center justify-center"><i class="fas fa-phone text-indigo-600 text-sm"></i></div>
                <div><p class="text-gray-500 text-[11px]">Contacted</p><h3 class="text-lg font-bold text-gray-800">{{ $stats['contacted'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['status' => 'Confirmed']) }}" class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition border-2 {{ request('status') === 'Confirmed' ? 'border-green-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-green-100 rounded-lg flex items-center justify-center"><i class="fas fa-check-circle text-green-600 text-sm"></i></div>
                <div><p class="text-gray-500 text-[11px]">Confirmed</p><h3 class="text-lg font-bold text-gray-800">{{ $stats['confirmed'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['status' => 'Completed']) }}" class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition border-2 {{ request('status') === 'Completed' ? 'border-emerald-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-emerald-100 rounded-lg flex items-center justify-center"><i class="fas fa-flag-checkered text-emerald-600 text-sm"></i></div>
                <div><p class="text-gray-500 text-[11px]">Completed</p><h3 class="text-lg font-bold text-gray-800">{{ $stats['completed'] }}</h3></div>
            </div>
        </a>
        <a href="{{ route('admin.bookings.index', ['status' => 'Cancelled']) }}" class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition border-2 {{ request('status') === 'Cancelled' ? 'border-red-400' : 'border-transparent' }}">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-red-100 rounded-lg flex items-center justify-center"><i class="fas fa-times-circle text-red-600 text-sm"></i></div>
                <div><p class="text-gray-500 text-[11px]">Cancelled</p><h3 class="text-lg font-bold text-gray-800">{{ $stats['cancelled'] }}</h3></div>
            </div>
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
        <form method="GET" class="flex flex-wrap gap-3 items-center">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, phone, country..."
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none flex-1 min-w-[200px] text-sm">
            <select name="type" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                <option value="">All Types</option>
                <option value="booking" {{ request('type') === 'booking' ? 'selected' : '' }}>Bookings</option>
                <option value="inquiry" {{ request('type') === 'inquiry' ? 'selected' : '' }}>Inquiries</option>
            </select>
            <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                <option value="">All Status</option>
                @foreach(\App\Models\BookTour::STATUSES as $s)
                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm">
                <i class="fas fa-filter mr-1"></i> Filter
            </button>
            @if(request()->hasAny(['search', 'status', 'type']))
                <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 text-red-600 hover:text-red-700 text-sm">
                    <i class="fas fa-times mr-1"></i> Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Package</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-4">
                        <div class="font-semibold text-gray-800 text-sm">{{ $booking->name }}</div>
                        <div class="text-xs text-gray-500">{{ $booking->email }}</div>
                        @if($booking->country)
                            <div class="text-xs text-gray-400">🌍 {{ $booking->country }}</div>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        @if($booking->isBooking())
                            <span class="px-2 py-1 text-[11px] font-semibold rounded-full bg-emerald-100 text-emerald-800">Booking</span>
                        @else
                            <span class="px-2 py-1 text-[11px] font-semibold rounded-full bg-indigo-100 text-indigo-800">Inquiry</span>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm text-gray-800">{{ $booking->trendingTrek->title ?? 'Custom Tour' }}</div>
                        <div class="text-xs text-gray-500">{{ $booking->guests ?? 1 }} travelers</div>
                    </td>
                    <td class="px-5 py-4">
                        <div class="text-sm text-gray-800">{{ $booking->start_date?->format('d M') ?? 'Flexible' }}</div>
                        @if($booking->end_date)
                            <div class="text-xs text-gray-500">to {{ $booking->end_date->format('d M Y') }}</div>
                        @endif
                    </td>
                    <td class="px-5 py-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $booking->status_color }}">{{ $booking->status }}</span>
                    </td>
                    <td class="px-5 py-4">
                        <div class="flex gap-1.5">
                            <a href="{{ route('admin.bookings.show', $booking) }}" class="px-2.5 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-xs" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="mailto:{{ $booking->email }}" class="px-2.5 py-1 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 text-xs" title="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                        <p>No bookings or inquiries found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
