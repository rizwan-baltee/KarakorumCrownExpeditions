@extends('layouts.app')

@section('title', 'Booking Confirmation - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-20">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            {{-- Success Icon --}}
            <div class="w-20 h-20 bg-emerald-500/20 rounded-full flex items-center justify-center mx-auto mb-6 border-2 border-emerald-400/40 shadow-lg shadow-emerald-500/10">
                <i class="fas fa-check text-4xl text-emerald-400"></i>
            </div>

            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.25em] text-brand-300 backdrop-blur-md mb-4">
                Booking Request Received
            </span>

            <h1 class="font-display text-3xl sm:text-5xl font-bold text-white mb-3">
                Booking Confirmed
            </h1>

            <p class="text-white/80 text-base sm:text-lg mb-8 font-light">
                Thank you for choosing <strong class="text-white font-semibold">Karakorum Crown Expeditions</strong>.<br>
                Our travel team will review your booking and contact you shortly.
            </p>

            {{-- Reference Code Card --}}
            <div class="bg-gradient-to-r from-emerald-600 via-emerald-700 to-teal-800 rounded-3xl p-6 sm:p-8 mb-8 relative overflow-hidden shadow-2xl">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-36 h-36 bg-white rounded-full blur-2xl"></div>
                </div>
                <div class="relative">
                    <p class="text-white/80 text-xs uppercase tracking-[0.25em] font-bold mb-2">Your Booking Reference</p>
                    <p class="text-white text-3xl sm:text-5xl font-mono font-bold tracking-wider mb-2 select-all">{{ $booking->reference_code }}</p>
                    <div class="inline-flex items-center gap-2 rounded-full bg-white/20 px-3 py-1 text-xs text-white font-medium mt-1">
                        <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                        Status: Pending Confirmation
                    </div>
                </div>
            </div>

            {{-- Summary Card --}}
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl border border-white/15 p-6 sm:p-8 text-left mb-8 shadow-xl">
                <h3 class="text-white font-bold text-sm uppercase tracking-wider mb-5 flex items-center justify-between border-b border-white/10 pb-3">
                    <span class="flex items-center gap-2">
                        <i class="fas fa-receipt text-brand-400"></i>
                        <span>Trip & Traveler Summary</span>
                    </span>
                    <span class="text-xs text-white/50 font-normal">Reference: {{ $booking->reference_code }}</span>
                </h3>

                <div class="space-y-3.5 text-xs sm:text-sm">
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Trip / Expedition</span>
                        <span class="text-white font-bold text-right">{{ $booking->trendingTrek?->title ?: 'Custom Tour' }}</span>
                    </div>

                    @if($booking->start_date)
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Travel Date</span>
                        <span class="text-white font-medium">
                            {{ $booking->start_date->format('d F Y') }}
                            @if($booking->end_date)
                                → {{ $booking->end_date->format('d F Y') }}
                            @endif
                        </span>
                    </div>
                    @endif

                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Travelers</span>
                        <span class="text-white font-medium">
                            {{ $booking->guests }} Total
                            ({{ $booking->adults ?: $booking->guests }} Adults{{ $booking->children > 0 ? ', ' . $booking->children . ' Children' : '' }})
                        </span>
                    </div>

                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Package Tier</span>
                        <span class="text-white font-medium">
                            {{ $booking->package_tier ?: 'Standard' }} ({{ $booking->trip_type ?: 'Group' }})
                        </span>
                    </div>

                    @if($booking->total_amount && $booking->total_amount > 0)
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Quoted Amount</span>
                        <span class="text-brand-300 font-display font-bold text-base">
                            {{ $booking->formatted_total }}
                        </span>
                    </div>
                    @endif

                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/60">Customer Name</span>
                        <span class="text-white font-medium">{{ $booking->name }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-white/60">Email & Contact</span>
                        <span class="text-white font-medium text-right">{{ $booking->email }} · {{ $booking->phone }}</span>
                    </div>
                </div>
            </div>

            {{-- Action CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="{{ route('booking.download', $booking->id) }}" target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-white/15 hover:bg-white/25 border border-white/20 text-white px-6 py-4 font-bold text-sm transition-all shadow-md">
                    <i class="fas fa-file-download text-brand-300"></i>
                    <span>Download Booking Summary</span>
                </a>

                <a href="https://wa.me/923425343629?text={{ urlencode('Hello! I have submitted booking reference: ' . $booking->reference_code . ' for ' . ($booking->trendingTrek?->title ?: 'Karakoram trip') . '. Looking forward to confirmation!') }}"
                   target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-xl px-7 py-4 font-bold text-sm text-white bg-[#25D366] hover:bg-[#1fb855] transition-all shadow-lg">
                    <i class="fab fa-whatsapp text-lg"></i>
                    <span>WhatsApp Travel Expert</span>
                </a>

                <a href="{{ route('home') }}"
                   class="btn-primary inline-flex items-center justify-center gap-2 rounded-xl px-7 py-4 font-bold text-sm text-white shadow-lg">
                    <i class="fas fa-home"></i>
                    <span>Return Home</span>
                </a>
            </div>

            {{-- Tracking Note --}}
            <div class="text-xs text-white/50">
                <span>You can track your status anytime with your reference at</span>
                <a href="{{ route('booking.track') }}" class="text-brand-300 hover:underline font-semibold ml-1">
                    Booking Tracker
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
