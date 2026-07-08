@extends('layouts.app')

@section('title', $trek->title . ' - Karakorum Crown Expeditions')

@push('styles')
    .faq-panel[hidden] { display: none; }
    .gallery-scroll { scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none; }
    .gallery-scroll::-webkit-scrollbar { display: none; }
    .price-row:hover { background: rgba(212, 168, 83, 0.04); }
@endpush

@section('content')

    <div class="fixed bottom-4 left-4 right-4 z-40 lg:hidden">
        <div class="grid grid-cols-2 gap-3">
            <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-4 py-3 text-sm font-semibold text-white shadow-xl">
                <i class="fas fa-calendar-check mr-2"></i> Book This Tour
            </a>
            <a href="{{ route('booking.create', ['trek' => $trek->slug, 'mode' => 'inquiry']) }}" class="inline-flex items-center justify-center rounded-xl px-4 py-3 text-sm font-semibold text-white bg-[#25D366] shadow-xl">
                <i class="fas fa-route mr-2"></i> Custom Tour
            </a>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════
         HERO SECTION — Full-width image + trek info
    ═══════════════════════════════════════════════ --}}
    <section class="relative min-h-[75vh] flex items-end overflow-hidden bg-navy-950">
        <div class="absolute inset-0">
            @if($trek->galleries->where('is_featured', true)->first())
                <img src="{{ $trek->galleries->where('is_featured', true)->first()->full_image_url }}" alt="{{ $trek->title }}" class="h-full w-full object-cover">
            @elseif($trek->galleries->first())
                <img src="{{ $trek->galleries->first()->full_image_url }}" alt="{{ $trek->title }}" class="h-full w-full object-cover">
            @else
                <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="{{ $trek->title }}" class="h-full w-full object-cover opacity-60">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/60 to-navy-950/30"></div>
        </div>

        <div class="relative w-full pb-12 md:pb-16">
            <div class="container mx-auto px-4 lg:px-8">
                {{-- Breadcrumb --}}
                <div class="mb-4 text-sm text-white/50">
                    <a href="{{ route('home') }}" class="hover:text-white/80 transition-colors">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('type.index', $trek->type->slug) }}" class="hover:text-white/80 transition-colors">{{ $trek->type->name ?? 'Experiences' }}</a>
                    <span class="mx-2">/</span>
                    <span class="text-white/80">{{ $trek->title }}</span>
                </div>

                <div class="max-w-3xl">
                    @if($trek->type)
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-white/8 px-3 py-1 text-xs uppercase tracking-[0.2em] text-white/70 backdrop-blur-md mb-4">
                            <i class="{{ $trek->type->icon ?? 'fas fa-compass' }} text-brand-400"></i>
                            {{ $trek->type->name }}
                        </span>
                    @endif

                    <h1 class="font-display text-4xl md:text-6xl text-white leading-tight">{{ $trek->title }}</h1>

                    <div class="mt-4 flex flex-wrap items-center gap-4 text-white/70 text-sm">
                        @if($trek->location)
                            <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-brand-400"></i> {{ $trek->location }}</span>
                        @endif
                        <span class="flex items-center gap-1.5"><i class="fas fa-clock text-brand-400"></i> {{ $trek->duration_days }} {{ \Str::plural('day', $trek->duration_days) }}</span>
                        <span class="flex items-center gap-1.5"><i class="fas fa-signal text-brand-400"></i> Level {{ $trek->difficulty_level }}/5</span>
                        @if($trek->height_meters)
                            <span class="flex items-center gap-1.5"><i class="fas fa-mountain text-brand-400"></i> {{ number_format($trek->height_meters) }}m</span>
                        @endif
                    </div>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 text-base font-semibold text-white">
                            <i class="fas fa-calendar-check mr-2"></i> Book This Tour
                        </a>
                        <a href="{{ route('booking.create', ['trek' => $trek->slug, 'mode' => 'inquiry']) }}" class="inline-flex items-center justify-center rounded-xl px-7 py-4 text-base font-semibold text-white bg-[#25D366] hover:bg-[#1fb855] transition-colors">
                            <i class="fas fa-route mr-2"></i> Request Custom Tour
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         QUICK STATS BAR
    ═══════════════════════════════════════════════ --}}
    <section class="bg-white border-b border-slate-200">
        <div class="container mx-auto px-4 lg:px-8 py-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] uppercase text-slate-400">Duration</p>
                    <p class="mt-2 text-lg font-bold text-slate-900">{{ $trek->duration_days }} days</p>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] uppercase text-slate-400">Difficulty</p>
                    <p class="mt-2 text-lg font-bold text-slate-900">Level {{ $trek->difficulty_level }}/5</p>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] uppercase text-slate-400">Group Size</p>
                    <p class="mt-2 text-lg font-bold text-slate-900">Up to {{ $trek->max_guests }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] uppercase text-slate-400">Min Age</p>
                    <p class="mt-2 text-lg font-bold text-slate-900">{{ $trek->min_age }}+</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3">
                <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-100">
                    <h3 class="font-display text-xl text-slate-900">Customer Reviews</h3>
                    <p class="mt-3 text-sm text-slate-600">Travelers love our clear communication, local expertise, and well-managed logistics.</p>
                </div>
                <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-100">
                    <h3 class="font-display text-xl text-slate-900">Safety Information</h3>
                    <p class="mt-3 text-sm text-slate-600">Licensed guides, route planning, weather awareness, and support for remote trips.</p>
                </div>
                <div class="rounded-3xl bg-white p-6 shadow-sm border border-slate-100">
                    <h3 class="font-display text-xl text-slate-900">Response Time</h3>
                    <p class="mt-3 text-sm text-slate-600">We respond to booking and inquiry requests within 24 hours, often much sooner.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         GALLERY — Horizontal scroll
    ═══════════════════════════════════════════════ --}}
    @if($trek->galleries->count())
    <section class="bg-white py-12">
        <div class="container mx-auto px-4 lg:px-8">
            <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600 mb-3">Gallery</p>
            <h2 class="font-display text-3xl text-slate-900 mb-8">Moments from this journey</h2>
            <div class="flex gap-4 overflow-x-auto gallery-scroll pb-4">
                @foreach($trek->galleries as $gallery)
                    <img src="{{ $gallery->full_image_url }}"
                         alt="{{ $gallery->title ?? $trek->title }}"
                         class="h-64 md:h-80 w-auto flex-shrink-0 rounded-2xl object-cover hover:opacity-90 transition-opacity cursor-pointer"
                         loading="lazy">
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ═══════════════════════════════════════════════
         MAIN CONTENT — Overview + Sidebar
    ═══════════════════════════════════════════════ --}}
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-3">

                {{-- LEFT: Overview, Pricing, Details --}}
                <div class="lg:col-span-2 space-y-12">

                    {{-- Overview --}}
                    @if($trek->overview || $trek->description)
                    <div>
                        <h2 class="font-display text-3xl md:text-4xl text-slate-900 mb-5">Overview</h2>
                        <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-base">
                            {!! nl2br(e($trek->overview ?? $trek->description)) !!}
                        </div>
                    </div>
                    @endif

                    {{-- Pricing --}}
                    @if($trek->prices->count())
                    <div>
                        <h2 class="font-display text-3xl md:text-4xl text-slate-900 mb-5">Pricing</h2>

                        {{-- Group Pricing Summary --}}
                        @php
                            $groupPrices = $trek->prices->unique('group_type');
                        @endphp
                        @if($groupPrices->count())
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                            <div class="px-6 py-4 bg-navy-950">
                                <h3 class="font-semibold text-white text-sm uppercase tracking-wider">Price by Group Type</h3>
                            </div>
                            <div class="divide-y divide-slate-100">
                                @foreach($groupPrices as $gp)
                                <div class="flex items-center justify-between px-6 py-4 price-row transition-colors">
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $gp->group_type }}</p>
                                        <p class="text-sm text-slate-500 mt-0.5">
                                            @if($gp->min_persons == $gp->max_persons)
                                                {{ $gp->min_persons }} person
                                            @else
                                                {{ $gp->min_persons }} – {{ $gp->max_persons }} persons
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xl font-bold text-brand-700">${{ number_format($gp->price_usd, 0) }}</p>
                                        <p class="text-xs text-slate-400">USD per person</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Scheduled Departures --}}
                        @php
                            $scheduled = $trek->prices->whereNotNull('start_date')->sortBy('start_date');
                        @endphp
                        @if($scheduled->count())
                        <div class="mt-6 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                            <div class="px-6 py-4 bg-navy-950">
                                <h3 class="font-semibold text-white text-sm uppercase tracking-wider">Scheduled Departures</h3>
                            </div>
                            <div class="divide-y divide-slate-100">
                                @foreach($scheduled as $sp)
                                <div class="flex items-center justify-between px-6 py-4 price-row transition-colors">
                                    <div>
                                        <p class="font-semibold text-slate-900">
                                            {{ $sp->start_date ? \Carbon\Carbon::parse($sp->start_date)->format('d M Y') : 'TBD' }}
                                            → {{ $sp->end_date ? \Carbon\Carbon::parse($sp->end_date)->format('d M Y') : 'TBD' }}
                                        </p>
                                        <p class="text-sm text-slate-500 mt-0.5">
                                            @if($sp->min_persons == $sp->max_persons)
                                                {{ $sp->min_persons }} person
                                            @else
                                                {{ $sp->min_persons }}–{{ $sp->max_persons }} persons
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-brand-700">${{ number_format($sp->price_usd, 0) }}</p>
                                        @if($sp->availability === 'Available')
                                            <span class="inline-block mt-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-green-100 text-green-700 rounded-full">Available</span>
                                        @elseif($sp->availability === 'Limited')
                                            <span class="inline-block mt-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-amber-100 text-amber-700 rounded-full">Limited</span>
                                        @else
                                            <span class="inline-block mt-1 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider bg-red-100 text-red-700 rounded-full">Sold Out</span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- Trek Details --}}
                    <div>
                        <h2 class="font-display text-3xl md:text-4xl text-slate-900 mb-5">Trek Details</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @php
                                $details = [
                                    ['icon' => 'fas fa-map-marker-alt', 'label' => 'Location', 'value' => $trek->location],
                                    ['icon' => 'fas fa-clock', 'label' => 'Duration', 'value' => $trek->duration_days . ' ' . \Str::plural('day', $trek->duration_days)],
                                    ['icon' => 'fas fa-signal', 'label' => 'Difficulty', 'value' => 'Level ' . $trek->difficulty_level . '/5'],
                                    ['icon' => 'fas fa-mountain', 'label' => 'Max Altitude', 'value' => $trek->height_meters ? number_format($trek->height_meters) . 'm' : 'N/A'],
                                    ['icon' => 'fas fa-users', 'label' => 'Max Group', 'value' => $trek->max_guests . ' persons'],
                                    ['icon' => 'fas fa-user-check', 'label' => 'Min Age', 'value' => $trek->min_age . '+ years'],
                                    ['icon' => 'fas fa-globe', 'label' => 'Languages', 'value' => $trek->languages_support ?? 'All'],
                                    ['icon' => 'fas fa-tag', 'label' => 'Category', 'value' => $trek->type->name ?? 'N/A'],
                                ];
                            @endphp
                            @foreach(array_filter($details, fn($d) => $d['value'] !== 'N/A') as $detail)
                            <div class="flex items-center gap-3 rounded-xl bg-white border border-slate-200 p-4">
                                <div class="w-10 h-10 rounded-lg bg-brand-50 flex items-center justify-center flex-shrink-0">
                                    <i class="{{ $detail['icon'] }} text-brand-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase tracking-wider">{{ $detail['label'] }}</p>
                                    <p class="font-semibold text-slate-900 text-sm">{{ $detail['value'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Booking Sidebar --}}
                <div class="lg:col-span-1">
                    <div class="lg:sticky lg:top-28 space-y-6">

                        {{-- Price Card --}}
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-lg p-7">
                            <div class="mb-6">
                                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Starting from</p>
                                <p class="mt-1 text-4xl font-display text-slate-900">
                                    @if($trek->prices->isNotEmpty())
                                        ${{ number_format($trek->prices->min('price_usd'), 0) }}
                                    @else
                                        Price on Request
                                    @endif
                                </p>
                                <p class="text-sm text-slate-500 mt-1">per person</p>
                            </div>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center gap-3 text-sm text-slate-600">
                                    <i class="fas fa-check text-brand-600 w-4"></i>
                                    <span>Professional local guide</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-600">
                                    <i class="fas fa-check text-brand-600 w-4"></i>
                                    <span>Accommodation & meals</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-600">
                                    <i class="fas fa-check text-brand-600 w-4"></i>
                                    <span>Permits & logistics</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-600">
                                    <i class="fas fa-check text-brand-600 w-4"></i>
                                    <span>Emergency support</span>
                                </div>
                            </div>

                            <a href="{{ route('booking.create') }}?trek={{ $trek->slug }}"
                               class="block w-full text-center py-4 rounded-xl bg-gradient-to-r from-brand-600 to-brand-700 text-white font-bold text-lg hover:from-brand-700 hover:to-brand-800 transition-all shadow-lg hover:shadow-xl">
                                <i class="fas fa-calendar-check mr-2"></i> Book This Tour
                            </a>

                            <a href="https://wa.me/923425343629?text=Hi!%20I'm%20interested%20in%20the%20{{ urlencode($trek->title) }}%20trek." target="_blank"
                               class="block w-full text-center py-4 mt-3 rounded-xl bg-[#25D366] text-white font-semibold hover:bg-[#1fb855] transition-colors">
                                <i class="fab fa-whatsapp mr-2 text-lg"></i> Book via WhatsApp
                            </a>

                            <a href="mailto:karakorumcrownexpeditions@gmail.com
?subject=Booking%20Inquiry%20–%20{{ urlencode($trek->title) }}"
                               class="block w-full text-center py-4 mt-3 rounded-xl border-2 border-slate-200 text-slate-700 font-semibold hover:border-brand-500 hover:text-brand-700 transition-colors">
                                <i class="fas fa-envelope mr-2"></i> Email Inquiry
                            </a>

                            <a href="tel:+923425343629"
                               class="block w-full text-center py-3 mt-3 rounded-xl border border-slate-200 text-slate-500 font-medium hover:border-brand-500 hover:text-brand-700 transition-colors text-sm">
                                <i class="fas fa-phone-alt mr-2"></i> Call Us
                            </a>
                        </div>

                        {{-- Why Book With Us --}}
                        <div class="bg-navy-950 rounded-3xl p-7 text-white">
                            <h3 class="font-display text-xl mb-4">Why book with us?</h3>
                            <div class="space-y-3 text-sm text-white/70">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-shield-alt text-brand-400 mt-0.5"></i>
                                    <span>Licensed & government-certified operator</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-users text-brand-400 mt-0.5"></i>
                                    <span>Small groups, personal attention</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-headset text-brand-400 mt-0.5"></i>
                                    <span>24/7 emergency support on the trail</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-heart text-brand-400 mt-0.5"></i>
                                    <span>Local experts who know every route</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         FINAL CTA
    ═══════════════════════════════════════════════ --}}
    <section class="bg-navy-950 py-16 text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-8 md:p-12 backdrop-blur text-center max-w-3xl mx-auto">
                <h2 class="font-display text-3xl md:text-4xl">Ready to start this adventure?</h2>
                <p class="mt-4 text-white/60">Tell us your travel dates and we'll put together a plan that fits your pace, fitness level, and interests.</p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/923425343629" target="_blank" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                        <i class="fab fa-whatsapp mr-2 text-lg"></i> WhatsApp Us
                    </a>
                    <a href="mailto:karakorumcrownexpeditions@gmail.com
" class="btn-outline-light inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                        <i class="fas fa-envelope mr-2"></i> Email Inquiry
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
