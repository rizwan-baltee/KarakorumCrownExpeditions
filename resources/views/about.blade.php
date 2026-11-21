@extends('layouts.app')

@section('title', 'About Us - Karakorum Crown Expeditions | Licensed Tour Operator in Skardu')
@section('meta_description', 'Meet Karakorum Crown Expeditions, a DTS-licensed tour operator in Skardu (CUIN: 0343091). Founded by high-altitude guide Muhammad Jaffar, we specialize in authentic Karakoram treks.')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden text-white">
    <div class="absolute inset-0 opacity-25 pointer-events-none">
        <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Karakoram Mountain Range" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/80 to-transparent pointer-events-none"></div>
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>

    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-4xl">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.2em] text-brand-300 backdrop-blur-md mb-6">
            <i class="fas fa-mountain text-brand-400"></i>
            <span>DTS Licensed Tour Operator in Skardu, Gilgit-Baltistan</span>
        </div>
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white leading-tight">
            Rooted in the Karakoram,<br>
            <span class="text-brand-400">Built on Trust & Local Heritage</span>
        </h1>
        <p class="mt-5 text-white/75 text-base sm:text-lg md:text-xl max-w-2xl mx-auto leading-relaxed font-light">
            Founded by native high-altitude expedition leader Muhammad Jaffar, Karakorum Crown Expeditions connects international travelers directly to the heart of Gilgit-Baltistan with certified mountain guidance and ethical porter welfare.
        </p>

        {{-- Verification Metadata Strip --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-6 text-xs text-white/70 pt-6 border-t border-white/10">
            <span class="flex items-center gap-2">
                <i class="fas fa-certificate text-brand-400"></i>
                <span>Registered CUIN: 0343091</span>
            </span>
            <span class="hidden sm:inline">•</span>
            <span class="flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-brand-400"></i>
                <span>Head Office: Satpara Road, Skardu</span>
            </span>
            <span class="hidden sm:inline">•</span>
            <span class="flex items-center gap-2">
                <i class="far fa-calendar-check text-brand-400"></i>
                <span>Established 2020</span>
            </span>
        </div>
    </div>
</section>

{{-- Who We Are & Trust Metrics (Honest Facts Only - No Spun Data) --}}
<section class="bg-white py-20 md:py-24 border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:items-center">
            <div class="space-y-6">
                <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase block">
                    Our Origin & Purpose
                </span>
                <h2 class="font-display text-3xl md:text-4xl lg:text-5xl text-navy-950 font-bold leading-tight">
                    Native Skardu Experts.<br>
                    Zero Middlemen.
                </h2>
                <div class="space-y-4 text-slate-600 text-base leading-relaxed">
                    <p>
                        For decades, international adventurers booking treks to K2, Concordia, and Snow Lake have had to navigate distant third-party travel agencies in Islamabad or abroad who outsource their ground operations.
                    </p>
                    <p>
                        <strong>Karakorum Crown Expeditions</strong> was founded in Skardu to change that. We are 100% locally owned and operated right here in Baltistan. Every guide on our team was raised in these mountain valleys, knows the seasonal shifts of the glaciers, and treats mountain porters like family.
                    </p>
                    <p>
                        When you message us, you are speaking directly to the team that will meet you at Skardu Airport, prepare your camp equipment, arrange your 4x4 mountain transport, and guide your footsteps across the moraines.
                    </p>
                </div>
            </div>

            {{-- 4 Honest, Verifiable Metric Cards --}}
            <div>
                <div class="bg-gradient-to-br from-navy-950 to-navy-900 rounded-3xl p-8 md:p-10 text-white shadow-xl relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-48 h-48 bg-brand-500/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="grid grid-cols-2 gap-4 relative z-10">
                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 hover:bg-white/15 transition-colors">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-brand-300 mb-1">100%</div>
                            <div class="text-xs font-semibold uppercase tracking-wider text-white">Native Skardu Team</div>
                            <p class="text-[11px] text-white/60 mt-1">Born & trained in the valleys of Gilgit-Baltistan.</p>
                        </div>

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 hover:bg-white/15 transition-colors">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-brand-300 mb-1">0343091</div>
                            <div class="text-xs font-semibold uppercase tracking-wider text-white">Official CUIN</div>
                            <p class="text-[11px] text-white/60 mt-1">DTS Licensed tour operator with valid registration.</p>
                        </div>

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 hover:bg-white/15 transition-colors">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-brand-300 mb-1">25 kg</div>
                            <div class="text-xs font-semibold uppercase tracking-wider text-white">Porter Weight Cap</div>
                            <p class="text-[11px] text-white/60 mt-1">Strict adherence to CKNP fair mountain labor laws.</p>
                        </div>

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-5 hover:bg-white/15 transition-colors">
                            <div class="text-2xl sm:text-3xl font-display font-bold text-brand-300 mb-1">&lt; 24h</div>
                            <div class="text-xs font-semibold uppercase tracking-wider text-white">Direct Response</div>
                            <p class="text-[11px] text-white/60 mt-1">Honest advice via WhatsApp & verified email.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Founder's Story & Guide Credentials (Deep E-E-A-T Spotlight) --}}
<section class="py-20 md:py-24 bg-slate-50 border-b border-slate-200/70">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="max-w-3xl mx-auto text-center mb-14">
            <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase block mb-3">
                Leadership Spotlight
            </span>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-navy-950">
                Meet Founder Muhammad Jaffar
            </h2>
            <p class="text-slate-600 text-base mt-3">
                A life dedicated to the high passes, glaciers, and mountain communities of the Karakoram.
            </p>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-md overflow-hidden">
            <div class="flex flex-col lg:flex-row w-full overflow-hidden">
                {{-- Founder Photo Column --}}
                <div class="w-full lg:w-5/12 relative bg-navy-950 min-h-[320px] sm:min-h-[420px] lg:min-h-[520px] flex-shrink-0 max-w-full">
                    <img src="{{ asset('assets/chacha.jpeg') }}"
                         alt="Muhammad Jaffar - Founder & Expedition Director"
                         class="absolute inset-0 w-full h-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/90 via-navy-950/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 text-white z-10">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-brand-500/20 text-brand-300 border border-brand-500/30 text-xs font-semibold mb-2">
                            <i class="fas fa-compass"></i> High-Altitude Sirdar & Lead Guide
                        </span>
                        <h3 class="text-2xl font-display font-bold">Muhammad Jaffar</h3>
                        <p class="text-xs text-white/70">Founder & Managing Director, Karakorum Crown Expeditions</p>
                    </div>
                </div>

                {{-- Founder Bio & Credentials Column --}}
                <div class="w-full lg:w-7/12 p-5 sm:p-8 md:p-12 space-y-5 sm:space-y-6 flex-1 min-w-0 max-w-full">
                    <div>
                        <h4 class="font-display text-xl md:text-2xl font-bold text-navy-900 mb-3">
                            From Trail Porter to Expedition Director
                        </h4>
                        <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                            Born and raised in the rugged mountain villages of Baltistan, Muhammad Jaffar's journey started where all great Karakoram stories begin: on the stone trails and glacial moraines of the Baltoro. Over more than two decades, he ascended through the ranks from trail porter to camp manager, senior high-altitude guide, and trusted expedition sirdar.
                        </p>
                    </div>

                    <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                        Throughout his career, Jaffar has guided international mountaineers, scientific surveys, and trekking groups across Gondogoro La (5,585 m), Concordia, K2 Base Camp, Hispar La, and the Nangma Valley. In 2020, he established <strong>Karakorum Crown Expeditions</strong> with a singular mission: to bring authentic local leadership, fair porter compensation, and unwavering high-altitude safety to international mountain tourism in Pakistan.
                    </p>

                    {{-- Verified Guide Credentials Box --}}
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 space-y-3">
                        <h5 class="text-xs font-bold uppercase tracking-wider text-slate-800 flex items-center gap-2">
                            <i class="fas fa-award text-brand-600"></i> Field Credentials & Safety Certifications
                        </h5>
                        <div class="grid sm:grid-cols-2 gap-3 text-xs text-slate-700">
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-emerald-600 mt-0.5"></i>
                                <span><strong>DTS Certified Mountain Guide:</strong> Licensed under Gilgit-Baltistan Tourism Department.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-emerald-600 mt-0.5"></i>
                                <span><strong>High-Altitude Medicine:</strong> Wilderness First Responder trained for AMS, HAPE, & HACE protocols.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-emerald-600 mt-0.5"></i>
                                <span><strong>Glacier Safety & Rescue:</strong> Expert crevasse extraction, icefall route-finding, & fixed ropes.</span>
                            </div>
                            <div class="flex items-start gap-2">
                                <i class="fas fa-check-circle text-emerald-600 mt-0.5"></i>
                                <span><strong>Helicopter Coordination:</strong> Direct emergency liaison with Askari Aviation / Pakistan Army.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quote / Personal Philosophy --}}
                    <blockquote class="border-l-4 border-brand-500 pl-4 py-1 italic text-xs md:text-sm text-slate-700 bg-brand-50/40 rounded-r-xl">
                        "The Karakoram is not just a destination for us; it is our ancestral home. We owe our guests honest guidance and absolute safety, and we owe our mountain porters dignity, fair wages, and warm gear."
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Full Team Showcase --}}
<section class="py-20 md:py-24 bg-white border-b border-slate-100" id="our-team">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase block mb-3">
                Local Leadership
            </span>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-navy-950">
                The Ground Team Behind Your Journey
            </h2>
            <p class="text-slate-600 text-base mt-3">
                Native mountain experts, certified coordinators, and travel advisors based in Skardu.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">

            {{-- Team Member 1: Muhammad Jaffar --}}
            <div class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="h-[290px] sm:h-[350px] md:h-[380px] w-full overflow-hidden bg-navy-950 relative">
                    <img src="{{ asset('assets/chacha.jpeg') }}"
                         alt="Muhammad Jaffar - Founder & Expedition Director"
                         class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/70 via-transparent to-transparent opacity-60"></div>
                    <span class="absolute top-4 left-4 inline-flex items-center gap-1 rounded-full bg-navy-950/80 backdrop-blur-md border border-white/20 px-3 py-1 text-[11px] font-semibold text-brand-300">
                        Leadership
                    </span>
                    <div class="absolute top-4 right-4 flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/p/17iuJ5e7GJ/" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#1877F2] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-900 group-hover:text-brand-700 transition-colors">
                            Muhammad Jaffar
                        </h3>
                        <p class="text-xs font-bold text-brand-700 uppercase tracking-wider mt-1">
                            Founder & Expedition Director
                        </p>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed">
                            20+ years of Karakoram mountaineering experience. Leads high-altitude route planning, safety protocols, and guide training.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1 text-[11px] text-slate-500">
                        <i class="fas fa-check-circle text-emerald-600"></i>
                        <span>High-Altitude Sirdar</span>
                    </div>
                </div>
            </div>

            {{-- Team Member 2: Rizwan Ali --}}
            <div class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="h-[290px] sm:h-[350px] md:h-[380px] w-full overflow-hidden bg-navy-950 relative">
                    <img src="{{ asset('assets/rizwan.jpeg') }}"
                         alt="Rizwan Ali - Director of Operations"
                         class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/70 via-transparent to-transparent opacity-60"></div>
                    <span class="absolute top-4 left-4 inline-flex items-center gap-1 rounded-full bg-navy-950/80 backdrop-blur-md border border-white/20 px-3 py-1 text-[11px] font-semibold text-brand-300">
                        Management
                    </span>
                    <div class="absolute top-4 right-4 flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/1JpwRykraQ/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#1877F2] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/baltee__?dmpr=a2t5OThlNjM1bnB0&utm_source=qr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#E4405F] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-900 group-hover:text-brand-700 transition-colors">
                            Rizwan Ali
                        </h3>
                        <p class="text-xs font-bold text-brand-700 uppercase tracking-wider mt-1">
                            Director of Operations
                        </p>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed">
                            Oversees base operations in Skardu, government permit clearances, Ministry of Interior LOIs, and domestic transport links.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1 text-[11px] text-slate-500">
                        <i class="fas fa-check-circle text-emerald-600"></i>
                        <span>Permits & Flight Logistics</span>
                    </div>
                </div>
            </div>

            {{-- Team Member 3: Imran Ali --}}
            <div class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="h-[290px] sm:h-[350px] md:h-[380px] w-full overflow-hidden bg-navy-950 relative">
                    <img src="{{ asset('assets/imran.jpg') }}"
                         alt="Imran Ali - Expedition Coordinator"
                         class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/70 via-transparent to-transparent opacity-60"></div>
                    <span class="absolute top-4 left-4 inline-flex items-center gap-1 rounded-full bg-navy-950/80 backdrop-blur-md border border-white/20 px-3 py-1 text-[11px] font-semibold text-brand-300">
                        Expeditions
                    </span>
                    <div class="absolute top-4 right-4 flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/19G6SuYcdr/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#1877F2] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/imranali_129?igsh=MWNxZDZoOXBudTBjdg%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#E4405F] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-900 group-hover:text-brand-700 transition-colors">
                            Imran Ali
                        </h3>
                        <p class="text-xs font-bold text-brand-700 uppercase tracking-wider mt-1">
                            Expedition Coordinator
                        </p>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed">
                            Manages trail operations, porter rosters, campsite setups at Urdukas and Concordia, and trail satellite communications.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1 text-[11px] text-slate-500">
                        <i class="fas fa-check-circle text-emerald-600"></i>
                        <span>Trail & Camp Specialist</span>
                    </div>
                </div>
            </div>

            {{-- Team Member 4: Kami (Kamran) --}}
            <div class="group rounded-3xl overflow-hidden bg-white border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col">
                <div class="h-[290px] sm:h-[350px] md:h-[380px] w-full overflow-hidden bg-navy-950 relative">
                    <img src="{{ asset('assets/kami.jpeg') }}"
                         alt="Kami - Tourist Advisor"
                         class="h-full w-full object-cover object-bottom group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/70 via-transparent to-transparent opacity-60"></div>
                    <span class="absolute top-4 left-4 inline-flex items-center gap-1 rounded-full bg-navy-950/80 backdrop-blur-md border border-white/20 px-3 py-1 text-[11px] font-semibold text-brand-300">
                        Advisory
                    </span>
                    <div class="absolute top-4 right-4 flex flex-col gap-2">
                        <a href="https://www.facebook.com/share/14h3iR4rF7G/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#1877F2] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/muhammad_kamran321?igsh=MWRteTAwMm52czFucA%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-white text-slate-900 hover:bg-[#E4405F] hover:text-white flex items-center justify-center text-xs shadow-md transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-lg text-slate-900 group-hover:text-brand-700 transition-colors">
                            Kami (Kamran)
                        </h3>
                        <p class="text-xs font-bold text-brand-700 uppercase tracking-wider mt-1">
                            Senior Travel Advisor
                        </p>
                        <p class="text-xs text-slate-600 mt-3 leading-relaxed">
                            First point of contact for international travelers. Custom itinerary design, gear consultation, and visa guidance.
                        </p>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center gap-1 text-[11px] text-slate-500">
                        <i class="fas fa-check-circle text-emerald-600"></i>
                        <span>Client Consultation & Visas</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Company Registration & Legal Licensing Details --}}
<section class="py-16 md:py-20 bg-slate-50 border-b border-slate-200/70">
    <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
        <div class="bg-white rounded-3xl border border-slate-200 p-8 md:p-12 shadow-sm">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 rounded-2xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center text-xl">
                    <i class="fas fa-id-card"></i>
                </div>
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Verifiable Compliance</span>
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-slate-900">
                        Government Registration & Licensing
                    </h2>
                </div>
            </div>

            <p class="text-slate-600 text-sm leading-relaxed mb-8">
                Operating high-altitude wilderness expeditions in Pakistan requires rigorous regulatory clearance and institutional oversight. Karakorum Crown Expeditions is fully licensed and recognized by the competent authorities:
            </p>

            <div class="grid sm:grid-cols-2 gap-6 text-xs">
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                    <span class="text-brand-700 font-bold block text-sm">Corporate Registration</span>
                    <p class="text-slate-600"><strong>Registered CUIN:</strong> 0343091</p>
                    <p class="text-slate-600"><strong>Legal Title:</strong> Karakorum Crown Expeditions</p>
                    <p class="text-slate-600"><strong>Jurisdiction:</strong> Skardu, Gilgit-Baltistan, Pakistan</p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-2">
                    <span class="text-brand-700 font-bold block text-sm">Tourism Authorizations</span>
                    <p class="text-slate-600"><strong>Licensing Body:</strong> Department of Tourist Services (DTS), GB</p>
                    <p class="text-slate-600"><strong>National Park Permits:</strong> Authorized CKNP & Deosai Operator</p>
                    <p class="text-slate-600"><strong>Visa Sponsorship:</strong> Verified LOI Provider for Pakistan E-Visa</p>
                </div>
            </div>

            <div class="mt-6 p-4 rounded-2xl bg-blue-50 border border-blue-200 text-blue-900 text-xs flex items-start gap-3">
                <i class="fas fa-building text-blue-600 text-base mt-0.5 flex-shrink-0"></i>
                <div>
                    <strong>Physical Headquarters in Skardu:</strong> Satpara Road, Zhye Thang 1, Near Hispar Hotel, Skardu, Gilgit-Baltistan (Postal Code: 16100). International clients and partners are welcome to visit our operations room before departing for the trail.
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Porter Welfare & Environmental Policy --}}
<section class="py-20 md:py-24 bg-white border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase block">
                    Our Core Responsibility
                </span>
                <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-navy-950 leading-tight">
                    Fair Porter Treatment & Glacier Protection
                </h2>
                <div class="space-y-4 text-slate-600 text-base leading-relaxed">
                    <p>
                        High mountain treks in Pakistan would be impossible without the courage and stamina of our Balti porters. At Karakorum Crown Expeditions, ethical porter treatment is our non-negotiable core standard.
                    </p>
                    <p>
                        We enforce a strict <strong>25 kg load limit</strong> per porter, provide hot nutritional meals equal to our guests, provide warm mountain tents and high-altitude gear, and guarantee medical support throughout the journey.
                    </p>
                    <p>
                        We are also committed to preserving the fragile ecosystems of the Central Karakoram National Park (CKNP). All non-biodegradable waste is sorted, packed, and carried back down to Skardu for proper disposal.
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-weight-hanging"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">Strict 25kg Porter Weight Cap</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">No porter is overloaded. Scales are used at every roadhead checkpoint in Askole and Hushe.</p>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">Fair Living Wages & Gear</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">Porters receive competitive daily rates, warm boots, protective sunglasses, and mountain tents.</p>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-lg flex-shrink-0">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-base mb-1">Leave No Trace On Glaciers</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">All tin cans, gas canisters, and plastic packaging are hauled off Baltoro and Biafo glaciers to Skardu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Ready to Plan CTA --}}
<section class="bg-navy-950 py-20 text-white relative overflow-hidden">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
        <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
            Plan Your Journey With Our Skardu Team
        </h2>
        <p class="text-white/70 text-base md:text-lg mb-8 leading-relaxed">
            Have questions about K2 Base Camp, Gondogoro La, permits, or custom family tours? Talk directly with Muhammad Jaffar and our expedition specialists.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/923425343629" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-2xl px-8 py-4 font-bold text-slate-900 bg-brand-400 hover:bg-brand-300 transition-colors shadow-lg">
                <i class="fab fa-whatsapp mr-2 text-lg text-emerald-800"></i> WhatsApp: +92 3425343629
            </a>
            <a href="{{ route('booking.create') }}" class="inline-flex items-center justify-center rounded-2xl px-8 py-4 font-bold text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-colors">
                <i class="fas fa-calendar-check mr-2"></i> Request Trip Quote
            </a>
        </div>
    </div>
</section>

@endsection
