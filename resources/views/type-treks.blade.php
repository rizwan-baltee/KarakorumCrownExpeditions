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
            <article class="premium-card group overflow-hidden rounded-3xl bg-white shadow-lg border border-slate-100">
                <div class="relative h-64 overflow-hidden">
                    @if($trek->galleries->where('is_featured', true)->first())
                        <img src="{{ asset('storage/' . $trek->galleries->where('is_featured', true)->first()->image_path) }}" alt="{{ $trek->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @elseif($trek->galleries->first())
                        <img src="{{ asset('storage/' . $trek->galleries->first()->image_path) }}" alt="{{ $trek->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="h-full w-full bg-gradient-to-br from-navy-800 to-navy-950 flex items-center justify-center">
                            <i class="{{ $type->icon ?? 'fas fa-mountain' }} text-5xl text-white/20"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4 flex gap-2">
                        @if($trek->is_trending)
                            <span class="bg-brand-500 text-white text-xs font-bold px-3 py-1 rounded-full">🔥 Trending</span>
                        @endif
                        <span class="bg-navy-900/80 text-white text-xs font-semibold px-3 py-1 rounded-full backdrop-blur-sm">
                            {{ $trek->duration_days }} {{ \Str::plural('day', $trek->duration_days) }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xs font-semibold uppercase tracking-wider text-brand-600 bg-brand-50 px-2.5 py-0.5 rounded-full">{{ $type->name }}</span>
                        <span class="text-xs text-slate-400">·</span>
                        <span class="text-xs text-slate-500">{{ $trek->location }}</span>
                    </div>
                    <h3 class="font-display text-xl text-slate-900 group-hover:text-brand-700 transition-colors">{{ $trek->title }}</h3>
                    <p class="mt-2 text-sm text-slate-500 line-clamp-2">{{ \Str::limit(strip_tags($trek->description ?? $trek->overview ?? ''), 120) }}</p>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center gap-3 text-xs text-slate-500">
                            <span><i class="fas fa-signal mr-1"></i>Level {{ $trek->difficulty_level }}/5</span>
                            @if($trek->height_meters)
                                <span><i class="fas fa-mountain mr-1"></i>{{ number_format($trek->height_meters) }}m</span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('trek.show', $trek->slug) }}" class="text-sm font-semibold text-slate-600 hover:text-slate-800 transition-colors">
                                <i class="fas fa-info-circle"></i>
                            </a>
                            <a href="{{ route('booking.create') }}?trek={{ $trek->slug }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-white bg-gradient-to-r from-brand-600 to-brand-700 px-3 py-1.5 rounded-lg hover:from-brand-700 hover:to-brand-800 transition-all shadow-sm">
                                <i class="fas fa-calendar-check text-xs"></i> Book
                            </a>
                        </div>
                    </div>
                </div>
            </article>
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
