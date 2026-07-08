@extends('layouts.app')

@section('title', 'Karakorum Crown Expeditions - Premium Treks & Tours in Gilgit-Baltistan')

@push('styles')
    .hero-glow {
        background: radial-gradient(circle at top, rgba(212, 168, 83, 0.18), transparent 42%);
    }

    .premium-card {
        transition: transform 0.35s ease, box-shadow 0.35s ease;
    }

    .premium-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
    }

    .faq-panel[hidden] {
        display: none;
    }
@endpush

@section('content')
    <section class="relative min-h-[92vh] flex items-end overflow-hidden bg-navy-950">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Gilgit-Baltistan mountains" class="h-full w-full object-cover opacity-80">
            <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-950/75 to-navy-950/35"></div>
            <div class="absolute inset-0 hero-glow"></div>
        </div>

        <div class="relative w-full pb-14 md:pb-20">
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl text-white">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-white/80 backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                        Premium adventures in Gilgit-Baltistan
                    </div>

                    <h1 class="mt-6 max-w-3xl font-display text-5xl leading-tight md:text-7xl text-balance">
                        Discover the wild, luxury side of northern Pakistan.
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg md:text-xl text-white/78 leading-relaxed">
                        Curated treks, cultural journeys, and mountain experiences designed for international travelers who expect comfort, safety, and unforgettable scenery.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="#experiences" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 text-base font-semibold text-white">
                            Explore Experiences
                        </a>
                        <a href="tel:+923131562859" class="btn-outline-light inline-flex items-center justify-center rounded-xl px-7 py-4 text-base font-semibold text-white">
                            Talk to a Travel Expert
                        </a>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-3 sm:grid-cols-3 max-w-3xl">
                        <div class="rounded-2xl border border-white/10 bg-white/8 p-4 backdrop-blur-md">
                            <div class="text-2xl font-display text-white">30+</div>
                            <p class="text-sm text-white/70 mt-1">Countries served</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/8 p-4 backdrop-blur-md">
                            <div class="text-2xl font-display text-white">Licensed</div>
                            <p class="text-sm text-white/70 mt-1">Certified local operator</p>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/8 p-4 backdrop-blur-md">
                            <div class="text-2xl font-display text-white">24/7</div>
                            <p class="text-sm text-white/70 mt-1">Support for travelers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-b border-slate-200 bg-white">
        <div class="container mx-auto px-4 lg:px-8 py-6">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4 text-center">
                <div>
                    <p class="text-sm font-semibold tracking-[0.2em] uppercase text-slate-500">Licensed</p>
                    <p class="mt-2 text-slate-900 font-semibold">Government registered</p>
                </div>
                <div>
                    <p class="text-sm font-semibold tracking-[0.2em] uppercase text-slate-500">Safety</p>
                    <p class="mt-2 text-slate-900 font-semibold">Guides, permits, rescue planning</p>
                </div>
                <div>
                    <p class="text-sm font-semibold tracking-[0.2em] uppercase text-slate-500">Local Experts</p>
                    <p class="mt-2 text-slate-900 font-semibold">Born in the region</p>
                </div>
                <div>
                    <p class="text-sm font-semibold tracking-[0.2em] uppercase text-slate-500">Fast Response</p>
                    <p class="mt-2 text-slate-900 font-semibold">Clear WhatsApp support</p>
                </div>
            </div>
        </div>
    </section>

    <section id="experiences" class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600">Featured Experiences</p>
                <h2 class="mt-3 font-display text-4xl md:text-5xl text-slate-900">Choose the journey that fits your style.</h2>
                <p class="mt-4 text-lg leading-relaxed text-slate-600">We keep the homepage focused on the experiences that matter most to first-time visitors: trekking, culture, and scenic touring.</p>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="premium-card overflow-hidden rounded-3xl bg-white shadow-lg border border-slate-100">
                    <img src="{{ asset('assets/K2-&-Concordia.webp') }}" alt="K2 and Concordia trek" class="h-64 w-full object-cover">
                    <div class="p-7">
                        <span class="inline-flex rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-brand-700">Trek</span>
                        <h3 class="mt-4 font-display text-2xl text-slate-900">K2 Base Camp & Concordia</h3>
                        <p class="mt-3 text-slate-600">The signature Karakoram experience for serious adventure travelers seeking the world’s most iconic mountain scenery.</p>
                        <a href="{{ route('trek.show', 'k2-base-camp-trek') }}" class="mt-6 inline-flex items-center gap-2 font-semibold text-brand-700 hover:text-brand-800">
                            View trek <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </article>

                <article class="premium-card overflow-hidden rounded-3xl bg-white shadow-lg border border-slate-100">
                    <img src="{{ asset('assets/Rushlake.webp') }}" alt="Scenic lakes and valleys" class="h-64 w-full object-cover">
                    <div class="p-7">
                        <span class="inline-flex rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-brand-700">Tour</span>
                        <h3 class="mt-4 font-display text-2xl text-slate-900">Hunza, Skardu & Deosai</h3>
                        <p class="mt-3 text-slate-600">A polished route for travelers who want premium comfort, lakes, valleys, and dramatic viewpoints without unnecessary complexity.</p>
                        <a href="{{ route('trek.show', 'hunza-panorama-tour') }}" class="mt-6 inline-flex items-center gap-2 font-semibold text-brand-700 hover:text-brand-800">
                            Plan a tour <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </article>

                <article class="premium-card overflow-hidden rounded-3xl bg-white shadow-lg border border-slate-100">
                    <img src="{{ asset('assets/shangrila-resort.webp') }}" alt="Luxury mountain hospitality" class="h-64 w-full object-cover">
                    <div class="p-7">
                        <span class="inline-flex rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold uppercase tracking-[0.18em] text-brand-700">Comfort</span>
                        <h3 class="mt-4 font-display text-2xl text-slate-900">Cultural Stays & Hospitality</h3>
                        <p class="mt-3 text-slate-600">Handpicked accommodation, local guidance, and calmer itineraries for photographers, couples, and premium leisure travelers.</p>
                        <a href="/about-us" class="mt-6 inline-flex items-center gap-2 font-semibold text-brand-700 hover:text-brand-800">
                            Learn more <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600">Why Travelers Book With Us</p>
                    <h2 class="mt-3 font-display text-4xl md:text-5xl text-slate-900">Simple, transparent, and built for confidence.</h2>
                    <p class="mt-4 text-lg leading-relaxed text-slate-600">International guests need clarity. We focus on clear communication, realistic itineraries, and a calm booking experience that feels trustworthy from the first click.</p>

                    <div class="mt-8 space-y-4">
                        <div class="flex gap-4 rounded-2xl bg-slate-50 p-5 shadow-sm border border-slate-100">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fas fa-shield-alt"></i></div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Safety-led planning</h3>
                                <p class="mt-1 text-sm text-slate-600">Permits, weather awareness, rescue readiness, and trained local support.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 rounded-2xl bg-slate-50 p-5 shadow-sm border border-slate-100">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fas fa-language"></i></div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Clear communication</h3>
                                <p class="mt-1 text-sm text-slate-600">Fast responses in English for international travelers and planning assistance before arrival.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 rounded-2xl bg-slate-50 p-5 shadow-sm border border-slate-100">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-700"><i class="fas fa-map-marked-alt"></i></div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Curated local knowledge</h3>
                                <p class="mt-1 text-sm text-slate-600">The itineraries highlight the best scenic, cultural, and adventure moments without unnecessary filler.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl bg-navy-900 p-7 text-white shadow-xl sm:mt-12">
                        <div class="text-4xl font-display text-brand-400">24/7</div>
                        <p class="mt-3 text-white/70">Support for trip coordination and urgent travel questions.</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-7 shadow-xl border border-slate-100">
                        <div class="text-4xl font-display text-slate-900">100%</div>
                        <p class="mt-3 text-slate-600">Focus on transparency, realistic expectations, and traveler comfort.</p>
                    </div>
                    <div class="rounded-3xl bg-slate-50 p-7 shadow-xl border border-slate-100">
                        <div class="text-4xl font-display text-slate-900">Local</div>
                        <p class="mt-3 text-slate-600">Guides who understand the terrain, culture, and remote mountain logistics.</p>
                    </div>
                    <div class="rounded-3xl bg-brand-600 p-7 text-white shadow-xl">
                        <div class="text-4xl font-display">Trusted</div>
                        <p class="mt-3 text-white/85">Premium travel support for Europe, North America, Australia, and beyond.</p>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl text-center mx-auto md:text-left md:mx-0">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600">Our Experts</p>
                <h2 class="mt-3 font-display text-4xl md:text-5xl text-slate-900">Meet the local experts.</h2>
                <p class="mt-4 text-lg text-slate-600">Our professional tour guides ensure you have a safe, memorable, and deeply authentic experience in Gilgit-Baltistan.</p>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Team Member (CEO) -->
                <div class="group relative rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 bg-slate-50 transition-all hover:shadow-2xl hover:-translate-y-2 duration-500">
                    <div class="aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/chacha.jpeg') }}" alt="Chacha - CEO & Founder" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>

                <!-- Social Icons -->
                    <div class="absolute top-4 right-4 flex flex-col gap-2 z-10">
                        <a href="https://www.facebook.com/share/p/17iuJ5e7GJ/" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                    
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-navy-950 via-navy-900/80 to-transparent p-8 pt-24 opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="font-display text-3xl text-white">Muhammad Jaffar</h3>
                        <p class="text-brand-400 text-xs font-bold uppercase tracking-[0.2em] mt-2">CEO & Founder</p>
                    </div>
                </div>

                <!-- Team Member 1 -->
                <div class="group relative rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 bg-slate-50 transition-all hover:shadow-2xl hover:-translate-y-2 duration-500">
                    <div class="aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/imran.jpg') }}" alt="Imran - Professional Tour Guide" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-navy-950 via-navy-900/80 to-transparent p-8 pt-24 opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="font-display text-3xl text-white">Imran Ali</h3>
                        <p class="text-brand-400 text-xs font-bold uppercase tracking-[0.2em] mt-2">Professional Tour Guide</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="group relative rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 bg-slate-50 transition-all hover:shadow-2xl hover:-translate-y-2 duration-500">
                    <div class="aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/kami.jpeg') }}" alt="Kamran - Professional Tour Guide" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    
                    <!-- Social Icons -->
                    <div class="absolute top-4 right-4 flex flex-col gap-2 z-10">
                        <a href="https://www.instagram.com/muhammad_kamran321?igsh=MWRteTAwMm52czFucA%3D%3D&utm_source=qr" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@muhammad_kamran321" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all delay-75">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.facebook.com/share/14h3iR4rF7G/?mibextid=wwXIfr" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all delay-150">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-navy-950 via-navy-900/80 to-transparent p-8 pt-24 opacity-90 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        <h3 class="font-display text-3xl text-white">Muhammad Kamran</h3>
                        <p class="text-brand-400 text-xs font-bold uppercase tracking-[0.2em] mt-2">Professional Tour Guide</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="group relative rounded-[2rem] overflow-hidden shadow-sm border border-slate-100 bg-slate-50 transition-all hover:shadow-2xl hover:-translate-y-2 duration-500">
                    <div class="aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('assets/rizwan.jpeg') }}" alt="Rizwan - Professional Tour Guide" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    
                    <!-- Social Icons -->
                    <div class="absolute top-4 right-4 flex flex-col gap-2 z-10">
                        <a href="https://www.instagram.com/baltee__?igsh=a2t5OThlNjM1bnB0&utm_source=qr" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@baltee00" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all delay-75">
                            <i class="fab fa-tiktok"></i>
                        </a>
                        <a href="https://www.facebook.com/share/14h5yAM17Ge/?mibextid=wwXIfr" target="_blank" class="w-10 h-10 rounded-full bg-black/30 backdrop-blur-md flex items-center justify-center text-white hover:bg-brand-500 hover:scale-110 transition-all delay-150">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-navy-950 via-navy-900/80 to-transparent p-8 pt-24 opacity-90 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                        <h3 class="font-display text-3xl text-white">Rizwan Ali</h3>
                        <p class="text-brand-400 text-xs font-bold uppercase tracking-[0.2em] mt-2">Professional Tour Guide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600">Social Proof</p>
                <h2 class="mt-3 font-display text-4xl md:text-5xl text-slate-900">What international travelers value most.</h2>
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-3">
                <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm">
                    <div class="flex gap-1 text-gold-500"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="mt-5 text-slate-700 leading-relaxed">“The communication was excellent and the whole trip felt organized and safe. The mountains were beyond expectations.”</p>
                    <div class="mt-6 text-sm text-slate-500">Anna, Germany · K2 Base Camp</div>
                </article>
                <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm">
                    <div class="flex gap-1 text-gold-500"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="mt-5 text-slate-700 leading-relaxed">“A beautiful balance of adventure and comfort. I felt guided by people who truly know the region.”</p>
                    <div class="mt-6 text-sm text-slate-500">Daniel, Canada · Hunza Tour</div>
                </article>
                <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-sm">
                    <div class="flex gap-1 text-gold-500"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                    <p class="mt-5 text-slate-700 leading-relaxed">“Professional, responsive, and trustworthy. Exactly the kind of operator we were looking for.”</p>
                    <div class="mt-6 text-sm text-slate-500">Emma, Australia · Skardu & Deosai</div>
                </article>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-600">Frequently Asked Questions</p>
                <h2 class="mt-3 font-display text-4xl md:text-5xl text-slate-900">Quick answers before you book.</h2>
                <p class="mt-4 text-lg text-slate-600">These are the questions most travelers ask before planning a trip to Gilgit-Baltistan.</p>
            </div>

            <div class="mt-10 max-w-4xl space-y-4" id="faq-accordion">
                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-semibold text-slate-900">Do you help with itinerary planning and booking?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600" hidden>
                        Yes. We help you choose the right trek, route, or tour based on your travel dates, fitness level, and comfort preferences.
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-semibold text-slate-900">Is it safe for foreign travelers?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600" hidden>
                        We focus on safe routes, experienced local guides, realistic pacing, and clear coordination throughout the journey.
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-semibold text-slate-900">Can I book a private trip instead of a group tour?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600" hidden>
                        Yes. Private trips are available and are often the best option for couples, photographers, families, and premium travelers.
                    </div>
                </div>

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 shadow-sm">
                    <button type="button" class="faq-button flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                        <span class="font-semibold text-slate-900">What should I pack for a Gilgit-Baltistan trip?</span>
                        <i class="faq-icon fas fa-chevron-down text-brand-600 transition-transform"></i>
                    </button>
                    <div class="faq-panel px-6 pb-6 text-slate-600" hidden>
                        We share a practical packing list after booking, including clothing, footwear, and weather-based recommendations.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-navy-950 py-20 text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-8 md:p-12 backdrop-blur">
                <div class="grid gap-8 lg:grid-cols-2 lg:items-center">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-brand-400">Plan Your Trip</p>
                        <h2 class="mt-3 font-display text-4xl md:text-5xl">Ready to explore northern Pakistan with confidence?</h2>
                        <p class="mt-4 max-w-xl text-white/70 leading-relaxed">Tell us your dates and interests. We’ll suggest the right route and help you turn it into a premium travel experience.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                        <a href="https://wa.me/923425343629" target="_blank" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                            WhatsApp Us
                        </a>
                        <a href="mailto:karakorumcrownexpeditions@gmail.com
" class="btn-outline-light inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                            Email Inquiry
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const faqAccordion = document.getElementById('faq-accordion');

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