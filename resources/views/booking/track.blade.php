@extends('layouts.app')

@section('title', 'Track Booking - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-16">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-white/80 backdrop-blur-md mb-6">
                <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                Track your booking
            </div>
            <h1 class="font-display text-4xl md:text-5xl text-white leading-tight">
                Check your booking status
            </h1>
            <p class="mt-4 text-white/60 text-lg max-w-xl mx-auto">
                Enter your booking reference number and email to see whether your booking is new, contacted, confirmed, or completed.
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-3xl border border-slate-200 shadow-lg p-8 md:p-10">
                @if(session('error'))
                    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700 text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('booking.lookup') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Booking Reference Number *</label>
                        <input type="text" name="reference_code" value="{{ old('reference_code') }}" required placeholder="DGH-2026-XXXXXX"
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 outline-none">
                        @error('reference_code')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Email Address *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="your@email.com"
                               class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:border-brand-500 focus:ring-2 focus:ring-brand-100 outline-none">
                        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="w-full py-4 rounded-xl bg-navy-950 text-white font-semibold hover:bg-slate-800 transition-colors">
                        Track Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
