@extends('admin.layouts.app')

@section('title', 'Booking #' . $booking->reference_code)

@section('content')
<div class="p-6">
    <div class="max-w-5xl mx-auto space-y-6">

        {{-- Header Bar --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-6 rounded-2xl border border-gray-100 shadow-xs">
            <div>
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="font-mono text-sm font-bold text-emerald-800 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200">
                        {{ $booking->reference_code }}
                    </span>
                    <span class="px-3 py-1 text-xs font-bold rounded-full {{ $booking->status_color }}">
                        {{ $booking->status }}
                    </span>
                    <span class="text-xs text-gray-400">·</span>
                    <span class="text-xs text-gray-500 font-semibold">{{ ucfirst($booking->type) }}</span>
                </div>
                <p class="text-gray-400 text-xs mt-2">
                    Submitted on {{ $booking->created_at->format('d M Y \a\t g:i A') }} ({{ $booking->created_at->diffForHumans() }})
                </p>
            </div>

            <div class="flex items-center gap-2 self-stretch sm:self-auto">
                <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition text-xs font-bold flex items-center gap-1.5">
                    <i class="fas fa-arrow-left"></i>
                    <span>All Bookings</span>
                </a>
                <a href="{{ route('booking.download', $booking->id) }}" target="_blank" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-xl transition text-xs font-bold flex items-center gap-1.5">
                    <i class="fas fa-print"></i>
                    <span>Print Voucher</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-xl text-emerald-800 text-sm flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            {{-- LEFT 8 COLUMNS: Customer & Trip Details --}}
            <div class="lg:col-span-8 space-y-6">

                {{-- Guest Details Card --}}
                <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-6">
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-user-circle text-emerald-600 text-lg"></i>
                        <span>Customer Information</span>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Full Name</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">{{ $booking->name }}</p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Email Address</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">
                                <a href="mailto:{{ $booking->email }}" class="text-blue-600 hover:underline">{{ $booking->email }}</a>
                            </p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Phone / WhatsApp</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">
                                <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $booking->phone), '0') }}" target="_blank" class="text-emerald-700 hover:underline flex items-center gap-1.5">
                                    <i class="fab fa-whatsapp text-emerald-600 text-sm"></i>
                                    <span>{{ $booking->phone }}</span>
                                </a>
                            </p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Country of Residence</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">{{ $booking->country ?: 'Not provided' }}</p>
                        </div>

                        @if($booking->dietary_requirements)
                        <div class="bg-gray-50 p-3.5 rounded-xl sm:col-span-2">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Dietary Requirements</span>
                            <p class="font-bold text-amber-800 text-sm mt-0.5">{{ $booking->dietary_requirements }}</p>
                        </div>
                        @endif

                        @if($booking->emergency_contact)
                        <div class="bg-gray-50 p-3.5 rounded-xl sm:col-span-2">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Emergency Contact</span>
                            <p class="font-bold text-gray-800 text-sm mt-0.5">{{ $booking->emergency_contact }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Trip & Party Details Card --}}
                <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-6">
                    <h2 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-mountain text-emerald-600 text-lg"></i>
                        <span>Trip & Reservation Details</span>
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                        <div class="bg-gray-50 p-3.5 rounded-xl sm:col-span-2">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Selected Expedition / Tour</span>
                            <p class="font-bold text-gray-900 text-base mt-0.5">{{ $booking->trendingTrek?->title ?: 'Custom Tour Inquiry' }}</p>
                            @if($booking->trendingTrek)
                                <p class="text-xs text-gray-500 mt-1">Category: {{ $booking->trendingTrek->type?->name }} · {{ $booking->trendingTrek->duration_days }} Days</p>
                            @endif
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Preferred Start Date</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">
                                {{ $booking->start_date ? $booking->start_date->format('d F Y') : 'Dates Flexible' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">End Date</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">
                                {{ $booking->end_date ? $booking->end_date->format('d F Y') : 'Flexible' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Party Size</span>
                            <p class="font-bold text-gray-900 text-sm mt-0.5">
                                {{ $booking->guests }} Total Travelers
                            </p>
                            <p class="text-gray-500 text-[11px] mt-0.5">
                                {{ $booking->adults ?: $booking->guests }} Adults{{ $booking->children > 0 ? ', ' . $booking->children . ' Children' : '' }}
                            </p>
                        </div>

                        <div class="bg-gray-50 p-3.5 rounded-xl">
                            <span class="text-gray-400 uppercase font-semibold text-[10px]">Package Tier & Style</span>
                            <p class="font-bold text-emerald-800 text-sm mt-0.5">
                                {{ $booking->package_tier ?: 'Standard' }} ({{ $booking->trip_type ?: 'Group' }})
                            </p>
                        </div>
                    </div>

                    {{-- Selected Add-ons --}}
                    @if(!empty($booking->selected_addons) && is_array($booking->selected_addons))
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <span class="text-gray-400 uppercase font-semibold text-[10px]">Selected Add-ons</span>
                        <ul class="mt-2 space-y-1.5 text-xs text-gray-700">
                            @foreach($booking->selected_addons as $addon)
                                @php $addonParts = explode(':', $addon); @endphp
                                <li class="flex items-center justify-between bg-slate-50 p-2.5 rounded-lg">
                                    <span class="font-medium">{{ $addonParts[0] ?? $addon }}</span>
                                    @if(isset($addonParts[1]))
                                        <span class="font-bold text-slate-900">+${{ $addonParts[1] }} USD</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($booking->special_requirements)
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <span class="text-gray-400 uppercase font-semibold text-[10px]">Customer Notes & Medical Info</span>
                        <p class="text-xs text-gray-700 bg-amber-50/70 p-3.5 rounded-xl mt-1.5 leading-relaxed whitespace-pre-line border border-amber-100">
                            {{ $booking->special_requirements }}
                        </p>
                    </div>
                    @endif
                </div>

            </div>

            {{-- RIGHT 4 COLUMNS: Status Manager & Internal Notes --}}
            <div class="lg:col-span-4 space-y-6">

                {{-- Status & Financial Editor --}}
                <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-6">
                    <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fas fa-edit text-emerald-600"></i>
                        <span>Update Status & Notes</span>
                    </h3>

                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Booking Status</label>
                            <select name="status" required class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm font-bold text-gray-800 outline-none focus:border-emerald-500">
                                @foreach(\App\Models\BookTour::STATUSES as $s)
                                    <option value="{{ $s }}" {{ $booking->status === $s ? 'selected' : '' }}>
                                        {{ $s }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Agreed Total Amount (USD)</label>
                            <input type="number" step="0.01" name="total_amount" value="{{ old('total_amount', $booking->total_amount) }}"
                                   class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-sm font-bold text-emerald-800 outline-none focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Internal Admin Notes (Staff Only)</label>
                            <textarea name="internal_notes" rows="4" placeholder="Private internal notes regarding deposit, visa LOI status, guide assignment..."
                                      class="w-full px-3.5 py-2.5 border border-gray-200 rounded-xl text-xs text-gray-700 outline-none focus:border-emerald-500 resize-none">{{ old('internal_notes', $booking->internal_notes) }}</textarea>
                        </div>

                        <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs transition-colors shadow-xs flex items-center justify-center gap-1.5">
                            <i class="fas fa-save"></i>
                            <span>Save Changes</span>
                        </button>
                    </form>
                </div>

                {{-- Direct Communications --}}
                <div class="bg-white rounded-2xl shadow-xs border border-gray-100 p-6 space-y-2.5">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Quick Contacts</h3>

                    <a href="https://wa.me/{{ ltrim(preg_replace('/[^0-9]/', '', $booking->phone), '0') }}?text={{ urlencode('Hello ' . $booking->name . '! This is Karakorum Crown Expeditions regarding your booking reference ' . $booking->reference_code . '.') }}"
                       target="_blank"
                       class="w-full py-2.5 px-4 rounded-xl bg-[#25D366]/10 text-[#25D366] hover:bg-[#25D366] hover:text-white transition-colors font-bold text-xs flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp text-sm"></i>
                        <span>WhatsApp Customer</span>
                    </a>

                    <a href="mailto:{{ $booking->email }}?subject={{ urlencode('Your Karakorum Crown Expeditions Booking - ' . $booking->reference_code) }}"
                       class="w-full py-2.5 px-4 rounded-xl bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white transition-colors font-bold text-xs flex items-center justify-center gap-2">
                        <i class="fas fa-envelope text-sm"></i>
                        <span>Send Official Email</span>
                    </a>

                    @if($booking->trendingTrek)
                        <a href="{{ route('trek.show', $booking->trendingTrek->slug) }}" target="_blank"
                           class="w-full py-2.5 px-4 rounded-xl bg-slate-50 text-slate-700 hover:bg-slate-200 transition-colors font-semibold text-xs flex items-center justify-center gap-2">
                            <i class="fas fa-external-link-alt text-xs"></i>
                            <span>View Public Trek Page</span>
                        </a>
                    @endif
                </div>

                {{-- Delete Action --}}
                <div class="pt-2">
                    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Permanently delete this booking record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 text-rose-600 hover:text-rose-800 text-xs font-semibold text-center transition-colors">
                            <i class="fas fa-trash-alt mr-1"></i> Delete Booking Record
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
