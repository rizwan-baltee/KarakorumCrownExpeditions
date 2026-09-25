@extends('layouts.app')

@section('title', 'Book Your Karakoram Adventure - Karakorum Crown Expeditions')

@push('styles')
    .step-active {
        background: #16a34a;
        color: #ffffff;
        border-color: #16a34a;
    }
    .step-completed {
        background: #0f172a;
        color: #ffffff;
        border-color: #0f172a;
    }
    .step-inactive {
        background: #f8fafc;
        color: #94a3b8;
        border-color: #cbd5e1;
    }
    .tier-card.selected {
        border-color: #16a34a;
        background-color: #f0fdf4;
        box-shadow: 0 10px 25px -5px rgba(22, 163, 74, 0.15);
    }
    .addon-card.selected {
        border-color: #16a34a;
        background-color: #f0fdf4;
    }
    .form-input:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15);
    }
@endpush

@section('content')

{{-- Header Banner --}}
<section class="relative bg-navy-950 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 opacity-25">
        <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Mountains" class="h-full w-full object-cover">
    </div>
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.25em] text-brand-300 backdrop-blur-md mb-4">
            <span class="h-2 w-2 rounded-full bg-brand-400 animate-pulse"></span>
            Seamless Booking System
        </span>
        <h1 class="font-display text-3xl sm:text-5xl font-bold text-white leading-tight">
            Reserve Your Karakoram Journey
        </h1>
        <p class="mt-3 text-white/70 text-sm sm:text-base max-w-xl mx-auto">
            4 simple steps. No upfront card charges. Our expedition team reviews your dates and confirms logistics before securing your booking.
        </p>
    </div>
</section>

{{-- Multi-Step Booking Wizard --}}
<section class="py-12 md:py-16 bg-slate-50 min-h-[70vh]">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">

            {{-- Step Indicator Progress Bar --}}
            <div class="mb-10 bg-white rounded-2xl md:rounded-3xl border border-slate-200 p-4 md:p-6 shadow-xs">
                <div class="grid grid-cols-4 gap-2 md:gap-4 text-center">
                    {{-- Step 1 --}}
                    <div id="step-nav-1" class="cursor-pointer" onclick="goToStep(1)">
                        <div class="flex items-center justify-center">
                            <span class="step-badge w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center font-bold text-xs md:text-sm border-2 step-active transition-all">
                                1
                            </span>
                        </div>
                        <p class="mt-2 text-[11px] md:text-xs font-bold text-slate-900 tracking-wide uppercase">Select Trip</p>
                    </div>

                    {{-- Step 2 --}}
                    <div id="step-nav-2" class="cursor-pointer" onclick="goToStep(2)">
                        <div class="flex items-center justify-center">
                            <span class="step-badge w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center font-bold text-xs md:text-sm border-2 step-inactive transition-all">
                                2
                            </span>
                        </div>
                        <p class="mt-2 text-[11px] md:text-xs font-bold text-slate-500 tracking-wide uppercase">Dates & Party</p>
                    </div>

                    {{-- Step 3 --}}
                    <div id="step-nav-3" class="cursor-pointer" onclick="goToStep(3)">
                        <div class="flex items-center justify-center">
                            <span class="step-badge w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center font-bold text-xs md:text-sm border-2 step-inactive transition-all">
                                3
                            </span>
                        </div>
                        <p class="mt-2 text-[11px] md:text-xs font-bold text-slate-500 tracking-wide uppercase">Package Tier</p>
                    </div>

                    {{-- Step 4 --}}
                    <div id="step-nav-4" class="cursor-pointer" onclick="goToStep(4)">
                        <div class="flex items-center justify-center">
                            <span class="step-badge w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center font-bold text-xs md:text-sm border-2 step-inactive transition-all">
                                4
                            </span>
                        </div>
                        <p class="mt-2 text-[11px] md:text-xs font-bold text-slate-500 tracking-wide uppercase">Review & Book</p>
                    </div>
                </div>
            </div>

            {{-- Main Form Container with Live Pricing Sidebar --}}
            <form id="booking-form" action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" id="input-type" value="booking">
                <input type="hidden" name="trending_trek_id" id="input-trek-id" value="{{ $selectedTrek?->id ?: ($treks->first()?->id ?: '') }}">
                <input type="hidden" name="price_id" id="input-price-id" value="{{ $preselectedPriceId }}">
                <input type="hidden" name="package_tier" id="input-package-tier" value="{{ ucfirst($preselectedTier) }}">
                <input type="hidden" name="trip_type" id="input-trip-type" value="{{ $preselectedTier === 'private' ? 'Private' : 'Group' }}">
                <input type="hidden" name="total_amount" id="input-total-amount" value="0">
                <input type="hidden" name="currency" value="USD">

                @if(isset($errors) && $errors->any())
                    <div class="mb-8 rounded-2xl bg-rose-50 border border-rose-200 p-5 text-rose-700 text-sm">
                        <p class="font-bold mb-2">Please correct the following before submitting:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid gap-8 lg:grid-cols-12 items-start">

                    {{-- LEFT 8 COLUMNS: Step Wizard Content --}}
                    <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 md:p-10 shadow-sm">

                        {{-- ═══════════════════════════════════════════
                             STEP 1 — SELECT TRIP
                        ═══════════════════════════════════════════ --}}
                        <div id="step-content-1" class="step-panel space-y-6">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-700 bg-brand-50 px-3 py-1 rounded-full">Step 1 of 4</span>
                                <h2 class="font-display text-2xl md:text-3xl font-bold text-slate-900 mt-2">
                                    Confirm or Choose Your Destination
                                </h2>
                                <p class="text-slate-500 text-sm mt-1">
                                    Select the trek, tour, or mountaineering expedition you would like to book.
                                </p>
                            </div>

                            {{-- Trip Selector Dropdown --}}
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Select Tourism Product</label>
                                <select id="trip-dropdown" class="form-input w-full rounded-xl border border-slate-300 p-3.5 text-sm font-semibold text-slate-800 outline-none">
                                    @php
                                        $groupedTreks = $treks->groupBy(fn($t) => $t->type?->name ?? 'Experiences');
                                    @endphp
                                    @foreach($groupedTreks as $groupName => $groupItems)
                                        <optgroup label="{{ $groupName }}">
                                            @foreach($groupItems as $t)
                                                <option value="{{ $t->id }}" {{ ($selectedTrek && $selectedTrek->id == $t->id) || (!$selectedTrek && $loop->parent->first && $loop->first) ? 'selected' : '' }}>
                                                    {{ $t->title }} ({{ $t->duration_days }} Days — {{ $t->starting_price_formatted }})
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Trip Visual Showcase Card --}}
                            <div id="trip-preview-card" class="rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden p-5 flex flex-col sm:flex-row gap-5 items-center">
                                <img id="preview-image"
                                     src="{{ $selectedTrek ? $selectedTrek->primary_image_url : ($treks->first()?->primary_image_url ?: asset('assets/Front-banner-k2.webp')) }}"
                                     alt="Selected trip"
                                     class="w-full sm:w-48 h-36 rounded-xl object-cover shadow-sm flex-shrink-0">

                                <div class="flex-1 min-w-0 text-center sm:text-left">
                                    <span id="preview-category" class="inline-block text-[10px] font-bold uppercase tracking-wider text-brand-700 bg-brand-50 px-2.5 py-0.5 rounded-full mb-1">
                                        {{ $selectedTrek?->type?->name ?: ($treks->first()?->type?->name ?: 'Expedition') }}
                                    </span>
                                    <h3 id="preview-title" class="font-display text-xl font-bold text-slate-900 leading-snug truncate">
                                        {{ $selectedTrek?->title ?: ($treks->first()?->title ?: 'K2 Base Camp Trek') }}
                                    </h3>
                                    <div class="mt-2 flex flex-wrap items-center justify-center sm:justify-start gap-4 text-xs text-slate-500">
                                        <span><i class="far fa-clock text-brand-600 mr-1"></i><span id="preview-duration">{{ $selectedTrek?->duration_days ?: 14 }} Days</span></span>
                                        <span><i class="fas fa-signal text-brand-600 mr-1"></i><span id="preview-difficulty">{{ $selectedTrek?->difficulty_label ?: 'Challenging' }}</span></span>
                                        <span><i class="fas fa-map-marker-alt text-brand-600 mr-1"></i><span id="preview-location">{{ $selectedTrek?->location ?: 'Gilgit-Baltistan' }}</span></span>
                                    </div>
                                    <div class="mt-3 text-sm">
                                        <span class="text-xs text-slate-400">Starting Price:</span>
                                        <span id="preview-price" class="font-display text-lg font-bold text-brand-800 ml-1">
                                            {{ $selectedTrek?->starting_price_formatted ?: ($treks->first()?->starting_price_formatted ?: '$2,499') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 flex justify-end">
                                <button type="button" onclick="goToStep(2)" class="btn-primary px-8 py-3.5 rounded-xl font-bold text-sm text-white shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                                    <span>Next: Travel Details</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ═══════════════════════════════════════════
                             STEP 2 — TRAVEL DETAILS
                        ═══════════════════════════════════════════ --}}
                        <div id="step-content-2" class="step-panel space-y-6 hidden">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-700 bg-brand-50 px-3 py-1 rounded-full">Step 2 of 4</span>
                                <h2 class="font-display text-2xl md:text-3xl font-bold text-slate-900 mt-2">
                                    Travel Dates & Group Size
                                </h2>
                                <p class="text-slate-500 text-sm mt-1">
                                    Choose your preferred departure window and number of travelers.
                                </p>
                            </div>

                            {{-- Fixed Departure Dates if available --}}
                            <div id="fixed-dates-container" class="hidden">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Available Scheduled Departures</label>
                                <div id="fixed-dates-list" class="grid gap-2 sm:grid-cols-2">
                                    {{-- Injected dynamically via JS --}}
                                </div>
                                <div class="mt-3 flex items-center gap-2 text-xs text-slate-400">
                                    <span>or pick custom travel dates below</span>
                                </div>
                            </div>

                            {{-- Custom Date Picker --}}
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                                        Preferred Start Date *
                                    </label>
                                    <input type="date"
                                           name="start_date"
                                           id="start-date-input"
                                           value="{{ $preselectedDate ?: date('Y-m-d', strtotime('+30 days')) }}"
                                           min="{{ date('Y-m-d') }}"
                                           required
                                           class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                                        Estimated End Date (Optional)
                                    </label>
                                    <input type="date"
                                           name="end_date"
                                           id="end-date-input"
                                           class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>
                            </div>

                            {{-- Adults & Children Counters --}}
                            <div class="grid sm:grid-cols-2 gap-6 pt-2">
                                {{-- Adults --}}
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div>
                                            <p class="font-bold text-slate-900 text-sm">Adults</p>
                                            <p class="text-xs text-slate-400">Age 13+ years</p>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <button type="button" onclick="adjustCount('adults', -1)" class="w-9 h-9 rounded-lg bg-white border border-slate-200 font-bold text-slate-700 hover:bg-slate-100 flex items-center justify-center">-</button>
                                            <input type="number" name="adults" id="adults-count" value="2" min="1" max="50" class="w-12 text-center font-bold text-slate-900 bg-transparent border-0 outline-none text-base">
                                            <button type="button" onclick="adjustCount('adults', 1)" class="w-9 h-9 rounded-lg bg-white border border-slate-200 font-bold text-slate-700 hover:bg-slate-100 flex items-center justify-center">+</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Children --}}
                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <div>
                                            <p class="font-bold text-slate-900 text-sm">Children</p>
                                            <p class="text-xs text-slate-400">Under 13 (25% discount)</p>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <button type="button" onclick="adjustCount('children', -1)" class="w-9 h-9 rounded-lg bg-white border border-slate-200 font-bold text-slate-700 hover:bg-slate-100 flex items-center justify-center">-</button>
                                            <input type="number" name="children" id="children-count" value="0" min="0" max="20" class="w-12 text-center font-bold text-slate-900 bg-transparent border-0 outline-none text-base">
                                            <button type="button" onclick="adjustCount('children', 1)" class="w-9 h-9 rounded-lg bg-white border border-slate-200 font-bold text-slate-700 hover:bg-slate-100 flex items-center justify-center">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Group vs Private Trip Toggle --}}
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-2">Expedition Style</label>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <label class="cursor-pointer rounded-2xl border-2 p-4 flex items-start gap-3 transition-all" id="style-group-label">
                                        <input type="radio" name="trip_style_radio" value="Group" checked onchange="setTripStyle('Group')" class="mt-1 text-brand-600">
                                        <div>
                                            <p class="font-bold text-slate-900 text-sm">Join a Group Tour</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Trek alongside international mountain lovers at optimal value.</p>
                                        </div>
                                    </label>

                                    <label class="cursor-pointer rounded-2xl border-2 p-4 flex items-start gap-3 transition-all" id="style-private-label">
                                        <input type="radio" name="trip_style_radio" value="Private" onchange="setTripStyle('Private')" class="mt-1 text-brand-600">
                                        <div>
                                            <p class="font-bold text-slate-900 text-sm">Private Expedition</p>
                                            <p class="text-xs text-slate-500 mt-0.5">Exclusive vehicle, custom pacing, and private camp for your party.</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center justify-between">
                                <button type="button" onclick="goToStep(1)" class="px-5 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-100 transition-colors">
                                    ← Back
                                </button>
                                <button type="button" onclick="goToStep(3)" class="btn-primary px-8 py-3.5 rounded-xl font-bold text-sm text-white shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                                    <span>Next: Package & Options</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ═══════════════════════════════════════════
                             STEP 3 — PACKAGE TIERS & ADD-ONS
                        ═══════════════════════════════════════════ --}}
                        <div id="step-content-3" class="step-panel space-y-6 hidden">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-700 bg-brand-50 px-3 py-1 rounded-full">Step 3 of 4</span>
                                <h2 class="font-display text-2xl md:text-3xl font-bold text-slate-900 mt-2">
                                    Choose Package & Add-ons
                                </h2>
                                <p class="text-slate-500 text-sm mt-1">
                                    Select your preferred comfort grade and customize optional mountain services.
                                </p>
                            </div>

                            {{-- 3 Package Tier Cards --}}
                            <div class="grid gap-4 sm:grid-cols-3">
                                {{-- Standard Tier --}}
                                <div id="tier-standard" onclick="selectTier('standard')" class="tier-card cursor-pointer rounded-2xl border-2 border-slate-200 p-5 transition-all">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 bg-slate-100 px-2 py-0.5 rounded-md">Standard</span>
                                        <span class="text-xs font-bold text-brand-700" id="tier-standard-multiplier">1.0x Base</span>
                                    </div>
                                    <h4 class="font-display font-bold text-slate-900 text-lg">Group Journey</h4>
                                    <p class="text-xs text-slate-500 mt-1">Shared tent, certified local guide, full meals.</p>
                                    <p class="mt-4 font-bold text-base text-slate-900" id="tier-standard-price">$2,499</p>
                                </div>

                                {{-- Premium Tier --}}
                                <div id="tier-premium" onclick="selectTier('premium')" class="tier-card cursor-pointer rounded-2xl border-2 border-slate-200 p-5 transition-all">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-700 bg-brand-100 px-2 py-0.5 rounded-md">Popular</span>
                                        <span class="text-xs font-bold text-brand-700">+35%</span>
                                    </div>
                                    <h4 class="font-display font-bold text-slate-900 text-lg">Enhanced Comfort</h4>
                                    <p class="text-xs text-slate-500 mt-1">Upgraded stays, private tent & satellite kit.</p>
                                    <p class="mt-4 font-bold text-base text-brand-800" id="tier-premium-price">$3,374</p>
                                </div>

                                {{-- Private Tier --}}
                                <div id="tier-private" onclick="selectTier('private')" class="tier-card cursor-pointer rounded-2xl border-2 border-slate-200 p-5 transition-all">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-amber-700 bg-amber-100 px-2 py-0.5 rounded-md">Exclusive</span>
                                        <span class="text-xs font-bold text-amber-700">+65%</span>
                                    </div>
                                    <h4 class="font-display font-bold text-slate-900 text-lg">Private VIP</h4>
                                    <p class="text-xs text-slate-500 mt-1">Custom pacing, private jeep, dedicated chef.</p>
                                    <p class="mt-4 font-bold text-base text-slate-900" id="tier-private-price">$4,123</p>
                                </div>
                            </div>

                            {{-- Optional Add-ons List --}}
                            <div class="pt-4 border-t border-slate-100">
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-3">Optional Add-ons & Gear</label>
                                <div class="space-y-3">
                                    {{-- Add-on 1 --}}
                                    <label class="addon-card cursor-pointer rounded-2xl border border-slate-200 p-4 flex items-center justify-between hover:border-brand-300 transition-all">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" name="selected_addons[]" value="Single Tent Supplement:150" onchange="updateCalculations()" class="w-4 h-4 text-brand-600 rounded">
                                            <div>
                                                <p class="font-bold text-slate-900 text-sm">Single Tent Supplement</p>
                                                <p class="text-xs text-slate-500">Guaranteed solo 4-season private tent throughout the trek.</p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-slate-900">+$150 USD</span>
                                    </label>

                                    {{-- Add-on 2 --}}
                                    <label class="addon-card cursor-pointer rounded-2xl border border-slate-200 p-4 flex items-center justify-between hover:border-brand-300 transition-all">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" name="selected_addons[]" value="Personal Porter (12kg):250" onchange="updateCalculations()" class="w-4 h-4 text-brand-600 rounded">
                                            <div>
                                                <p class="font-bold text-slate-900 text-sm">Dedicated Personal Porter (12kg)</p>
                                                <p class="text-xs text-slate-500">Dedicated porter to carry your personal duffel bag each day.</p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-slate-900">+$250 USD</span>
                                    </label>

                                    {{-- Add-on 3 --}}
                                    <label class="addon-card cursor-pointer rounded-2xl border border-slate-200 p-4 flex items-center justify-between hover:border-brand-300 transition-all">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" name="selected_addons[]" value="Gear Rental (Sleeping Bag + Down Jacket):90" onchange="updateCalculations()" class="w-4 h-4 text-brand-600 rounded">
                                            <div>
                                                <p class="font-bold text-slate-900 text-sm">Gear Rental (Sub-zero Bag & Down Jacket)</p>
                                                <p class="text-xs text-slate-500">Sanitized, expedition-grade -20°C sleeping bag & down jacket rental.</p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-slate-900">+$90 USD</span>
                                    </label>

                                    {{-- Add-on 4 --}}
                                    <label class="addon-card cursor-pointer rounded-2xl border border-slate-200 p-4 flex items-center justify-between hover:border-brand-300 transition-all">
                                        <div class="flex items-center gap-3">
                                            <input type="checkbox" name="selected_addons[]" value="Skardu Airport VIP Transfer:60" onchange="updateCalculations()" class="w-4 h-4 text-brand-600 rounded">
                                            <div>
                                                <p class="font-bold text-slate-900 text-sm">Skardu Airport VIP Airport Transfers</p>
                                                <p class="text-xs text-slate-500">Private greeting at Skardu airport and direct hotel shuttle.</p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold text-slate-900">+$60 USD</span>
                                    </label>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center justify-between">
                                <button type="button" onclick="goToStep(2)" class="px-5 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-100 transition-colors">
                                    ← Back
                                </button>
                                <button type="button" onclick="goToStep(4)" class="btn-primary px-8 py-3.5 rounded-xl font-bold text-sm text-white shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                                    <span>Next: Review & Contact</span>
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>

                        {{-- ═══════════════════════════════════════════
                             STEP 4 — CUSTOMER INFO & REVIEW
                        ═══════════════════════════════════════════ --}}
                        <div id="step-content-4" class="step-panel space-y-6 hidden">
                            <div>
                                <span class="text-xs font-bold uppercase tracking-wider text-brand-700 bg-brand-50 px-3 py-1 rounded-full">Step 4 of 4</span>
                                <h2 class="font-display text-2xl md:text-3xl font-bold text-slate-900 mt-2">
                                    Traveler Information & Final Review
                                </h2>
                                <p class="text-slate-500 text-sm mt-1">
                                    Enter your contact details so our expedition coordinator can review and confirm your booking.
                                </p>
                            </div>

                            {{-- Personal Details Form --}}
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Full Name *</label>
                                    <input type="text" name="name" id="cust-name" required value="{{ old('name') }}" placeholder="e.g. John Smith" class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Email Address *</label>
                                    <input type="email" name="email" id="cust-email" required value="{{ old('email') }}" placeholder="john@example.com" class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Phone / WhatsApp *</label>
                                    <input type="text" name="phone" id="cust-phone" required value="{{ old('phone') }}" placeholder="+1 234 567 8900" class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Country of Residence *</label>
                                    <select name="country" id="cust-country" required class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                        <option value="">-- Select Your Country --</option>
                                        @php
                                            $countriesList = ['Australia', 'Austria', 'Belgium', 'Canada', 'China', 'Denmark', 'France', 'Germany', 'Hong Kong', 'Ireland', 'Italy', 'Japan', 'Malaysia', 'Netherlands', 'New Zealand', 'Norway', 'Pakistan', 'Poland', 'Saudi Arabia', 'Singapore', 'Spain', 'Sweden', 'Switzerland', 'UAE', 'United Kingdom', 'United States', 'Other'];
                                        @endphp
                                        @foreach($countriesList as $c)
                                            <option value="{{ $c }}" {{ old('country') === $c ? 'selected' : '' }}>{{ $c }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Dietary Requirements</label>
                                    <input type="text" name="dietary_requirements" placeholder="Vegetarian, Halal, Gluten-Free, Allergies..." class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Emergency Contact (Optional)</label>
                                    <input type="text" name="emergency_contact" placeholder="Name & Phone number" class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Special Requests or Medical Notes</label>
                                <textarea name="special_requirements" rows="3" placeholder="Tell us about your fitness level, previous trekking experience, or any custom wishes..." class="form-input w-full rounded-xl border border-slate-300 p-3 text-sm text-slate-800 outline-none resize-none"></textarea>
                            </div>

                            {{-- Complete Booking Summary Box --}}
                            <div class="rounded-2xl border-2 border-brand-200 bg-brand-50/50 p-6 space-y-4">
                                <div class="flex items-center justify-between border-b border-brand-200 pb-3">
                                    <h4 class="font-display font-bold text-slate-900 text-lg flex items-center gap-2">
                                        <i class="fas fa-clipboard-check text-brand-600"></i>
                                        <span>Complete Booking Summary</span>
                                    </h4>
                                    <button type="button" onclick="goToStep(1)" class="text-xs font-bold text-brand-700 hover:underline">
                                        Edit Details
                                    </button>
                                </div>

                                <div class="grid sm:grid-cols-2 gap-3 text-xs">
                                    <div>
                                        <span class="text-slate-400">Expedition:</span>
                                        <p class="font-bold text-slate-900 text-sm" id="summary-trek-title">K2 Base Camp Trek</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-400">Travel Date:</span>
                                        <p class="font-bold text-slate-900 text-sm" id="summary-date">Select date</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-400">Party Size:</span>
                                        <p class="font-bold text-slate-900 text-sm" id="summary-party">2 Adults</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-400">Package Tier:</span>
                                        <p class="font-bold text-slate-900 text-sm" id="summary-tier">Standard (Group)</p>
                                    </div>
                                </div>

                                <div class="border-t border-brand-200 pt-3 flex items-center justify-between">
                                    <div>
                                        <p class="text-xs text-slate-500">Estimated Total Amount:</p>
                                        <p class="font-display text-2xl font-bold text-brand-800" id="summary-price">$4,998 USD</p>
                                    </div>
                                    <span class="rounded-full bg-emerald-100 text-emerald-800 text-[11px] font-bold px-3 py-1">
                                        Zero Upfront Charge
                                    </span>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center justify-between">
                                <button type="button" onclick="goToStep(3)" class="px-5 py-3 rounded-xl border border-slate-200 text-slate-600 font-semibold text-sm hover:bg-slate-100 transition-colors">
                                    ← Back
                                </button>
                                <button type="submit" class="btn-primary px-10 py-4 rounded-xl font-bold text-base text-white shadow-xl hover:shadow-2xl transition-all flex items-center gap-2">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Confirm Booking Request</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    {{-- RIGHT 4 COLUMNS: Live Dynamic Price Calculation Sidebar --}}
                    <div class="lg:col-span-4 space-y-6">

                        {{-- Dynamic Calculation Card --}}
                        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-md sticky top-28">
                            <h3 class="font-display text-xl font-bold text-slate-900 pb-4 border-b border-slate-100 flex items-center justify-between">
                                <span>Price Breakdown</span>
                                <span class="text-xs font-sans text-brand-600 bg-brand-50 px-2.5 py-0.5 rounded-full font-bold">USD</span>
                            </h3>

                            <div class="py-4 space-y-3 text-xs">
                                {{-- Base Price per person --}}
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-500">Package Base / Person:</span>
                                    <span class="font-bold text-slate-800" id="calc-base-price">$2,499</span>
                                </div>

                                {{-- Adults line --}}
                                <div class="flex items-center justify-between">
                                    <span class="text-slate-500" id="calc-adults-label">Adults (× 2):</span>
                                    <span class="font-semibold text-slate-800" id="calc-adults-subtotal">$4,998</span>
                                </div>

                                {{-- Children line (if > 0) --}}
                                <div id="calc-children-row" class="hidden flex items-center justify-between">
                                    <span class="text-slate-500" id="calc-children-label">Children:</span>
                                    <span class="font-semibold text-slate-800" id="calc-children-subtotal">$0</span>
                                </div>

                                {{-- Addons subtotal (if any) --}}
                                <div id="calc-addons-row" class="hidden flex items-center justify-between text-amber-800">
                                    <span>Selected Add-ons:</span>
                                    <span class="font-semibold" id="calc-addons-subtotal">+$0</span>
                                </div>
                            </div>

                            {{-- Total Price Highlight --}}
                            <div class="pt-4 border-t-2 border-dashed border-slate-200">
                                <p class="text-[11px] uppercase font-bold text-slate-400">Total Calculation</p>
                                <div class="mt-1 flex items-baseline justify-between">
                                    <span class="font-display text-3xl font-bold text-slate-900" id="calc-total-price">$4,998</span>
                                    <span class="text-xs font-semibold text-slate-400">USD</span>
                                </div>
                                <p class="text-[11px] text-slate-400 mt-1">Guaranteed quote. No card charged today.</p>
                            </div>

                            {{-- Trust Points --}}
                            <div class="mt-6 pt-5 border-t border-slate-100 space-y-2.5 text-xs text-slate-500">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-brand-600"></i>
                                    <span>Official Booking Reference code</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-brand-600"></i>
                                    <span>Free dates rescheduling</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-check text-brand-600"></i>
                                    <span>Visa LOI invitation assistance</span>
                                </div>
                            </div>

                            {{-- Direct WhatsApp Help --}}
                            <div class="mt-6 pt-5 border-t border-slate-100">
                                <a href="https://wa.me/923425343629?text={{ urlencode('Hi! I need help with booking an expedition.') }}"
                                   target="_blank"
                                   class="flex items-center justify-center gap-2 w-full py-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 text-xs font-bold text-slate-800 transition-colors">
                                    <i class="fab fa-whatsapp text-base text-[#25D366]"></i>
                                    <span>Questions? Talk to an Expert</span>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// JSON Database of treks passed from controller
const treksData = @json($treksData);
let currentStep = 1;
let currentTrek = null;
let currentTier = "{{ $preselectedTier }}"; // standard, premium, private
let tripStyle = "{{ $preselectedTier === 'private' ? 'Private' : 'Group' }}";

document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('trip-dropdown');
    const trekIdInput = document.getElementById('input-trek-id');

    // Find initial trek
    const initialTrekId = parseInt(trekIdInput.value) || (treksData[0] ? treksData[0].id : null);
    if (initialTrekId) {
        currentTrek = treksData.find(t => t.id === initialTrekId) || treksData[0];
    } else {
        currentTrek = treksData[0];
    }

    if (dropdown) {
        dropdown.addEventListener('change', function () {
            const selectedId = parseInt(this.value);
            currentTrek = treksData.find(t => t.id === selectedId);
            trekIdInput.value = selectedId;
            updateTrekPreview();
            updateCalculations();
        });
    }

    // Input listeners for real-time recalculation
    ['adults-count', 'children-count', 'start-date-input', 'cust-name'].forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            el.addEventListener('input', updateCalculations);
            el.addEventListener('change', updateCalculations);
        }
    });

    selectTier(currentTier);
    updateTrekPreview();
    updateCalculations();
});

function goToStep(step) {
    // Validate step 1 if trying to advance
    if (step > 1 && !currentTrek) {
        alert('Please choose a trip first.');
        return;
    }

    // Validate step 2 if moving to 3 or 4
    if (step > 2) {
        const startDate = document.getElementById('start-date-input').value;
        const adults = parseInt(document.getElementById('adults-count').value);
        if (!startDate) {
            alert('Please select your preferred travel start date.');
            goToStep(2);
            return;
        }
        if (isNaN(adults) || adults < 1) {
            alert('Please specify at least 1 adult traveler.');
            goToStep(2);
            return;
        }
    }

    currentStep = step;

    // Show active step panel
    for (let i = 1; i <= 4; i++) {
        const panel = document.getElementById('step-content-' + i);
        const nav = document.getElementById('step-nav-' + i);
        const badge = nav ? nav.querySelector('.step-badge') : null;

        if (panel) {
            if (i === step) {
                panel.classList.remove('hidden');
            } else {
                panel.classList.add('hidden');
            }
        }

        if (badge) {
            badge.classList.remove('step-active', 'step-completed', 'step-inactive');
            if (i === step) {
                badge.classList.add('step-active');
            } else if (i < step) {
                badge.classList.add('step-completed');
            } else {
                badge.classList.add('step-inactive');
            }
        }
    }

    updateSummary();
    window.scrollTo({ top: 350, behavior: 'smooth' });
}

function updateTrekPreview() {
    if (!currentTrek) return;

    document.getElementById('preview-image').src = currentTrek.image_url;
    document.getElementById('preview-title').textContent = currentTrek.title;
    document.getElementById('preview-category').textContent = currentTrek.category;
    document.getElementById('preview-duration').textContent = currentTrek.duration_days + ' Days';
    document.getElementById('preview-difficulty').textContent = currentTrek.difficulty_label;
    document.getElementById('preview-location').textContent = currentTrek.location;
    document.getElementById('preview-price').textContent = '$' + Math.round(currentTrek.base_price).toLocaleString();

    // Render scheduled departures if available
    const datesContainer = document.getElementById('fixed-dates-container');
    const datesList = document.getElementById('fixed-dates-list');

    if (currentTrek.departures && currentTrek.departures.length > 0) {
        datesContainer.classList.remove('hidden');
        datesList.innerHTML = '';

        currentTrek.departures.forEach(dep => {
            const isAvail = dep.availability === 'Available';
            const card = document.createElement('div');
            card.className = `p-3 rounded-xl border text-xs cursor-pointer transition-all flex items-center justify-between ${
                isAvail ? 'border-slate-200 bg-white hover:border-brand-500' : 'border-slate-100 bg-slate-50 opacity-60 pointer-events-none'
            }`;
            card.onclick = () => selectScheduledDeparture(dep);
            card.innerHTML = `
                <div>
                    <p class="font-bold text-slate-800">${dep.formatted_dates}</p>
                    <p class="text-[10px] text-slate-400">${dep.group_type}</p>
                </div>
                <span class="font-bold text-brand-700">$${Math.round(dep.price).toLocaleString()}</span>
            `;
            datesList.appendChild(card);
        });
    } else {
        datesContainer.classList.add('hidden');
    }
}

function selectScheduledDeparture(dep) {
    if (dep.start_date) {
        document.getElementById('start-date-input').value = dep.start_date;
    }
    if (dep.end_date) {
        document.getElementById('end-date-input').value = dep.end_date;
    }
    document.getElementById('input-price-id').value = dep.id;
    updateCalculations();
}

function selectTier(tier) {
    currentTier = tier;
    document.getElementById('input-package-tier').value = tier.charAt(0).toUpperCase() + tier.slice(1);

    ['standard', 'premium', 'private'].forEach(t => {
        const card = document.getElementById('tier-' + t);
        if (card) {
            if (t === tier) {
                card.classList.add('selected');
            } else {
                card.classList.remove('selected');
            }
        }
    });

    if (tier === 'private') {
        setTripStyle('Private');
    }

    updateCalculations();
}

function setTripStyle(style) {
    tripStyle = style;
    document.getElementById('input-trip-type').value = style;

    const groupLabel = document.getElementById('style-group-label');
    const privateLabel = document.getElementById('style-private-label');

    if (style === 'Private') {
        if (privateLabel) {
            privateLabel.classList.add('border-brand-500', 'bg-brand-50/30');
            privateLabel.classList.remove('border-slate-200');
        }
        if (groupLabel) {
            groupLabel.classList.remove('border-brand-500', 'bg-brand-50/30');
            groupLabel.classList.add('border-slate-200');
        }
    } else {
        if (groupLabel) {
            groupLabel.classList.add('border-brand-500', 'bg-brand-50/30');
            groupLabel.classList.remove('border-slate-200');
        }
        if (privateLabel) {
            privateLabel.classList.remove('border-brand-500', 'bg-brand-50/30');
            privateLabel.classList.add('border-slate-200');
        }
    }
}

function adjustCount(type, delta) {
    const input = document.getElementById(type + '-count');
    if (!input) return;
    let val = parseInt(input.value) || 0;
    val = Math.max(type === 'adults' ? 1 : 0, val + delta);
    input.value = val;
    updateCalculations();
}

function updateCalculations() {
    if (!currentTrek) return;

    const basePerPerson = currentTrek.base_price;
    const adults = parseInt(document.getElementById('adults-count').value) || 1;
    const children = parseInt(document.getElementById('children-count').value) || 0;

    // Multiplier per tier
    let multiplier = 1.0;
    if (currentTier === 'premium') multiplier = 1.35;
    if (currentTier === 'private') multiplier = 1.65;

    const adultRate = Math.round(basePerPerson * multiplier);
    const childRate = Math.round(adultRate * 0.75); // 25% discount for child

    const adultsSubtotal = adultRate * adults;
    const childrenSubtotal = childRate * children;

    // Update package tier cards prices
    const stdRate = Math.round(basePerPerson);
    const premRate = Math.round(basePerPerson * 1.35);
    const privRate = Math.round(basePerPerson * 1.65);

    document.getElementById('tier-standard-price').textContent = '$' + stdRate.toLocaleString() + ' / person';
    document.getElementById('tier-premium-price').textContent = '$' + premRate.toLocaleString() + ' / person';
    document.getElementById('tier-private-price').textContent = '$' + privRate.toLocaleString() + ' / person';

    // Calculate selected add-ons
    let addonsTotal = 0;
    const checkedAddons = document.querySelectorAll('input[name="selected_addons[]"]:checked');
    checkedAddons.forEach(cb => {
        const parts = cb.value.split(':');
        if (parts.length > 1) {
            addonsTotal += parseFloat(parts[1]) || 0;
        }
    });

    const grandTotal = adultsSubtotal + childrenSubtotal + addonsTotal;

    // Update Sidebar Calculation Box
    document.getElementById('calc-base-price').textContent = '$' + adultRate.toLocaleString();
    document.getElementById('calc-adults-label').textContent = `Adults (× ${adults}):`;
    document.getElementById('calc-adults-subtotal').textContent = '$' + adultsSubtotal.toLocaleString();

    const childRow = document.getElementById('calc-children-row');
    if (children > 0) {
        childRow.classList.remove('hidden');
        document.getElementById('calc-children-label').textContent = `Children (× ${children}):`;
        document.getElementById('calc-children-subtotal').textContent = '$' + childrenSubtotal.toLocaleString();
    } else {
        childRow.classList.add('hidden');
    }

    const addonsRow = document.getElementById('calc-addons-row');
    if (addonsTotal > 0) {
        addonsRow.classList.remove('hidden');
        document.getElementById('calc-addons-subtotal').textContent = '+$' + addonsTotal.toLocaleString();
    } else {
        addonsRow.classList.add('hidden');
    }

    document.getElementById('calc-total-price').textContent = '$' + grandTotal.toLocaleString();
    document.getElementById('input-total-amount').value = grandTotal;

    updateSummary(grandTotal, adults, children);
}

function updateSummary(total, adults, children) {
    if (!currentTrek) return;

    adults = adults || (parseInt(document.getElementById('adults-count').value) || 1);
    children = children !== undefined ? children : (parseInt(document.getElementById('children-count').value) || 0);

    const titleEl = document.getElementById('summary-trek-title');
    const dateEl = document.getElementById('summary-date');
    const partyEl = document.getElementById('summary-party');
    const tierEl = document.getElementById('summary-tier');
    const priceEl = document.getElementById('summary-price');

    if (titleEl) titleEl.textContent = currentTrek.title;
    if (dateEl) {
        const sDate = document.getElementById('start-date-input').value;
        dateEl.textContent = sDate ? new Date(sDate).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' }) : 'Flexible';
    }
    if (partyEl) {
        partyEl.textContent = `${adults} Adult${adults > 1 ? 's' : ''}` + (children > 0 ? `, ${children} Child${children > 1 ? 'ren' : ''}` : '');
    }
    if (tierEl) {
        tierEl.textContent = `${currentTier.charAt(0).toUpperCase() + currentTier.slice(1)} (${tripStyle})`;
    }
    if (priceEl && total !== undefined) {
        priceEl.textContent = '$' + total.toLocaleString() + ' USD';
    }
}
</script>
@endpush
