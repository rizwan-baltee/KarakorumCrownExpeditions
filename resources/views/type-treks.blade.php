@extends('layouts.app')

@section('title', $type->name . ' - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-white/80 backdrop-blur-md">
                <i class="{{ $type->icon ?? 'fas fa-compass' }} text-brand-400"></i>
                {{ $type->name }}
            </div>
            <h1 class="mt-6 font-display text-4xl md:text-6xl text-white leading-tight">
                {{ $type->name }}
            </h1>
            @if($type->description)
                <p class="mt-4 text-lg text-white/70 leading-relaxed max-w-2xl">{{ $type->description }}</p>
            @endif
            <div class="mt-4 text-sm text-white/50">
                {{ $treks->total() }} {{ \Str::plural('experience', $treks->total()) }} available
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="container mx-auto px-4 lg:px-8">
        @if($treks->count())
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($treks as $trek)
                <x-trip-card :trek="$trek" />
            @endforeach
        </div>

        <div class="mt-12">
            {{ $treks->links() }}
        </div>

        <!-- Book Now Banner -->
        <div class="mt-12 bg-gradient-to-r from-brand-600 to-brand-700 rounded-3xl p-8 md:p-10 text-white text-center shadow-xl">
            <h3 class="font-display text-2xl md:text-3xl mb-3">Can't find exactly what you're looking for?</h3>
            <p class="text-white/80 mb-6 max-w-xl mx-auto">We can create a custom {{ strtolower($type->name) }} experience tailored to your schedule, budget, and interests.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking.create') }}" class="px-8 py-3.5 bg-white text-brand-700 rounded-xl font-bold hover:bg-slate-50 transition shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Request Custom Tour
                </a>
                <a href="https://wa.me/923131562859?text=Hi!%20I'm%20interested%20in%20{{ urlencode($type->name) }}" target="_blank" class="px-8 py-3.5 bg-[#25D366] text-white rounded-xl font-bold hover:bg-[#1fb855] transition shadow-lg">
                    <i class="fab fa-whatsapp mr-2"></i> Chat on WhatsApp
                </a>
            </div>
        </div>
        @else
        <div class="text-center py-20">
            <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="{{ $type->icon ?? 'fas fa-compass' }} text-3xl text-slate-300"></i>
            </div>
            <h3 class="text-2xl font-display text-slate-900">No {{ strtolower($type->name) }} available yet</h3>
            <p class="mt-3 text-slate-500 max-w-md mx-auto">We're currently curating experiences for this category. Check back soon or contact us for custom arrangements.</p>
            <a href="{{ route('home') }}" class="mt-6 inline-flex items-center gap-2 text-brand-700 font-semibold hover:text-brand-800">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
