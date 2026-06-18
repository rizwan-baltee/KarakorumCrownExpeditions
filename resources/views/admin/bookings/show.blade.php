@extends('admin.layouts.app')

@section('title', 'Booking #' . $booking->id)

@section('content')
<div class="p-6">
    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <div class="flex items-center gap-3">
                    <h1 class="text-2xl font-bold text-gray-800">Booking #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</h1>
                    @if($booking->isBooking())
                        <span class="px-2 py-0.5 text-[11px] font-semibold rounded-full bg-emerald-100 text-emerald-800">Booking</span>
                    @else
                        <span class="px-2 py-0.5 text-[11px] font-semibold rounded-full bg-indigo-100 text-indigo-800">Inquiry</span>
                    @endif
                    <span class="px-2.5 py-1 text-xs rounded-full {{ $booking->status_color }}">{{ $booking->status }}</span>
                </div>
                <p class="text-gray-500 text-sm mt-1">Submitted {{ $booking->created_at->format('d M Y \a\t g:i A') }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition text-sm">
                    <i class="fas fa-arrow-left mr-1"></i>Back
                </a>
                <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Delete this booking permanently?')">
                    @csrf @method('DELETE')
                    <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-sm"><i class="fas fa-trash mr-1"></i>Delete</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded"><p class="text-green-700">{{ session('success') }}</p></div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- LEFT COLUMN --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Guest Info --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="fas fa-user mr-2 text-emerald-600"></i>Guest Information</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Name</p>
                            <p class="font-semibold text-gray-800">{{ $booking->name }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Email</p>
                            <p class="font-semibold text-gray-800 text-sm">{{ $booking->email }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Phone / WhatsApp</p>
                            <p class="font-semibold text-gray-800">{{ $booking->phone }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Country</p>
                            <p class="font-semibold text-gray-800">{{ $booking->country ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Travelers</p>
                            <p class="font-semibold text-gray-800">{{ $booking->guests }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Type</p>
                            <p class="font-semibold text-gray-800">{{ ucfirst($booking->type) }}</p>
                        </div>
                    </div>
                </div>

                {{-- Trek Details --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="fas fa-mountain mr-2 text-emerald-600"></i>Trip Details</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Package</p>
                            <p class="font-semibold text-gray-800">{{ $booking->trendingTrek->title ?? 'Custom Tour Request' }}</p>
                        </div>
                        @if($booking->trendingTrek)
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Category</p>
                            <p class="font-semibold text-gray-800">{{ $booking->trendingTrek->type->name ?? '—' }}</p>
                        </div>
                        @endif
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">Start Date</p>
                            <p class="font-semibold text-gray-800">{{ $booking->start_date?->format('d M Y') ?? 'Flexible' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 uppercase tracking-wider">End Date</p>
                            <p class="font-semibold text-gray-800">{{ $booking->end_date?->format('d M Y') ?? 'Flexible' }}</p>
                        </div>
                    </div>

                    @if($booking->special_requirements)
                    <div class="mt-4 pt-4 border-t">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Special Requirements</p>
                        <p class="text-gray-700 text-sm bg-amber-50 p-3 rounded-lg">{{ $booking->special_requirements }}</p>
                    </div>
                    @endif

                    @if($booking->comment)
                    <div class="mt-4 pt-4 border-t">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Budget / Notes</p>
                        <p class="text-gray-700 text-sm">{{ $booking->comment }}</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- RIGHT COLUMN --}}
            <div class="space-y-6">
                {{-- Status Update --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="fas fa-sync-alt mr-2 text-emerald-600"></i>Update Status</h2>
                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                        @csrf @method('PATCH')
                        <div class="space-y-4">
                            <select name="status" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none text-sm">
                                @foreach(\App\Models\BookTour::STATUSES as $s)
                                    <option value="{{ $s }}" {{ $booking->status === $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="w-full py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition font-semibold text-sm">
                                <i class="fas fa-save mr-2"></i>Update Status
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Quick Actions --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="fas fa-bolt mr-2 text-emerald-600"></i>Quick Actions</h2>
                    <div class="space-y-2">
                        <a href="mailto:{{ $booking->email }}?subject=Re:%20Your%20booking%20request%20%23{{ $booking->id }}" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition text-sm">
                            <i class="fas fa-envelope"></i>Send Email
                        </a>
                        <a href="tel:{{ $booking->phone }}" class="flex items-center gap-3 px-4 py-3 bg-green-50 text-green-700 rounded-lg hover:bg-green-100 transition text-sm">
                            <i class="fas fa-phone"></i>Call Guest
                        </a>
                        <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $booking->phone), '0') }}" target="_blank" class="flex items-center gap-3 px-4 py-3 bg-[#25D366]/10 text-[#25D366] rounded-lg hover:bg-[#25D366]/20 transition text-sm">
                            <i class="fab fa-whatsapp"></i>WhatsApp
                        </a>
                        @if($booking->trendingTrek)
                        <a href="{{ route('trek.show', $booking->trendingTrek->slug) }}" target="_blank" class="flex items-center gap-3 px-4 py-3 bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100 transition text-sm">
                            <i class="fas fa-external-link-alt"></i>View Trek Page
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Booking Timeline --}}
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4"><i class="fas fa-clock mr-2 text-emerald-600"></i>Timeline</h2>
                    <div class="space-y-3 text-sm">
                        <div class="flex gap-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-gray-800 font-medium">Submitted</p>
                                <p class="text-gray-400 text-xs">{{ $booking->created_at->format('d M Y, g:i A') }}</p>
                            </div>
                        </div>
                        @if($booking->updated_at != $booking->created_at)
                        <div class="flex gap-3">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full mt-1.5 flex-shrink-0"></div>
                            <div>
                                <p class="text-gray-800 font-medium">Last Updated: {{ $booking->status }}</p>
                                <p class="text-gray-400 text-xs">{{ $booking->updated_at->format('d M Y, g:i A') }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
