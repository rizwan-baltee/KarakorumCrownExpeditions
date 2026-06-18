@extends('layouts.app')

@section('title', 'Thank You - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-20">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center">
        <div class="max-w-2xl mx-auto">
            {{-- Success Icon --}}
            <div class="w-24 h-24 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-8 border-2 border-green-400/30">
                <i class="fas fa-check text-5xl text-green-400"></i>
            </div>

            <h1 class="font-display text-4xl md:text-5xl text-white mb-4">
                {{ $booking->isInquiry() ? 'Inquiry Received!' : 'Booking Request Sent!' }}
            </h1>

            <p class="text-white/60 text-lg mb-6">
                Thank you, <strong class="text-white">{{ $booking->name }}</strong>. Our team will review your
                {{ $booking->isInquiry() ? 'inquiry' : 'booking request' }} and get back to you within
                <strong class="text-white">24 hours</strong>.
            </p>

            {{-- Reference Code Banner --}}
            <div class="bg-gradient-to-r from-brand-500 to-brand-600 rounded-2xl p-6 md:p-8 mb-8 relative overflow-hidden shadow-2xl shadow-brand-500/20">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-2xl -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full blur-2xl translate-y-1/2 -translate-x-1/2"></div>
                </div>
                <div class="relative">
                    <p class="text-white/70 text-xs uppercase tracking-[0.2em] font-medium mb-2">Your Booking Reference</p>
                    <p class="text-white text-3xl md:text-5xl font-bold font-mono tracking-wider mb-2">{{ $booking->reference_code }}</p>
                    <p class="text-white/60 text-xs">Save this reference — you'll need it to track your booking</p>
                </div>
            </div>

            {{-- Download Button --}}
            <div class="mb-8">
                <a href="{{ route('booking.download', $booking->id) }}" target="_blank"
                   class="inline-flex items-center gap-2.5 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white rounded-xl px-6 py-3.5 font-semibold text-sm transition-all hover:scale-[1.02]">
                    <i class="fas fa-file-download text-brand-300"></i>
                    Download Booking Confirmation
                    <i class="fas fa-external-link-alt text-xs text-white/40"></i>
                </a>
                <p class="text-white/30 text-xs mt-2">Opens a printable page — use your browser's Print / Save as PDF</p>
            </div>

            {{-- Summary Card --}}
            <div class="bg-white/5 backdrop-blur-md rounded-3xl border border-white/10 p-8 text-left mb-10">
                <h3 class="text-white font-semibold text-sm uppercase tracking-wider mb-5">
                    <i class="fas fa-receipt mr-2 text-brand-400"></i> Request Summary
                </h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/50">Reference Code</span>
                        <span class="text-brand-300 font-bold font-mono tracking-wider">{{ $booking->reference_code }}</span>
                    </div>
                    @if($booking->trendingTrek)
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/50">Package</span>
                        <span class="text-white font-medium">{{ $booking->trendingTrek->title }}</span>
                    </div>
                    @endif
                    @if($booking->start_date)
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/50">Preferred Dates</span>
                        <span class="text-white font-medium">{{ $booking->start_date->format('d M') }} – {{ $booking->end_date?->format('d M Y') }}</span>
                    </div>
                    @endif
                    @if($booking->guests)
                    <div class="flex justify-between border-b border-white/10 pb-3">
                        <span class="text-white/50">Travelers</span>
                        <span class="text-white font-medium">{{ $booking->guests }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-white/50">Status</span>
                        <span class="text-green-400 font-medium">Received ✓</span>
                    </div>
                </div>
            </div>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-6">
                <a href="{{ route('home') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                    <i class="fas fa-home mr-2"></i> Back to Home
                </a>
                <a href="https://wa.me/923131562859?text=Hi!%20I%20just%20submitted%20a%20booking%20request%20({{ urlencode($booking->reference_code) }})%20on%20your%20website." target="_blank"
                   class="inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white bg-[#25D366] hover:bg-[#1fb855] transition-colors">
                    <i class="fab fa-whatsapp mr-2 text-lg"></i> Follow up on WhatsApp
                </a>
            </div>

            {{-- Track Booking Link --}}
            <div class="mb-8">
                <a href="{{ route('booking.track') }}" class="text-white/40 hover:text-white/70 text-sm underline underline-offset-4 transition-colors">
                    <i class="fas fa-search mr-1"></i> Track your booking status anytime
                </a>
            </div>

            <p class="text-white/30 text-sm">
                Confirmation email sent to <span class="text-white/60">{{ $booking->email }}</span>
            </p>
        </div>
    </div>
</section>
@endsection
