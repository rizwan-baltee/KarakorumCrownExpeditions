@extends('layouts.app')

@section('title', $trek->title . ' - Karakorum Crown Expeditions')

@push('styles')
    .faq-panel[hidden], .itinerary-panel[hidden] { display: none; }
    .gallery-scroll { scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none; }
    .gallery-scroll::-webkit-scrollbar { display: none; }
    .package-card { transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .package-card:hover { transform: translateY(-6px); }
@endpush

@section('content')

    {{-- ═══════════════════════════════════════════════
         STICKY MOBILE BOOKING BAR
    ═══════════════════════════════════════════════ --}}
    <div class="fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200 py-3 px-4 shadow-2xl lg:hidden">
        <div class="flex items-center justify-between gap-3 max-w-lg mx-auto">
            <div class="min-w-0 flex-1">
                <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400 truncate">Starting From</p>
                <p class="text-lg font-display font-bold text-slate-900 leading-tight">
                    {{ $trek->starting_price_formatted }}
                    <span class="text-xs text-slate-500 font-sans font-normal">/ person</span>
                </p>
            </div>
            <div class="flex items-center gap-2">
                <a href="https://wa.me/923425343629?text={{ urlencode('Hi Karakorum Crown Expeditions! I am interested in: ' . $trek->title) }}"
                   target="_blank"
                   class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-[#25D366] text-white shadow-md hover:bg-[#1fb855] transition-colors"
                   title="Chat with expert on WhatsApp">
                    <i class="fab fa-whatsapp text-lg"></i>
                </a>
                <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}"
                   class="btn-primary inline-flex items-center justify-center rounded-xl px-5 py-2.5 text-sm font-bold text-white shadow-lg">
                    <i class="fas fa-calendar-check mr-2"></i> Book Now
                </a>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════
         HERO SECTION — Destination Image & Primary Info
    ═══════════════════════════════════════════════ --}}
    <section class="relative min-h-[80vh] flex items-end overflow-hidden bg-navy-950 pt-28 pb-14 md:pb-20">
        <div class="absolute inset-0">
            <img src="{{ $trek->primary_image_url }}"
                 alt="{{ $trek->title }}"
                 class="h-full w-full object-cover opacity-75">
            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/65 to-navy-950/30"></div>
            <div class="absolute inset-0 hero-glow"></div>
        </div>

        <div class="relative w-full">
            <div class="container mx-auto px-4 lg:px-8">
                {{-- Breadcrumb --}}
                <nav class="mb-5 flex items-center gap-2 text-xs md:text-sm text-white/60">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span>/</span>
                    @if($trek->type)
                        <a href="{{ route('type.index', $trek->type->slug) }}" class="hover:text-white transition-colors">{{ $trek->type->name }}</a>
                        <span>/</span>
                    @endif
                    <span class="text-white font-medium truncate max-w-xs md:max-w-md">{{ $trek->title }}</span>
                </nav>

                <div class="grid lg:grid-cols-12 gap-8 items-end">
                    {{-- Left Title & Badges --}}
                    <div class="lg:col-span-8 text-white">
                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            @if($trek->type)
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs uppercase tracking-[0.2em] font-semibold text-brand-300 backdrop-blur-md">
                                    <i class="{{ $trek->type->icon ?? 'fas fa-compass' }} text-brand-400"></i>
                                    {{ $trek->type->name }}
                                </span>
                            @endif

                            @if($trek->is_trending)
                                <span class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 px-3 py-1 text-xs uppercase tracking-wider font-bold text-white shadow-sm">
                                    <i class="fas fa-fire-alt text-[10px]"></i> Popular Expedition
                                </span>
                            @endif

                            <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-white/5 px-3 py-1 text-xs text-white/80 backdrop-blur-md">
                                <i class="fas fa-check-circle text-brand-400 text-xs"></i> 100% Guaranteed Departures
                            </span>
                        </div>

                        <h1 class="font-display text-4xl md:text-6xl lg:text-7xl font-bold leading-[1.1] text-balance">
                            {{ $trek->title }}
                        </h1>

                        {{-- Metadata bar --}}
                        <div class="mt-6 flex flex-wrap items-center gap-4 md:gap-6 text-sm text-white/80">
                            @if($trek->location)
                                <span class="inline-flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt text-brand-400"></i>
                                    <span>{{ $trek->location }}</span>
                                </span>
                            @endif
                            <span class="inline-flex items-center gap-2">
                                <i class="far fa-clock text-brand-400"></i>
                                <span>{{ $trek->duration_days }} {{ \Str::plural('Day', $trek->duration_days) }}</span>
                            </span>
                            <span class="inline-flex items-center gap-2">
                                <i class="fas fa-signal text-brand-400"></i>
                                <span>Level {{ $trek->difficulty_level }}/5 ({{ $trek->difficulty_label }})</span>
                            </span>
                            @if($trek->height_meters)
                                <span class="inline-flex items-center gap-2">
                                    <i class="fas fa-mountain text-brand-400"></i>
                                    <span>{{ number_format($trek->height_meters) }}m</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Right Hero Card (Starting Price & CTA) --}}
                    <div class="lg:col-span-4">
                        <div class="rounded-3xl border border-white/20 bg-white/10 p-6 md:p-8 backdrop-blur-xl shadow-2xl text-white">
                            <p class="text-xs uppercase font-semibold tracking-[0.2em] text-brand-300">Guaranteed Experience</p>
                            <div class="mt-2 flex items-baseline gap-2">
                                <span class="font-display text-4xl md:text-5xl font-bold text-white tracking-tight">
                                    {{ $trek->starting_price_formatted }}
                                </span>
                                @if($trek->calculated_starting_price)
                                    <span class="text-sm text-white/70">/ person</span>
                                @endif
                            </div>
                            <p class="mt-2 text-xs text-white/70">
                                Guided by licensed Karakoram mountain guides. Includes all park permits, accommodation & transport.
                            </p>

                            <div class="mt-6 space-y-3">
                                <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}"
                                   class="btn-primary flex w-full items-center justify-center gap-2 rounded-xl py-4 text-center font-bold text-base text-white shadow-lg hover:shadow-xl transition-all">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Book This Trip</span>
                                </a>

                                <a href="https://wa.me/923425343629?text={{ urlencode('Hello! I would like to inquire about booking the ' . $trek->title . '.') }}"
                                   target="_blank"
                                   class="flex w-full items-center justify-center gap-2 rounded-xl border border-white/30 bg-white/5 py-3.5 text-center font-semibold text-sm text-white hover:bg-white/15 transition-all">
                                    <i class="fab fa-whatsapp text-lg text-[#25D366]"></i>
                                    <span>Talk to a Travel Expert</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         QUICK INFORMATION — 8 Visual Key Facts Cards
    ═══════════════════════════════════════════════ --}}
    <section class="bg-white border-b border-slate-200 py-10">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                {{-- Duration --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-brand-50 flex items-center justify-center text-brand-700 mb-2">
                        <i class="far fa-clock text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Duration</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base">{{ $trek->duration_days }} Days</p>
                </div>

                {{-- Difficulty --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-amber-50 flex items-center justify-center text-amber-700 mb-2">
                        <i class="fas fa-signal text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Difficulty</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base">{{ $trek->difficulty_label }}</p>
                </div>

                {{-- Max Group Size --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-blue-50 flex items-center justify-center text-blue-700 mb-2">
                        <i class="fas fa-users text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Group Size</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base">Max {{ $trek->max_guests ?: 12 }}</p>
                </div>

                {{-- Starting Point --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-700 mb-2">
                        <i class="fas fa-plane-departure text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Start Point</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base truncate" title="{{ $trek->starting_point ?: 'Islamabad' }}">
                        {{ $trek->starting_point ?: 'Islamabad' }}
                    </p>
                </div>

                {{-- Ending Point --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-purple-50 flex items-center justify-center text-purple-700 mb-2">
                        <i class="fas fa-flag-checkered text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">End Point</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base truncate" title="{{ $trek->ending_point ?: 'Skardu' }}">
                        {{ $trek->ending_point ?: 'Skardu' }}
                    </p>
                </div>

                {{-- Best Season --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-amber-50 flex items-center justify-center text-amber-700 mb-2">
                        <i class="fas fa-sun text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Best Season</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base truncate" title="{{ $trek->best_season ?: 'Jun to Sep' }}">
                        {{ $trek->best_season ?: 'Jun to Sep' }}
                    </p>
                </div>

                {{-- Accommodation --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-700 mb-2">
                        <i class="fas fa-campground text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Stay</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base truncate" title="{{ $trek->accommodation_type ?: 'Hotel & Camp' }}">
                        {{ $trek->accommodation_type ?: 'Hotel & Camp' }}
                    </p>
                </div>

                {{-- Transportation --}}
                <div class="rounded-2xl bg-slate-50 border border-slate-200/80 p-4 text-center hover:border-brand-300 transition-colors">
                    <div class="w-10 h-10 mx-auto rounded-xl bg-teal-50 flex items-center justify-center text-teal-700 mb-2">
                        <i class="fas fa-shuttle-van text-lg"></i>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Transport</p>
                    <p class="mt-1 font-bold text-slate-900 text-sm md:text-base truncate" title="{{ $trek->transport_type ?: '4x4 Jeeps' }}">
                        {{ $trek->transport_type ?: '4x4 Jeeps' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         MAIN CONTENT SECTION
    ═══════════════════════════════════════════════ --}}
    <section class="py-16 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-12">

                {{-- LEFT COLUMN: Details, Itinerary, Inclusions, Gallery, FAQs --}}
                <div class="lg:col-span-8 space-y-16">

                    {{-- 1. About This Trip / Concise Overview --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10">
                        <div class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-4">
                            <i class="fas fa-mountain"></i> The Journey
                        </div>
                        <h2 class="font-display text-3xl md:text-4xl font-bold text-slate-900">
                            About This Trip
                        </h2>

                        <div class="mt-6 text-slate-600 leading-relaxed text-base space-y-4">
                            @if($trek->overview)
                                <p class="text-lg text-slate-800 font-medium leading-relaxed">
                                    {{ $trek->overview }}
                                </p>
                            @endif

                            @if($trek->description)
                                <div class="prose prose-slate max-w-none text-slate-600">
                                    {!! nl2br(e($trek->description)) !!}
                                </div>
                            @endif

                            @if(!$trek->overview && !$trek->description)
                                <p>
                                    Experience the breathtaking beauty of Gilgit-Baltistan with our signature expedition. Curated specifically for adventure travelers seeking authentic mountain experiences with the highest standards of safety, professional local guiding, and high-altitude logistics.
                                </p>
                            @endif
                        </div>

                        {{-- Quick Highlights Callout --}}
                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-4 pt-6 border-t border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase tracking-wider">Safety & Permits</p>
                                    <p class="text-sm font-bold text-slate-800">100% Fully Managed</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-language"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase tracking-wider">Guide Languages</p>
                                    <p class="text-sm font-bold text-slate-800">{{ $trek->languages_support ?: 'English & Local' }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 uppercase tracking-wider">Minimum Age</p>
                                    <p class="text-sm font-bold text-slate-800">{{ $trek->min_age ?: 16 }}+ Years</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Itinerary Accordion / Day-by-Day Timeline --}}
                    @php
                        $itineraryItems = is_string($trek->itinerary) ? json_decode($trek->itinerary, true) : $trek->itinerary;
                    @endphp
                    @if(!empty($itineraryItems) && is_array($itineraryItems))
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                            <div>
                                <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-2">
                                    <i class="fas fa-route"></i> Day-by-Day Journey
                                </span>
                                <h2 class="font-display text-3xl font-bold text-slate-900">
                                    Detailed Itinerary
                                </h2>
                            </div>
                            <button type="button" id="toggle-all-itinerary" class="text-xs font-semibold text-brand-700 hover:text-brand-800 self-start sm:self-auto bg-slate-100 hover:bg-slate-200 px-4 py-2 rounded-xl transition-colors">
                                <i class="fas fa-expand-alt mr-1"></i> Expand All Days
                            </button>
                        </div>

                        <div class="space-y-4" id="itinerary-accordion">
                            @foreach($itineraryItems as $index => $day)
                                @php
                                    $dayNumber = $day['day'] ?? ($index + 1);
                                    $dayTitle = $day['title'] ?? ('Day ' . $dayNumber);
                                    $dayDescription = $day['description'] ?? '';
                                @endphp
                                <div class="itinerary-item overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition-all hover:border-slate-300">
                                    <button type="button" class="itinerary-button flex w-full items-center justify-between gap-4 p-5 text-left focus:outline-none">
                                        <div class="flex items-center gap-4 min-w-0">
                                            <span class="flex-shrink-0 w-12 h-12 rounded-xl bg-navy-950 text-white font-display font-bold text-sm flex flex-col items-center justify-center shadow-sm">
                                                <span class="text-[9px] uppercase tracking-wider text-brand-400 font-sans">Day</span>
                                                <span class="text-base leading-none">{{ str_pad($dayNumber, 2, '0', STR_PAD_LEFT) }}</span>
                                            </span>
                                            <div class="min-w-0">
                                                <h3 class="font-bold text-slate-900 text-base md:text-lg truncate">
                                                    {{ $dayTitle }}
                                                </h3>
                                                <p class="text-xs text-slate-500 mt-0.5 truncate">
                                                    Click to view route details & overnight stay
                                                </p>
                                            </div>
                                        </div>
                                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-xs flex-shrink-0">
                                            <i class="itinerary-icon fas fa-chevron-down text-xs text-slate-500 transition-transform"></i>
                                        </div>
                                    </button>
                                    <div class="itinerary-panel px-6 pb-6 pt-2 text-slate-600 text-sm leading-relaxed border-t border-slate-200/60 bg-white" {{ $index === 0 ? '' : 'hidden' }}>
                                        <p class="leading-relaxed whitespace-pre-line">{{ $dayDescription ?: 'Day activities, trekking route, and evening camp setup.' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- 3. What's Included & What's Not Included --}}
                    @php
                        $includedItems = is_string($trek->included) ? json_decode($trek->included, true) : $trek->included;
                        $excludedItems = is_string($trek->excluded) ? json_decode($trek->excluded, true) : $trek->excluded;
                    @endphp
                    @if(!empty($includedItems) || !empty($excludedItems))
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10">
                        <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-2">
                            <i class="fas fa-check-double"></i> Complete Transparency
                        </span>
                        <h2 class="font-display text-3xl font-bold text-slate-900 mb-8">
                            What's Included & What's Not
                        </h2>

                        <div class="grid md:grid-cols-2 gap-8">
                            {{-- Included Card --}}
                            @if(!empty($includedItems) && is_array($includedItems))
                            <div class="rounded-2xl border-2 border-emerald-100 bg-emerald-50/40 p-6 md:p-7">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-lg">What's Included</h3>
                                        <p class="text-xs text-emerald-800">Covered in your tour package</p>
                                    </div>
                                </div>

                                <ul class="space-y-3.5">
                                    @foreach($includedItems as $item)
                                        <li class="flex items-start gap-3 text-sm text-slate-700">
                                            <i class="fas fa-check-circle text-emerald-600 mt-0.5 flex-shrink-0"></i>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- Excluded Card --}}
                            @if(!empty($excludedItems) && is_array($excludedItems))
                            <div class="rounded-2xl border-2 border-rose-100 bg-rose-50/40 p-6 md:p-7">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="w-10 h-10 rounded-xl bg-rose-600 text-white flex items-center justify-center font-bold">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-lg">What's Not Included</h3>
                                        <p class="text-xs text-rose-800">Personal or external expenses</p>
                                    </div>
                                </div>

                                <ul class="space-y-3.5">
                                    @foreach($excludedItems as $item)
                                        <li class="flex items-start gap-3 text-sm text-slate-700">
                                            <i class="fas fa-times-circle text-rose-500 mt-0.5 flex-shrink-0"></i>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- 4. Gallery Section --}}
                    @if($trek->galleries->count())
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10">
                        <div class="flex items-center justify-between mb-8">
                            <div>
                                <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-2">
                                    <i class="far fa-images"></i> Visual Expedition
                                </span>
                                <h2 class="font-display text-3xl font-bold text-slate-900">
                                    Destination Gallery
                                </h2>
                            </div>
                            <span class="text-xs text-slate-500 font-semibold">
                                {{ $trek->galleries->count() }} {{ \Str::plural('Photo', $trek->galleries->count()) }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($trek->galleries as $gallery)
                                <div class="group relative aspect-[4/3] rounded-2xl overflow-hidden bg-slate-100 shadow-sm">
                                    <img src="{{ $gallery->full_image_url }}"
                                         alt="{{ $gallery->title ?: $trek->title }}"
                                         loading="lazy"
                                         class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-108">
                                    @if($gallery->title)
                                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy-950/80 to-transparent p-3 text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                            {{ $gallery->title }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- 5. Transparent Pricing & Package Tiers --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10" id="pricing-packages">
                        <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-2">
                            <i class="fas fa-tag"></i> Clear Packages
                        </span>
                        <h2 class="font-display text-3xl font-bold text-slate-900">
                            Trip Packages & Pricing
                        </h2>
                        <p class="mt-2 text-slate-600 text-sm max-w-2xl">
                            All prices are per person in USD. Transparent pricing with no hidden charges at any stage.
                        </p>

                        @php
                            $basePrice = $trek->calculated_starting_price ?: 2499;
                            $standardPrice = round($basePrice);
                            $premiumPrice = round($basePrice * 1.35);
                            $privatePrice = round($basePrice * 1.65);
                        @endphp

                        <div class="mt-8 grid gap-6 md:grid-cols-3">
                            {{-- Standard Package --}}
                            <div class="package-card flex flex-col rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">
                                <div class="mb-4">
                                    <span class="inline-block rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Standard Tier</span>
                                    <h3 class="mt-3 font-display text-2xl font-bold text-slate-900">Group Journey</h3>
                                    <p class="mt-1 text-xs text-slate-500">Perfect for solo travelers & small groups.</p>
                                </div>

                                <div class="my-6 pt-4 border-t border-slate-100">
                                    <span class="font-display text-3xl font-bold text-slate-900">${{ number_format($standardPrice) }}</span>
                                    <span class="text-xs text-slate-500 font-medium">/ person</span>
                                </div>

                                <ul class="space-y-3 text-xs text-slate-600 flex-1 mb-6">
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Licensed mountain guide</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Standard hotel stay in Skardu</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> High-quality shared camp tent</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> 3 daily nutritious trail meals</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Group 4x4 transportation</li>
                                </ul>

                                <a href="{{ route('booking.create', ['trek' => $trek->slug, 'tier' => 'standard']) }}"
                                   class="block w-full py-3 px-4 rounded-xl border-2 border-slate-900 text-slate-900 text-center font-bold text-xs hover:bg-slate-900 hover:text-white transition-all">
                                    Book Standard Tier
                                </a>
                            </div>

                            {{-- Premium Package (Highlighted) --}}
                            <div class="package-card relative flex flex-col rounded-3xl border-2 border-brand-500 bg-gradient-to-b from-brand-50/40 to-white p-7 shadow-lg">
                                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 rounded-full bg-brand-600 px-4 py-1 text-[11px] font-bold uppercase tracking-wider text-white shadow-md">
                                    Most Popular
                                </div>

                                <div class="mb-4 mt-2">
                                    <span class="inline-block rounded-full bg-brand-100 px-3 py-1 text-xs font-semibold text-brand-800">Premium Tier</span>
                                    <h3 class="mt-3 font-display text-2xl font-bold text-slate-900">Enhanced Comfort</h3>
                                    <p class="mt-1 text-xs text-slate-500">Upgraded stays, gear & personal space.</p>
                                </div>

                                <div class="my-6 pt-4 border-t border-brand-100">
                                    <span class="font-display text-3xl font-bold text-brand-800">${{ number_format($premiumPrice) }}</span>
                                    <span class="text-xs text-slate-500 font-medium">/ person</span>
                                </div>

                                <ul class="space-y-3 text-xs text-slate-700 flex-1 mb-6">
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Senior high-altitude guide</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Upgraded boutique hotel in Skardu</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Private 4-season mountain tent</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Satellite comms & safety kit</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Dedicated trail porter (12kg)</li>
                                </ul>

                                <a href="{{ route('booking.create', ['trek' => $trek->slug, 'tier' => 'premium']) }}"
                                   class="btn-primary block w-full py-3.5 px-4 rounded-xl text-white text-center font-bold text-xs shadow-md hover:shadow-lg transition-all">
                                    Book Premium Tier
                                </a>
                            </div>

                            {{-- Private Expedition --}}
                            <div class="package-card flex flex-col rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">
                                <div class="mb-4">
                                    <span class="inline-block rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-800">Private VIP</span>
                                    <h3 class="mt-3 font-display text-2xl font-bold text-slate-900">Custom Expedition</h3>
                                    <p class="mt-1 text-xs text-slate-500">Tailored schedule, chef & private jeep.</p>
                                </div>

                                <div class="my-6 pt-4 border-t border-slate-100">
                                    <span class="font-display text-3xl font-bold text-slate-900">${{ number_format($privatePrice) }}</span>
                                    <span class="text-xs text-slate-500 font-medium">/ person</span>
                                </div>

                                <ul class="space-y-3 text-xs text-slate-600 flex-1 mb-6">
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Private dedicated team & chef</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Flexible travel dates & pacing</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Luxury private 4x4 transport</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Airport VIP assistance & luggage</li>
                                    <li class="flex items-center gap-2.5"><i class="fas fa-check text-brand-600"></i> Premium sleeping pad & down bag</li>
                                </ul>

                                <a href="{{ route('booking.create', ['trek' => $trek->slug, 'tier' => 'private']) }}"
                                   class="block w-full py-3 px-4 rounded-xl border-2 border-slate-900 text-slate-900 text-center font-bold text-xs hover:bg-slate-900 hover:text-white transition-all">
                                    Book Private Expedition
                                </a>
                            </div>
                        </div>

                        {{-- Scheduled Departures Table if database has dates --}}
                        @php
                            $scheduledDepartures = $trek->prices->whereNotNull('start_date')->sortBy('start_date');
                        @endphp
                        @if($scheduledDepartures->count())
                        <div class="mt-10 pt-8 border-t border-slate-100">
                            <h3 class="font-display text-xl font-bold text-slate-900 mb-4">
                                Fixed Departure Dates
                            </h3>
                            <div class="overflow-x-auto rounded-2xl border border-slate-200">
                                <table class="w-full text-left text-sm text-slate-700">
                                    <thead class="bg-slate-100 text-xs uppercase font-semibold text-slate-500">
                                        <tr>
                                            <th class="px-5 py-3.5">Departure Dates</th>
                                            <th class="px-5 py-3.5">Group Type</th>
                                            <th class="px-5 py-3.5">Price / Person</th>
                                            <th class="px-5 py-3.5">Availability</th>
                                            <th class="px-5 py-3.5 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 bg-white">
                                        @foreach($scheduledDepartures as $departure)
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="px-5 py-4 font-semibold text-slate-900">
                                                    {{ \Carbon\Carbon::parse($departure->start_date)->format('d M Y') }}
                                                    @if($departure->end_date)
                                                        → {{ \Carbon\Carbon::parse($departure->end_date)->format('d M Y') }}
                                                    @endif
                                                </td>
                                                <td class="px-5 py-4 text-xs text-slate-600">
                                                    {{ $departure->group_type }}
                                                </td>
                                                <td class="px-5 py-4 font-bold text-brand-700">
                                                    ${{ number_format($departure->price_usd, 0) }}
                                                </td>
                                                <td class="px-5 py-4">
                                                    @if($departure->availability === 'Available')
                                                        <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-0.5 text-[11px] font-semibold text-emerald-800">Available</span>
                                                    @elseif($departure->availability === 'Limited')
                                                        <span class="inline-flex rounded-full bg-amber-100 px-2.5 py-0.5 text-[11px] font-semibold text-amber-800">Limited Seats</span>
                                                    @else
                                                        <span class="inline-flex rounded-full bg-rose-100 px-2.5 py-0.5 text-[11px] font-semibold text-rose-800">Fully Booked</span>
                                                    @endif
                                                </td>
                                                <td class="px-5 py-4 text-right">
                                                    <a href="{{ route('booking.create', ['trek' => $trek->slug, 'price_id' => $departure->id, 'start_date' => $departure->start_date->format('Y-m-d')]) }}"
                                                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-900 text-white text-xs font-semibold hover:bg-brand-600 transition-colors">
                                                        <span>Select Date</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- 6. FAQs Accordion --}}
                    @php
                        $faqs = is_string($trek->faqs) ? json_decode($trek->faqs, true) : $trek->faqs;
                    @endphp
                    @if(!empty($faqs) && is_array($faqs))
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 md:p-10">
                        <span class="inline-flex items-center gap-2 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 mb-2">
                            <i class="far fa-question-circle"></i> Questions & Answers
                        </span>
                        <h2 class="font-display text-3xl font-bold text-slate-900 mb-8">
                            Frequently Asked Questions
                        </h2>

                        <div class="space-y-3" id="trek-faq-accordion">
                            @foreach($faqs as $index => $faq)
                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition-colors hover:border-slate-300">
                                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 p-5 text-left focus:outline-none">
                                        <span class="font-bold text-slate-900 text-base">
                                            {{ $faq['question'] ?? '' }}
                                        </span>
                                        <i class="faq-icon fas fa-chevron-down text-xs text-slate-400 transition-transform"></i>
                                    </button>
                                    <div class="faq-panel px-6 pb-6 pt-1 text-slate-600 text-sm leading-relaxed border-t border-slate-200/60 bg-white" hidden>
                                        {{ $faq['answer'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>

                {{-- RIGHT COLUMN: Sticky Sidebar CTA Card --}}
                <div class="lg:col-span-4">
                    <div class="lg:sticky lg:top-28 space-y-6">

                        {{-- Booking Sidebar Card --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-lg">
                            <div class="border-b border-slate-100 pb-5">
                                <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400">Guaranteed Price</p>
                                <div class="mt-1 flex items-baseline gap-2">
                                    <span class="font-display text-4xl font-bold text-slate-900">
                                        {{ $trek->starting_price_formatted }}
                                    </span>
                                    <span class="text-xs text-slate-500 font-medium">/ person</span>
                                </div>
                                <p class="mt-1 text-xs text-slate-400">Price depends on package tier & group size</p>
                            </div>

                            {{-- Inclusions Quick Summary --}}
                            <div class="py-5 space-y-3 text-xs text-slate-600 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check text-brand-600 text-sm w-4"></i>
                                    <span>All trekking permits & security clearances</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check text-brand-600 text-sm w-4"></i>
                                    <span>Professional local high-altitude guides</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check text-brand-600 text-sm w-4"></i>
                                    <span>All domestic 4x4 mountain transportation</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check text-brand-600 text-sm w-4"></i>
                                    <span>Hotel stays & 4-season mountain camping</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-check text-brand-600 text-sm w-4"></i>
                                    <span>Full board nutritious trail meals & hot drinks</span>
                                </div>
                            </div>

                            {{-- Primary Action Buttons --}}
                            <div class="pt-6 space-y-3">
                                <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}"
                                   class="btn-primary flex w-full items-center justify-center gap-2 rounded-xl py-4 text-center font-bold text-base text-white shadow-lg hover:shadow-xl transition-all">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>Book This Trip</span>
                                </a>

                                <a href="https://wa.me/923425343629?text={{ urlencode('Hi Karakorum Crown Expeditions! I want to inquire about: ' . $trek->title) }}"
                                   target="_blank"
                                   class="flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 py-3.5 text-center font-semibold text-sm text-slate-800 hover:bg-slate-100 transition-colors">
                                    <i class="fab fa-whatsapp text-lg text-[#25D366]"></i>
                                    <span>Talk to a Travel Expert</span>
                                </a>
                            </div>

                            <div class="mt-6 flex items-center justify-center gap-4 text-[11px] text-slate-400">
                                <span><i class="fas fa-lock text-slate-400 mr-1"></i> Secure Booking</span>
                                <span>•</span>
                                <span><i class="fas fa-undo text-slate-400 mr-1"></i> Free Rescheduling</span>
                            </div>
                        </div>

                        {{-- Why Travel With KCE Trust Card --}}
                        <div class="rounded-3xl bg-navy-950 p-7 text-white shadow-xl">
                            <h3 class="font-display text-xl font-bold mb-4">Why Book With Karakorum Crown</h3>
                            <div class="space-y-4 text-xs text-white/75">
                                <div class="flex items-start gap-3">
                                    <div class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center text-brand-400 flex-shrink-0 mt-0.5">
                                        <i class="fas fa-certificate text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-white text-sm">Govt. Licensed Operator</p>
                                        <p class="text-white/60">Registered with SECP & Tourism Dept. Gilgit-Baltistan.</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center text-brand-400 flex-shrink-0 mt-0.5">
                                        <i class="fas fa-mountain text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-white text-sm">Native Skardu Guides</p>
                                        <p class="text-white/60">Decades of expedition experience across K2, Concordia & Deosai.</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-7 h-7 rounded-lg bg-white/10 flex items-center justify-center text-brand-400 flex-shrink-0 mt-0.5">
                                        <i class="fas fa-headset text-xs"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-white text-sm">24/7 Ground Coordination</p>
                                        <p class="text-white/60">Personal communication from first inquiry through flight departure.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         FINAL CALL TO ACTION
    ═══════════════════════════════════════════════ --}}
    <section class="relative bg-navy-950 py-20 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('assets/K2-&-Concordia.webp') }}" alt="Karakoram Mountains" class="h-full w-full object-cover">
        </div>
        <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.25em] text-brand-300 backdrop-blur-md mb-6">
                Your Adventure Awaits
            </span>
            <h2 class="font-display text-4xl md:text-6xl font-bold leading-tight">
                Ready to Explore the Karakoram?
            </h2>
            <p class="mt-4 text-white/75 text-base md:text-lg leading-relaxed max-w-xl mx-auto">
                Join our certified mountain guides for an unforgettable journey into Pakistan's highest peaks. Simple booking, guaranteed dates, and trusted support.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking.create', ['trek' => $trek->slug]) }}"
                   class="btn-primary inline-flex items-center justify-center rounded-xl px-8 py-4 font-bold text-base text-white shadow-xl hover:shadow-2xl transition-all">
                    <i class="fas fa-calendar-check mr-2"></i> Book This Trip
                </a>
                <a href="https://wa.me/923425343629?text={{ urlencode('Hello Karakorum Crown Expeditions! I would like to talk to a travel expert about: ' . $trek->title) }}"
                   target="_blank"
                   class="inline-flex items-center justify-center rounded-xl px-8 py-4 font-semibold text-base text-white border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-md transition-all">
                    <i class="fab fa-whatsapp mr-2 text-xl text-[#25D366]"></i> Talk to a Travel Expert
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // FAQ Accordion
    const faqContainer = document.getElementById('trek-faq-accordion');
    if (faqContainer) {
        faqContainer.addEventListener('click', function (e) {
            const btn = e.target.closest('.faq-button');
            if (!btn) return;
            const panel = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isHidden = panel.hidden;

            faqContainer.querySelectorAll('.faq-panel').forEach(p => p.hidden = true);
            faqContainer.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));

            if (isHidden) {
                panel.hidden = false;
                if (icon) icon.classList.add('rotate-180');
            }
        });
    }

    // Itinerary Accordion
    const itineraryContainer = document.getElementById('itinerary-accordion');
    const toggleAllBtn = document.getElementById('toggle-all-itinerary');

    if (itineraryContainer) {
        itineraryContainer.addEventListener('click', function (e) {
            const btn = e.target.closest('.itinerary-button');
            if (!btn) return;
            const panel = btn.nextElementSibling;
            const icon = btn.querySelector('.itinerary-icon');
            const isHidden = panel.hidden;

            panel.hidden = !isHidden;
            if (icon) {
                if (isHidden) {
                    icon.classList.add('rotate-180');
                } else {
                    icon.classList.remove('rotate-180');
                }
            }
        });
    }

    if (toggleAllBtn && itineraryContainer) {
        let allExpanded = false;
        toggleAllBtn.addEventListener('click', function () {
            allExpanded = !allExpanded;
            const panels = itineraryContainer.querySelectorAll('.itinerary-panel');
            const icons = itineraryContainer.querySelectorAll('.itinerary-icon');

            panels.forEach(p => p.hidden = !allExpanded);
            icons.forEach(i => {
                if (allExpanded) {
                    i.classList.add('rotate-180');
                } else {
                    i.classList.remove('rotate-180');
                }
            });

            toggleAllBtn.innerHTML = allExpanded
                ? '<i class="fas fa-compress-alt mr-1"></i> Collapse All Days'
                : '<i class="fas fa-expand-alt mr-1"></i> Expand All Days';
        });
    }
});
</script>
@endpush
