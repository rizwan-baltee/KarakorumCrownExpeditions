@extends('layouts.app')

@section('title', 'Booking Status - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-16">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            @if($booking->status === 'Confirmed')
                <div class="w-24 h-24 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-8 border-2 border-green-400/30">
                    <i class="fas fa-check text-5xl text-green-400"></i>
                </div>
                <h1 class="font-display text-4xl md:text-5xl text-white mb-4">Your booking is confirmed</h1>
            @elseif($booking->status === 'Pending Payment')
                <div class="w-24 h-24 bg-amber-500/20 rounded-full flex items-center justify-center mx-auto mb-8 border-2 border-amber-400/30">
                    <i class="fas fa-credit-card text-5xl text-amber-400"></i>
                </div>
                <h1 class="font-display text-4xl md:text-5xl text-white mb-4">Booking pending payment</h1>
            @elseif($booking->status === 'Cancelled')
                <div class="w-24 h-24 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-8 border-2 border-red-400/30">
                    <i class="fas fa-times text-5xl text-red-400"></i>
                </div>
                <h1 class="font-display text-4xl md:text-5xl text-white mb-4">This booking was cancelled</h1>
            @else
                <div class="w-24 h-24 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-8 border-2 border-blue-400/30">
                    <i class="fas fa-clock text-5xl text-blue-400"></i>
                </div>
                <h1 class="font-display text-4xl md:text-5xl text-white mb-4">Booking received</h1>
            @endif

            <p class="text-white/60 text-lg mb-8">
                Reference No: <strong class="text-white">{{ $booking->reference_code }}</strong>
            </p>

            <div class="bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 p-8 text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-white/40 uppercase tracking-wider text-xs">Package</p>
                        <p class="text-white font-medium mt-1">{{ $booking->trendingTrek->title ?? 'Custom Tour' }}</p>
                    </div>
                    <div>
                        <p class="text-white/40 uppercase tracking-wider text-xs">Status</p>
                        <p class="text-white font-medium mt-1">{{ $booking->status }}</p>
                    </div>
                    <div>
                        <p class="text-white/40 uppercase tracking-wider text-xs">Travelers</p>
                        <p class="text-white font-medium mt-1">{{ $booking->guests }}</p>
                    </div>
                    <div>
                        <p class="text-white/40 uppercase tracking-wider text-xs">Country</p>
                        <p class="text-white font-medium mt-1">{{ $booking->country ?? 'N/A' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-white/40 uppercase tracking-wider text-xs">Dates</p>
                        <p class="text-white font-medium mt-1">
                            {{ $booking->start_date?->format('d M Y') ?? 'Flexible' }}
                            @if($booking->end_date)
                                → {{ $booking->end_date->format('d M Y') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking.track') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                    Track Another Booking
                </a>
                <a href="https://wa.me/923131562859" target="_blank" class="inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white bg-[#25D366] hover:bg-[#1fb855] transition-colors">
                    <i class="fab fa-whatsapp mr-2 text-lg"></i> WhatsApp Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
