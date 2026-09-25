@extends('admin.layouts.app')

@section('title', 'Expedition Bookings & Inquiries')

@section('content')
<div class="p-6 space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Bookings & Travel Inquiries</h1>
            <p class="text-gray-500 text-sm mt-0.5">Manage reservations, update tour status, and coordinate international guests</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.bookings.export', request()->query()) }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition text-sm shadow-xs">
                <i class="fas fa-file-csv text-emerald-600"></i>
                <span>Export CSV</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-xl text-emerald-800 text-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Top Statistics Overview --}}
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <i class="fas fa-list"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-semibold">Total Requests</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-0.5">{{ $stats['total'] }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-semibold">Pending / Review</p>
                    <h3 class="text-2xl font-bold text-amber-700 mt-0.5">{{ $stats['pending'] }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-semibold">Confirmed</p>
                    <h3 class="text-2xl font-bold text-emerald-700 mt-0.5">{{ $stats['confirmed'] }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-semibold">Total Travelers</p>
                    <h3 class="text-2xl font-bold text-purple-700 mt-0.5">{{ number_format($stats['total_travelers']) }}</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5 col-span-2 lg:col-span-1">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-semibold">Quoted Pipeline</p>
                    <h3 class="text-2xl font-bold text-emerald-800 mt-0.5">${{ number_format($stats['total_revenue'], 0) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Advanced Filters Card --}}
    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-5">
        <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3 items-end">
            {{-- Search query --}}
            <div class="lg:col-span-2">
                <label class="block text-xs font-semibold text-gray-500 mb-1">Search Keyword</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Reference, name, email, phone, country..."
                    class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-emerald-500">
            </div>

            {{-- Trip filter --}}
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1">Filter by Trip</label>
                <select name="trek_id" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-emerald-500">
                    <option value="">All Treks</option>
                    @foreach(($allTreks ?? $treks ?? []) as $t)
                        <option value="{{ $t->id }}" {{ request('trek_id') == $t->id ? 'selected' : '' }}>
                            {{ $t->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status filter --}}
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2.5 border border-gray-200 rounded-xl text-sm outline-none focus:border-emerald-500">
                    <option value="">All Statuses</option>
                    @foreach(\App\Models\BookTour::STATUSES as $s)
                        <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Date range from --}}
            <div>
                <label class="block text-xs font-semibold text-gray-500 mb-1">Travel From</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full px-3 py-2 border border-gray-200 rounded-xl text-xs outline-none focus:border-emerald-500">
            </div>

            {{-- Actions --}}
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-semibold text-sm transition-colors">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'trek_id', 'date_from', 'date_to', 'type']))
                    <a href="{{ route('admin.bookings.index') }}" class="px-3.5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl text-sm font-semibold transition-colors" title="Clear Filters">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Bookings Table --}}
    <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Ref & Guest</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Trip / Product</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Travel Date</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Party & Tier</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Quoted Total</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-5 py-3.5 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        {{-- Ref & Guest --}}
                        <td class="px-5 py-4">
                            <span class="font-mono text-xs font-bold text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                                {{ $booking->reference_code }}
                            </span>
                            <div class="font-bold text-gray-900 mt-1.5">{{ $booking->name }}</div>
                            <div class="text-xs text-gray-500">{{ $booking->email }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">
                                <i class="fas fa-map-marker-alt text-xs mr-1 text-gray-300"></i>{{ $booking->country ?: 'International' }}
                            </div>
                        </td>

                        {{-- Trip --}}
                        <td class="px-5 py-4">
                            <div class="font-bold text-gray-800">
                                {{ $booking->trendingTrek?->title ?: 'Custom Tour Request' }}
                            </div>
                            <div class="text-xs text-gray-500 mt-0.5">
                                {{ $booking->trendingTrek?->type?->name ?: 'Bespoke Inquiry' }}
                            </div>
                        </td>

                        {{-- Travel Date --}}
                        <td class="px-5 py-4">
                            @if($booking->start_date)
                                <div class="font-semibold text-gray-800">{{ $booking->start_date->format('d M Y') }}</div>
                                @if($booking->end_date)
                                    <div class="text-xs text-gray-400">to {{ $booking->end_date->format('d M Y') }}</div>
                                @endif
                            @else
                                <span class="text-gray-400 italic">Dates Flexible</span>
                            @endif
                        </td>

                        {{-- Party & Tier --}}
                        <td class="px-5 py-4">
                            <div class="font-semibold text-gray-800">
                                {{ $booking->guests }} {{ \Str::plural('Guest', $booking->guests) }}
                            </div>
                            <div class="text-xs text-gray-500 mt-0.5">
                                {{ $booking->package_tier ?: 'Standard' }} ({{ $booking->trip_type ?: 'Group' }})
                            </div>
                        </td>

                        {{-- Quoted Total --}}
                        <td class="px-5 py-4">
                            <div class="font-bold text-emerald-800 font-display text-base">
                                {{ $booking->formatted_total }}
                            </div>
                        </td>

                        {{-- Status --}}
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold rounded-full {{ $booking->status_color }}">
                                {{ $booking->status }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.bookings.show', $booking) }}"
                                   class="px-3 py-1.5 bg-slate-900 text-white rounded-lg hover:bg-emerald-600 transition text-xs font-semibold"
                                   title="View Full Booking">
                                    <i class="fas fa-eye mr-1"></i> View
                                </a>

                                <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $booking->phone), '0') }}?text={{ urlencode('Hi ' . $booking->name . '! Contacting you regarding your Karakorum Crown Expeditions booking ' . $booking->reference_code) }}"
                                   target="_blank"
                                   class="w-8 h-8 rounded-lg bg-[#25D366]/10 text-[#25D366] hover:bg-[#25D366] hover:text-white flex items-center justify-center transition text-xs"
                                   title="Chat on WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center text-gray-400">
                            <i class="fas fa-inbox text-5xl text-gray-200 mb-3 block"></i>
                            <p class="font-semibold text-base text-gray-600">No bookings match your current filters.</p>
                            <p class="text-xs text-gray-400 mt-1">Try resetting the search terms or date ranges.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
        <div class="p-4 border-t border-gray-100">
            {{ $bookings->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
