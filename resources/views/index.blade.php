@extends('layouts.app')

@section('title', 'Karakorum Crown Expeditions - Premium Adventure Travel in Gilgit-Baltistan')

@push('styles')
    .hero-glow {
        background: radial-gradient(circle at top, rgba(212, 168, 83, 0.18), transparent 42%);
    }

    .category-card {
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease;
    }

    .category-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
    }

    .faq-panel[hidden] {
        display: none;
    }
@endpush

@section('content')

    {{-- ═══════════════════════════════════════════════
         1. HERO SECTION & LIVE STATISTICS
    ═══════════════════════════════════════════════ --}}
    <section class="relative min-h-[85vh] flex items-end overflow-hidden bg-navy-950 pt-24 pb-12 md:pb-16">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/Front-banner-k2.webp') }}"
                 alt="Gilgit-Baltistan Karakoram Mountains"
                 decoding="async"
                 class="h-full w-full object-cover opacity-80 scale-100 animate-fade-in">
            <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-950/80 to-navy-950/40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-transparent to-transparent"></div>
            <div class="absolute inset-0 hero-glow"></div>
        </div>

        <div class="relative w-full">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl text-white">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs uppercase tracking-[0.2em] text-white/90 backdrop-blur-md shadow-sm">
                        <span class="h-2 w-2 rounded-full bg-brand-400 animate-pulse"></span>
                        Premium adventures in Gilgit-Baltistan
                    </div>

                    <h1 class="mt-4 font-display text-3xl sm:text-5xl lg:text-6xl font-bold leading-[1.12] text-balance">
                        Discover the wild, luxury side of northern Pakistan.
                    </h1>

                    <p class="mt-4 max-w-2xl text-sm sm:text-lg text-white/80 leading-relaxed font-light">
                        Curated treks, mountaineering expeditions, and cultural journeys tailored for international travelers seeking world-class safety, native expertise, and extraordinary mountain scenery.
                    </p>

                    <div class="mt-6 flex flex-wrap items-center gap-3 max-w-full">
                        <a href="#experiences" class="btn-primary inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transition-all">
                            <span>Explore Experiences</span>
                            <i class="fas fa-arrow-down text-xs"></i>
                        </a>
                        <a href="{{ route('booking.create') }}" class="btn-gold inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transition-all">
                            <i class="fas fa-calendar-check text-xs"></i>
                            <span>Book a Tour</span>
                        </a>
                        <a href="https://wa.me/923425343629?text={{ urlencode('Hello Karakorum Crown Expeditions! I would like to consult with a travel expert.') }}"
                           target="_blank"
                           class="btn-outline-light inline-flex items-center justify-center gap-2 rounded-xl px-5 py-3 text-sm font-semibold text-white backdrop-blur-md">
                            <i class="fab fa-whatsapp text-base text-[#25D366]"></i>
                            <span>Chat with Expert</span>
                        </a>
                    </div>

                    {{-- Live Statistics Badges --}}
                    <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4 max-w-3xl" id="stats-section">
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 md:p-5 backdrop-blur-md text-center">
                            <div class="text-3xl lg:text-4xl font-display text-brand-400 font-bold">
                                {{ number_format($stats['happy_travelers']) }}+
                            </div>
                            <p class="text-[11px] text-white/70 mt-1 uppercase tracking-wider font-medium">Happy Travelers</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 md:p-5 backdrop-blur-md text-center">
                            <div class="text-3xl lg:text-4xl font-display text-brand-400 font-bold">
                                {{ $stats['total_trips'] }}+
                            </div>
                            <p class="text-[11px] text-white/70 mt-1 uppercase tracking-wider font-medium">Treks & Expeditions</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 md:p-5 backdrop-blur-md text-center">
                            <div class="text-3xl lg:text-4xl font-display text-brand-400 font-bold">
                                {{ $stats['expert_guides'] }}+
                            </div>
                            <p class="text-[11px] text-white/70 mt-1 uppercase tracking-wider font-medium">Certified Local Guides</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4 md:p-5 backdrop-blur-md text-center">
                            <div class="text-3xl lg:text-4xl font-display text-brand-400 font-bold">
                                {{ $stats['satisfaction_rate'] }}%
                            </div>
                            <p class="text-[11px] text-white/70 mt-1 uppercase tracking-wider font-medium">Client Satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trusted Organizations Strip --}}
    <section class="border-b border-slate-200 bg-white">
        <div class="container mx-auto px-4 lg:px-8 py-7">
            <p class="text-center text-[11px] font-bold uppercase tracking-[0.25em] text-slate-400 mb-5">
                Officially Licensed & Internationally Recognized
            </p>
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
                <div class="flex items-center gap-2.5">
                    <i class="fas fa-shield-alt text-2xl text-slate-800"></i>
                    <span class="font-display font-bold text-lg text-slate-800">SECP Licensed</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fas fa-mountain text-2xl text-slate-800"></i>
                    <span class="font-display font-bold text-lg text-slate-800">PATO Member</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fas fa-map-marked-alt text-2xl text-slate-800"></i>
                    <span class="font-display font-bold text-lg text-slate-800">Tourism Dept. GB</span>
                </div>
                <div class="flex items-center gap-2.5">
                    <i class="fab fa-tripadvisor text-2xl text-slate-800"></i>
                    <span class="font-display font-bold text-lg text-slate-800">TripAdvisor Verified</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         2. FEATURED TREKS / EXPERIENCES CARDS
    ═══════════════════════════════════════════════ --}}
    <section id="experiences" class="py-14 md:py-16 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                        <i class="fas fa-star text-[10px]"></i> Handpicked Journeys
                    </span>
                    <h2 class="mt-2 font-display text-2xl md:text-4xl font-bold text-slate-900 leading-tight">
                        Featured Experiences
                    </h2>
                    <p class="mt-2 text-slate-600 max-w-xl text-sm sm:text-base">
                        Iconic routes into the heart of the Karakoram, crafted for safety, authentic culture, and breathtaking wilderness.
                    </p>
                </div>
                <a href="#categories" class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-brand-700 hover:text-brand-800 self-start md:self-auto bg-white px-4 py-2.5 rounded-xl border border-slate-200 shadow-sm hover:shadow transition-all">
                    <span>Explore All Categories</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($featuredTreks as $trek)
                    <x-trip-card :trek="$trek" />
                @empty
                    <div class="col-span-3 py-12 text-center text-slate-400">
                        <p>No featured treks available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         3. EXPLORE BY CATEGORY
    ═══════════════════════════════════════════════ --}}
    <section id="categories" class="py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                    <i class="fas fa-th-large text-[10px]"></i> Product Categories
                </span>
                <h2 class="mt-2 font-display text-2xl md:text-4xl font-bold text-slate-900">
                    Explore By Category
                </h2>
                <p class="mt-2 text-slate-600 text-sm sm:text-base">
                    Find the exact style of adventure that matches your physical fitness, timeline, and comfort preferences.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($categories as $cat)
                    @php
                        // Pick category image thumbnail
                        $catImage = match(strtolower($cat->slug)) {
                            'trekking', 'trending-treks' => asset('assets/K2-&-Concordia.webp'),
                            'expeditions' => asset('assets/Front-banner-k2.webp'),
                            'tours' => asset('assets/Rushlake.webp'),
                            'rock-climbing' => asset('assets/charakusa.jpg'),
                            default => asset('assets/SnowLake.webp'),
                        };
                    @endphp
                    <a href="{{ route('type.index', $cat->slug) }}"
                       class="category-card group relative h-80 rounded-3xl overflow-hidden shadow-md flex flex-col justify-end p-6 border border-slate-200">
                        <img src="{{ $catImage }}"
                             alt="{{ $cat->name }}"
                             class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/60 to-transparent"></div>

                        <div class="relative z-10 text-white">
                            <div class="w-12 h-12 rounded-2xl bg-white/15 backdrop-blur-md flex items-center justify-center text-brand-400 mb-4 group-hover:bg-brand-500 group-hover:text-white transition-colors">
                                <i class="{{ $cat->icon ?: 'fas fa-mountain' }} text-xl"></i>
                            </div>
                            <h3 class="font-display text-2xl font-bold group-hover:text-brand-300 transition-colors">
                                {{ $cat->name }}
                            </h3>
                            <p class="mt-1 text-xs text-white/70">
                                {{ $cat->trending_treks_count }} {{ \Str::plural('Experience', $cat->trending_treks_count) }} Available
                            </p>
                            <div class="mt-4 flex items-center gap-2 text-xs font-semibold text-brand-400 group-hover:text-brand-300">
                                <span>Discover routes</span>
                                <i class="fas fa-arrow-right text-[10px] transition-transform group-hover:translate-x-1"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         4. POPULAR / TRENDING TRIPS
    ═══════════════════════════════════════════════ --}}
    <section class="py-14 md:py-16 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
                <div>
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700 uppercase tracking-widest">
                        <i class="fas fa-fire-alt text-[10px]"></i> Top Booked
                    </span>
                    <h2 class="mt-2 font-display text-2xl md:text-4xl font-bold text-slate-900 leading-tight">
                        Trending Adventures
                    </h2>
                    <p class="mt-2 text-slate-600 max-w-xl text-sm sm:text-base">
                        Our highest-rated expeditions booked by travelers worldwide for the upcoming trekking season.
                    </p>
                </div>
                <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-white shadow-md self-start md:self-auto">
                    <i class="fas fa-calendar-check"></i>
                    <span>Book Your Dates</span>
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($trendingTreks as $trek)
                    <x-trip-card :trek="$trek" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         5. WHY TRAVEL WITH KARAKORUM CROWN EXPEDITIONS
    ═══════════════════════════════════════════════ --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
                <div class="lg:col-span-6 space-y-6">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                        <i class="fas fa-shield-alt text-[10px]"></i> The KCE Standard
                    </span>
                    <h2 class="font-display text-3xl md:text-5xl font-bold text-slate-900 leading-tight">
                        Simple, transparent, and built for traveler confidence.
                    </h2>
                    <p class="text-slate-600 text-base md:text-lg leading-relaxed">
                        International guests traveling to northern Pakistan deserve absolute clarity. We specialize in safety-certified mountain logistics, authentic local guides, and zero hidden costs.
                    </p>

                    <div class="grid sm:grid-cols-2 gap-5 pt-4">
                        {{-- Trust Pillar 1 --}}
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5 shadow-xs">
                            <div class="w-12 h-12 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center text-lg mb-3">
                                <i class="fas fa-certificate"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base">Govt. Licensed Operator</h3>
                            <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">
                                SECP registered & certified with Department of Tourism Services Gilgit-Baltistan.
                            </p>
                        </div>

                        {{-- Trust Pillar 2 --}}
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5 shadow-xs">
                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg mb-3">
                                <i class="fas fa-hiking"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base">Native Skardu Guides</h3>
                            <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">
                                Born in the valleys of Karakoram with multi-generational high-altitude trekking wisdom.
                            </p>
                        </div>

                        {{-- Trust Pillar 3 --}}
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5 shadow-xs">
                            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-lg mb-3">
                                <i class="fas fa-hand-holding-heart"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base">Ethical Porter Treatment</h3>
                            <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">
                                Fair wages, full insurance, quality cold-weather gear, and strict weight limit enforcement.
                            </p>
                        </div>

                        {{-- Trust Pillar 4 --}}
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 p-5 shadow-xs">
                            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-lg mb-3">
                                <i class="fas fa-satellite-dish"></i>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base">Satellite Comms & Rescue</h3>
                            <p class="mt-1.5 text-xs text-slate-600 leading-relaxed">
                                Satellite communication devices on all remote treks with rapid helicopter evacuation coverage.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Visual Image Grid with Badges --}}
                <div class="lg:col-span-6 grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-lg bg-navy-950 relative">
                            <img src="{{ asset('assets/chacha.jpeg') }}" alt="CEO & Founder Muhammad Jaffar" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white text-xs">
                                <p class="font-bold text-sm">Muhammad Jaffar</p>
                                <p class="text-brand-300">Founder & Expedition Leader</p>
                            </div>
                        </div>
                        <div class="rounded-3xl bg-navy-950 p-6 text-white text-center shadow-lg">
                            <div class="font-display text-4xl font-bold text-brand-400">15+</div>
                            <p class="text-xs uppercase tracking-wider text-white/70 mt-1">Years Operating in Karakoram</p>
                        </div>
                    </div>

                    <div class="space-y-4 pt-8">
                        <div class="rounded-3xl bg-gradient-to-br from-brand-600 to-brand-800 p-6 text-white text-center shadow-lg">
                            <div class="font-display text-4xl font-bold">100%</div>
                            <p class="text-xs uppercase tracking-wider text-white/90 mt-1">Guaranteed Departure Rates</p>
                        </div>
                        <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-lg bg-navy-950 relative">
                            <img src="{{ asset('assets/shangrila-resort.webp') }}" alt="Shangrila Resort Skardu" class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white text-xs">
                                <p class="font-bold text-sm">Luxury Mountain Hospitality</p>
                                <p class="text-white/70">Handpicked boutique stays</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         6. FEATURED DESTINATIONS
    ═══════════════════════════════════════════════ --}}
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                    <i class="fas fa-map-pin text-[10px]"></i> Crown Jewels
                </span>
                <h2 class="mt-3 font-display text-3xl md:text-5xl font-bold text-slate-900">
                    Featured Destinations
                </h2>
                <p class="mt-3 text-slate-600 text-base">
                    From 8,000-meter giants to lush alpine plateaus, discover the iconic regions we call home.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                {{-- Destination 1 --}}
                <div class="group relative h-96 rounded-3xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/K2-&-Concordia.webp') }}" alt="Concordia & K2" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/40 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400 bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md">Baltoro Glacier</span>
                        <h3 class="font-display text-2xl font-bold mt-2">Concordia & K2</h3>
                        <p class="text-xs text-white/75 mt-1 line-clamp-2">The throne room of mountain gods, surrounded by four 8,000m peaks.</p>
                    </div>
                </div>

                {{-- Destination 2 --}}
                <div class="group relative h-96 rounded-3xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/Rushlake.webp') }}" alt="Deosai & Rush Lake" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/40 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400 bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md">High Altitude Plateau</span>
                        <h3 class="font-display text-2xl font-bold mt-2">Deosai National Park</h3>
                        <p class="text-xs text-white/75 mt-1 line-clamp-2">The world's second-highest alpine plateau with wild brown bears & wildflowers.</p>
                    </div>
                </div>

                {{-- Destination 3 --}}
                <div class="group relative h-96 rounded-3xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/Nagmavalley.webp') }}" alt="Nagma Valley & Hushe" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/40 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400 bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md">Granite Spires</span>
                        <h3 class="font-display text-2xl font-bold mt-2">Nagma Valley</h3>
                        <p class="text-xs text-white/75 mt-1 line-clamp-2">World-renowned granite rock climbing and pristine mountain streams.</p>
                    </div>
                </div>

                {{-- Destination 4 --}}
                <div class="group relative h-96 rounded-3xl overflow-hidden shadow-md">
                    <img src="{{ asset('assets/SnowLake.webp') }}" alt="Snow Lake & Hispar" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/40 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400 bg-white/10 px-2.5 py-1 rounded-full backdrop-blur-md">Glacial Traverse</span>
                        <h3 class="font-display text-2xl font-bold mt-2">Snow Lake (Lukpe La)</h3>
                        <p class="text-xs text-white/75 mt-1 line-clamp-2">A legendary high-altitude ice basin connecting Baltistan and Nagar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         7. SIMPLE "HOW BOOKING WORKS" (4-STEP VISUAL)
     ═══════════════════════════════════════════════ --}}
    <section class="py-14 md:py-16 bg-white border-t border-slate-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                    <i class="fas fa-check-circle text-[10px]"></i> Seamless Experience
                </span>
                <h2 class="mt-2 font-display text-2xl md:text-4xl font-bold text-slate-900">
                    How Booking Works
                </h2>
                <p class="mt-2 text-slate-600 text-sm sm:text-base">
                    From selecting your trek to landing in Islamabad, our process is transparent, secure, and stress-free.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 relative">
                {{-- Step 1 --}}
                <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-6 text-center relative hover:border-brand-300 transition-colors">
                    <div class="w-12 h-12 mx-auto rounded-2xl bg-navy-950 text-white font-display text-lg font-bold flex items-center justify-center mb-4 shadow-md">
                        01
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1.5">Choose Your Trip</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Browse our curated treks or submit a custom route inquiry tailored to your travel window.
                    </p>
                </div>

                {{-- Step 2 --}}
                <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-6 text-center relative hover:border-brand-300 transition-colors">
                    <div class="w-12 h-12 mx-auto rounded-2xl bg-navy-950 text-white font-display text-lg font-bold flex items-center justify-center mb-4 shadow-md">
                        02
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1.5">Select Date & Travelers</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Pick guaranteed departure dates, package tier (Standard, Premium, Private), and party size.
                    </p>
                </div>

                {{-- Step 3 --}}
                <div class="rounded-3xl border border-slate-200 bg-slate-50/60 p-6 text-center relative hover:border-brand-300 transition-colors">
                    <div class="w-12 h-12 mx-auto rounded-2xl bg-navy-950 text-white font-display text-lg font-bold flex items-center justify-center mb-4 shadow-md">
                        03
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1.5">Submit Booking</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Enter traveler information and receive an immediate reference code (<span class="font-mono text-brand-700 font-bold">KCE-2027-...</span>).
                    </p>
                </div>

                {{-- Step 4 --}}
                <div class="rounded-3xl border border-brand-200 bg-brand-50/40 p-6 text-center relative shadow-sm">
                    <div class="w-12 h-12 mx-auto rounded-2xl bg-brand-600 text-white font-display text-lg font-bold flex items-center justify-center mb-4 shadow-md">
                        04
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1.5">We Confirm Your Journey</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Our travel team reviews logistics, issues visa invitation letters, and guides your preparations.
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center gap-2 rounded-xl px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transition-all">
                    <i class="fas fa-calendar-check text-xs"></i>
                    <span>Start Your Booking Now</span>
                </a>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         8. INTERNATIONAL TRAVELER TESTIMONIALS
    ═══════════════════════════════════════════════ --}}
    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                    <i class="fas fa-quote-left text-[10px]"></i> Client Reviews
                </span>
                <h2 class="mt-3 font-display text-3xl md:text-5xl font-bold text-slate-900">
                    Trusted by Adventurers Worldwide
                </h2>
                <p class="mt-3 text-slate-600 text-base">
                    Read unedited feedback from international guests who experienced the Karakoram with our local team.
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <article class="rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex gap-1 text-amber-400 mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed">
                            “The communication from Karakorum Crown Expeditions was stellar from our very first WhatsApp inquiry. The K2 Base Camp trek was challenging, but our guide and porters made us feel completely safe and valued.”
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-brand-100 text-brand-700 font-bold flex items-center justify-center text-sm">
                            AG
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Anna & Markus</p>
                            <p class="text-xs text-slate-400">Germany · K2 & Concordia</p>
                        </div>
                    </div>
                </article>

                <article class="rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex gap-1 text-amber-400 mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed">
                            “An extraordinary mix of hospitality, professionalism, and jaw-dropping views in Deosai and Hunza. The booking system was straightforward, and they even handled our Pakistan visa LOI paperwork flawlessly.”
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center text-sm">
                            DC
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">David Chen</p>
                            <p class="text-xs text-slate-400">Canada · Hunza & Deosai Explorer</p>
                        </div>
                    </div>
                </article>

                <article class="rounded-3xl border border-slate-200/80 bg-white p-8 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex gap-1 text-amber-400 mb-4">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="text-slate-700 text-sm leading-relaxed">
                            “We booked a private expedition for our climbing club. Their gear, camp chefs, and high-altitude logistics were among the best we've experienced anywhere in the Himalayas or Karakoram.”
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center text-sm">
                            EW
                        </div>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Emma Watson</p>
                            <p class="text-xs text-slate-400">Australia · Nagma Valley Climbing</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- ═══════════════════════════════════════════════
         9. FREQUENTLY ASKED QUESTIONS
    ═══════════════════════════════════════════════ --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl text-center mx-auto mb-12">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-50 px-3.5 py-1 text-xs font-semibold text-brand-700 uppercase tracking-widest">
                    <i class="far fa-question-circle text-[10px]"></i> Traveler Queries
                </span>
                <h2 class="mt-3 font-display text-3xl md:text-5xl font-bold text-slate-900">
                    Frequently Asked Questions
                </h2>
                <p class="mt-3 text-slate-600 text-base">
                    Clear answers to the most common questions from international tourists.
                </p>
            </div>

            <div class="mt-10 max-w-3xl mx-auto space-y-4" id="home-faq-accordion">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition-colors">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left focus:outline-none">
                        <span class="font-bold text-slate-900 text-base">Do you provide visa support and Letter of Invitation (LOI)?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600 text-sm leading-relaxed border-t border-slate-200/60 bg-white" hidden>
                        Yes. As a licensed Pakistani tour operator, we issue official Letters of Invitation (LOI), complete itinerary documents, and tour registration papers required for the Pakistan online tourist visa.
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition-colors">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left focus:outline-none">
                        <span class="font-bold text-slate-900 text-base">Is traveling in Gilgit-Baltistan safe for international tourists?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600 text-sm leading-relaxed border-t border-slate-200/60 bg-white" hidden>
                        Gilgit-Baltistan is widely considered one of the safest, most welcoming regions in South Asia. Local communities are deeply hospitable to foreigners. We also register all treks with local tourism police and maintain satellite communications.
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition-colors">
                    <button type="button" class="faq-button flex w-full items-center justify-b    {{-- ═══════════════════════════════════════════════
         10. FINAL CALL TO ACTION
     ═══════════════════════════════════════════════ --}}
    <section class="relative bg-navy-950 py-16 md:py-20 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-25">
            <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Karakoram Mountains" loading="lazy" decoding="async" class="h-full w-full object-cover">
        </div>
        <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-3.5 py-1 text-xs uppercase tracking-[0.2em] text-brand-300 backdrop-blur-md mb-4">
                Begin Your Expedition
            </span>
            <h2 class="font-display text-3xl md:text-5xl font-bold leading-tight">
                Your Karakoram Adventure Starts Here.
            </h2>
            <p class="mt-3 text-white/80 text-sm md:text-base leading-relaxed max-w-xl mx-auto font-light">
                Discover the untouched majesty of K2, Concordia, and Gilgit-Baltistan with Pakistan's premier mountain travel company.
            </p>
            <div class="mt-6 flex flex-wrap gap-3 justify-center">
                <a href="#experiences" class="inline-flex items-center justify-center rounded-xl px-6 py-3 text-sm font-semibold text-slate-900 bg-white hover:bg-slate-100 transition-all shadow-lg">
                    <i class="fas fa-compass mr-2 text-brand-600"></i> Explore Trips
                </a>
                <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transition-all">
                    <i class="fas fa-calendar-check mr-2"></i> Book Now
                </a>
            </div>
        </div>
    </section>��═══════════════════════════════════ --}}
    <section class="relative bg-navy-950 py-24 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-25">
            <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Karakoram Mountains" loading="lazy" decoding="async" class="h-full w-full object-cover">
        </div>
        <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.25em] text-brand-300 backdrop-blur-md mb-6">
                Begin Your Expedition
            </span>
            <h2 class="font-display text-4xl md:text-6xl font-bold leading-tight">
                Your Karakoram Adventure Starts Here.
            </h2>
            <p class="mt-4 text-white/80 text-base md:text-lg leading-relaxed max-w-xl mx-auto font-light">
                Discover the untouched majesty of K2, Concordia, and Gilgit-Baltistan with Pakistan's premier mountain travel company.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#experiences" class="inline-flex items-center justify-center rounded-xl px-8 py-4 font-bold text-base text-slate-900 bg-white hover:bg-slate-100 transition-all shadow-xl">
                    <i class="fas fa-compass mr-2 text-brand-600"></i> Explore Trips
                </a>
                <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-8 py-4 font-bold text-base text-white shadow-xl hover:shadow-2xl transition-all">
                    <i class="fas fa-calendar-check mr-2"></i> Book Now
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const faqAccordion = document.getElementById('home-faq-accordion');

            if (!faqAccordion) return;

            faqAccordion.addEventListener('click', function (event) {
                const button = event.target.closest('.faq-button');
                if (!button) return;

                const panel = button.nextElementSibling;
                const icon = button.querySelector('.faq-icon');
                const isOpen = !panel.hidden;

                faqAccordion.querySelectorAll('.faq-panel').forEach(function (item) {
                    item.hidden = true;
                });

                faqAccordion.querySelectorAll('.faq-icon').forEach(function (item) {
                    item.classList.remove('rotate-180');
                });

                if (!isOpen) {
                    panel.hidden = false;
                    icon.classList.add('rotate-180');
                }
            });
        });
    </script>
@endpush