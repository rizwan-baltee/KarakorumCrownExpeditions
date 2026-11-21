@extends('layouts.app')

@section('title', 'Pure Himalayan Salajeet (Shilajit) from Skardu - Karakorum Crown Expeditions')
@section('meta_description', '100% authentic, high-altitude gold-grade Salajeet (Shilajit) sustainably harvested from the cliff faces of Skardu and Shigar in Gilgit-Baltistan. Sun-purified in glacial water with 84+ minerals.')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden text-white">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="absolute top-1/4 -right-20 w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-[150px] pointer-events-none"></div>
    <div class="absolute bottom-0 -left-20 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[150px] pointer-events-none"></div>

    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-4xl">
        <div class="inline-flex items-center gap-2 rounded-full border border-amber-400/30 bg-amber-400/10 px-4 py-1.5 text-xs uppercase tracking-[0.2em] text-amber-300 backdrop-blur-md mb-6">
            <i class="fas fa-gem text-amber-400"></i>
            <span>100% Pure Organic Gold Resin • Harvested in Skardu</span>
        </div>

        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-tight">
            Pure Himalayan<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-200">
                Salajeet (Shilajit)
            </span>
        </h1>

        <p class="mt-5 text-white/75 text-base sm:text-lg md:text-xl max-w-2xl mx-auto leading-relaxed font-light">
            Harvested from steep rock fractures above 16,000 feet in the Karakoram range. Purified through the ancestral 30-day sunlight settling method with glacial water — never boiled, zero chemical additives.
        </p>

        {{-- Trust Metrics Strip --}}
        <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-3 max-w-3xl mx-auto text-left">
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                <span class="text-amber-400 font-bold block text-sm sm:text-base">16,000+ FT</span>
                <span class="text-white/60 text-xs">High-Altitude Extraction</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                <span class="text-amber-400 font-bold block text-sm sm:text-base">84+ Minerals</span>
                <span class="text-white/60 text-xs">Rich in Fulvic Acid</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                <span class="text-amber-400 font-bold block text-sm sm:text-base">30 Days</span>
                <span class="text-white/60 text-xs">Natural Sun-Purification</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">
                <span class="text-amber-400 font-bold block text-sm sm:text-base">100% Raw</span>
                <span class="text-white/60 text-xs">Zero Additives or Sugar</span>
            </div>
        </div>

        {{-- CTA Buttons --}}
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/923425343629?text={{ urlencode('Hello Karakorum Crown Expeditions! I want to order pure Baltistan Salajeet.') }}"
               target="_blank"
               rel="noopener noreferrer"
               class="btn-primary inline-flex items-center justify-center w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-white shadow-xl hover:shadow-2xl transition-all gap-2 text-base">
                <i class="fab fa-whatsapp text-xl text-white"></i>
                <span>Order via WhatsApp (+92 3425343629)</span>
            </a>
            <a href="#packages"
               class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-4 rounded-2xl font-semibold text-white/90 bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-md transition-all gap-2 text-base">
                <i class="fas fa-box-open text-amber-300"></i>
                <span>View Jars & Pricing</span>
            </a>
        </div>
    </div>

    {{-- Field Video Showcase --}}
    @if(file_exists(public_path('assets/salajeet.MOV')))
    <div class="relative w-full mt-14 max-w-5xl mx-auto px-4">
        <div class="relative rounded-3xl overflow-hidden border border-amber-500/30 bg-black/60 shadow-2xl group" style="box-shadow: 0 0 50px rgba(245, 158, 11, 0.15);">
            <div class="absolute top-4 left-4 z-20 inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-navy-950/80 backdrop-blur-md border border-white/20 text-xs text-amber-300 font-semibold">
                <i class="fas fa-video text-amber-400"></i>
                <span>Direct Field Video: Pure Balti Salajeet Extraction</span>
            </div>
            <video 
                class="w-full h-[40vh] sm:h-[55vh] md:h-[65vh] object-cover" 
                controls 
                preload="metadata"
                playsinline>
                <source src="{{ asset('assets/salajeet.MOV') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <p class="text-center text-xs text-white/50 mt-3 flex items-center justify-center gap-1.5">
            <i class="fas fa-info-circle text-amber-400"></i>
            <span>Recorded on location in the high mountain cliffs of Baltistan by our native harvesting partners.</span>
        </p>
    </div>
    @endif
</section>

{{-- Key Natural Benefits Section --}}
<section class="bg-white py-20 md:py-24 border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 text-xs font-bold tracking-[0.25em] uppercase block mb-3">
                Nature's Ancient Vitality Secret
            </span>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-navy-950">
                Why Karakoram Salajeet Is Renowned Worldwide
            </h2>
            <p class="text-slate-600 text-base md:text-lg mt-4 leading-relaxed">
                Known in Sanskrit as <em>"Conqueror of Mountains and Destroyer of Weakness"</em>, pure Salajeet is a naturally occurring resin packed with bio-available trace minerals and active fulvic compounds.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Benefit 1 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">Cellular Energy & Stamina</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    Fulvic acid helps transport minerals directly into cells, enhancing mitochondrial ATP synthesis. Experience clean, sustained vitality throughout the day without caffeine spikes or crashes.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-amber-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Sustainable Natural Endurance
                </div>
            </div>

            {{-- Benefit 2 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">Mental Clarity & Focus</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    Studies suggest the unique antioxidant profile of fulvic acid crosses the blood-brain barrier to combat oxidative stress, promoting sharper memory, alertness, and cognitive endurance.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-blue-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Antioxidant Cognitive Shield
                </div>
            </div>

            {{-- Benefit 3 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-mountain"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">High-Altitude Resilience</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    For centuries, Balti high-altitude porters and hunters have consumed Salajeet before scaling treacherous glaciers to improve oxygen delivery, counter altitude lethargy, and resist freezing temperatures.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-emerald-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Traditional Himalayan Secret
                </div>
            </div>

            {{-- Benefit 4 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-shield-virus"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">84+ Ionic Trace Minerals</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    Modern diets lack trace soil minerals. Karakoram Salajeet supplies zinc, magnesium, potassium, iron, and silica in natural ionic form that your body can absorb with up to 98% bioavailability.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-purple-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Full-Spectrum Nutrient Complex
                </div>
            </div>

            {{-- Benefit 5 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-rose-100 text-rose-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-running"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">Joint & Muscle Recovery</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    Natural humic and fulvic substances support healthy inflammatory response after intense workouts, long mountain treks, or physically demanding jobs, aiding tendon and joint comfort.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-rose-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Accelerated Muscle Recuperation
                </div>
            </div>

            {{-- Benefit 6 --}}
            <div class="bg-slate-50 border border-slate-200/80 rounded-3xl p-8 hover:shadow-xl hover:border-amber-400/50 transition-all duration-300 flex flex-col">
                <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-700 flex items-center justify-center text-2xl mb-6 shadow-sm">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 class="font-display text-xl font-bold text-navy-950 mb-3">Healthy Aging & Longevity</h3>
                <p class="text-slate-600 text-sm leading-relaxed flex-1">
                    As an adaptogen, it assists the body in balancing physical, environmental, and emotional stressors while encouraging collagen preservation and cellular hydration.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-200/60 text-xs font-semibold text-teal-700 flex items-center gap-1.5">
                    <i class="fas fa-check-circle"></i> Pure Adaptogenic Balance
                </div>
            </div>
        </div>
    </div>
</section>

{{-- The Traditional Aftabi Purification Process --}}
<section class="bg-slate-900 py-20 md:py-24 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Karakoram Mountains" class="w-full h-full object-cover">
    </div>

    <div class="relative container mx-auto px-4 lg:px-8 max-w-6xl">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-400 text-xs font-bold tracking-[0.25em] uppercase block mb-3">
                Ancestral Craftsmanship
            </span>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-white">
                From 16,000 Ft Cliffs to Your Morning Cup
            </h2>
            <p class="text-white/70 text-base md:text-lg mt-4 leading-relaxed font-light">
                Cheap commercial brands boil raw resin over gas stoves, which destroys heat-sensitive fulvic acid. We preserve every molecule through the authentic Balti <em>Aftabi (Sun-Dried)</em> technique.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Step 1 --}}
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative flex flex-col">
                <span class="text-amber-400 font-display text-3xl font-black mb-3">01</span>
                <h4 class="text-lg font-bold text-white mb-2">High Cliff Gathering</h4>
                <p class="text-xs text-white/70 leading-relaxed flex-1">
                    Gathered during hot midsummer months when raw resin exudes from deep bedrock fractures in Skardu & Shigar.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative flex flex-col">
                <span class="text-amber-400 font-display text-3xl font-black mb-3">02</span>
                <h4 class="text-lg font-bold text-white mb-2">Glacial Water Dissolution</h4>
                <p class="text-xs text-white/70 leading-relaxed flex-1">
                    Dissolved in pure mountain spring water and triple-filtered through fine organic cotton muslin to extract all silt and stone particles.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative flex flex-col">
                <span class="text-amber-400 font-display text-3xl font-black mb-3">03</span>
                <h4 class="text-lg font-bold text-white mb-2">30-Day Sun Evaporation</h4>
                <p class="text-xs text-white/70 leading-relaxed flex-1">
                    Cured under direct high-altitude solar rays in sealed glass trays. Moisture evaporates naturally, leaving thick, aromatic gold-grade resin.
                </p>
            </div>

            {{-- Step 4 --}}
            <div class="bg-white/5 border border-white/10 rounded-2xl p-6 relative flex flex-col">
                <span class="text-amber-400 font-display text-3xl font-black mb-3">04</span>
                <h4 class="text-lg font-bold text-white mb-2">Sealed in UV Glass</h4>
                <p class="text-xs text-white/70 leading-relaxed flex-1">
                    Hand-poured into dark amber glass jars with airtight tamper seals to shield the resin from light and air degradation.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Comparison Table: Our Resin vs Cheap Market Imitations --}}
<section class="bg-white py-20 border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-5xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-amber-600 text-xs font-bold tracking-[0.2em] uppercase block mb-2">
                Know The Difference
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-navy-950">
                Pure Mountain Resin vs Commercial Powders
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Karakorum Crown Card --}}
            <div class="rounded-3xl border-2 border-amber-400 bg-amber-50/30 p-8 shadow-lg relative">
                <div class="absolute -top-3.5 right-6 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider px-4 py-1 rounded-full shadow-md">
                    Our Authenticity Standard
                </div>
                <h3 class="font-display text-2xl font-bold text-navy-950 mb-2 flex items-center gap-2">
                    <i class="fas fa-crown text-amber-500"></i> Karakorum Crown Pure Resin
                </h3>
                <p class="text-xs text-slate-500 mb-6">Original raw gold-grade resin from Skardu, Gilgit-Baltistan</p>

                <ul class="space-y-3.5 text-sm text-slate-700">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1 flex-shrink-0"></i>
                        <span><strong>100% Water Soluble:</strong> Melts completely in warm water without leaving sand, sediment, or gritty residue.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1 flex-shrink-0"></i>
                        <span><strong>Pliable Under Body Heat:</strong> Hardens in cold weather and softens between warm fingers (true sign of authentic resin).</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1 flex-shrink-0"></i>
                        <span><strong>Sun-Evaporated (Aftabi):</strong> Zero heat damage. 100% of organic fulvic acid bonds remain bioactive.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1 flex-shrink-0"></i>
                        <span><strong>Direct Origin:</strong> Sourced right in Skardu by our mountaineering family with complete chain of custody.</span>
                    </li>
                </ul>
            </div>

            {{-- Cheap Commercial Imitation Card --}}
            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-8 shadow-sm">
                <h3 class="font-display text-2xl font-bold text-slate-700 mb-2 flex items-center gap-2">
                    <i class="fas fa-times-circle text-rose-500"></i> Cheap Market Powders & Syrups
                </h3>
                <p class="text-xs text-slate-500 mb-6">Mass-produced industrial capsules and counterfeit mixtures</p>

                <ul class="space-y-3.5 text-sm text-slate-600">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-times-circle text-rose-500 mt-1 flex-shrink-0"></i>
                        <span><strong>Heavily Diluted:</strong> Often blended with maltodextrin, charcoal powder, brown sugar syrups, or synthetic binders.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-times-circle text-rose-500 mt-1 flex-shrink-0"></i>
                        <span><strong>Boiled at Extreme Heat:</strong> Factory boiling destroys fulvic acid and denatures natural mineral structures.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-times-circle text-rose-500 mt-1 flex-shrink-0"></i>
                        <span><strong>Chemical Solvents:</strong> Uses chemical precipitation that leaves traces of acetone or non-organic residues.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-times-circle text-rose-500 mt-1 flex-shrink-0"></i>
                        <span><strong>Unknown Origin:</strong> Shipped through multi-layer wholesale brokers with no traceable source.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Product Jars & Order Options --}}
<section class="bg-slate-50 py-20 md:py-24" id="packages">
    <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-amber-600 text-xs font-bold tracking-[0.25em] uppercase block mb-3">
                Order Direct From Skardu
            </span>
            <h2 class="font-display text-3xl md:text-4xl lg:text-5xl font-bold text-navy-950">
                Select Your Pure Resin Jar
            </h2>
            <p class="text-slate-600 text-base md:text-lg mt-3">
                Each jar comes with an authentic stainless dosing spatula and tamper-evident seal. Shipped nationwide across Pakistan and internationally via DHL.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Option 1: 20 Grams --}}
            <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-2">Trial / Traveler Jar</span>
                    <h3 class="font-display text-2xl font-bold text-navy-950 mb-1">20 Grams</h3>
                    <p class="text-xs text-slate-500 mb-6">~40 to 60 Servings (1 Month Supply)</p>

                    <div class="space-y-3 text-xs text-slate-700 py-4 border-t border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>100% Pure Grade-A Soft Resin</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Free Dosing Spatula Included</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Food-grade UV Protective Glass</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Cash on Delivery in Pakistan</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4">
                    <p class="text-center text-xs font-bold text-amber-700 mb-3">Guaranteed Authentic from Skardu</p>
                    <a href="https://wa.me/923425343629?text={{ urlencode('Hello! I would like to order the 20g Pure Balti Salajeet Jar.') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-primary flex items-center justify-center gap-2 w-full py-3.5 rounded-xl text-sm font-bold text-white shadow-md hover:shadow-lg transition-all">
                        <i class="fab fa-whatsapp text-lg"></i>
                        <span>Order 20g via WhatsApp</span>
                    </a>
                </div>
            </div>

            {{-- Option 2: 50 Grams (Featured) --}}
            <div class="bg-white rounded-3xl border-2 border-amber-400 p-8 shadow-xl relative flex flex-col justify-between transform md:-translate-y-2">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold text-xs uppercase tracking-wider px-4 py-1 rounded-full shadow-md whitespace-nowrap">
                    ⭐ Most Popular • Best Value
                </div>
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-600 block mb-2">Signature Regimen</span>
                    <h3 class="font-display text-3xl font-bold text-navy-950 mb-1">50 Grams</h3>
                    <p class="text-xs text-slate-500 mb-6">~100 to 150 Servings (2.5 Months Supply)</p>

                    <div class="space-y-3 text-xs text-slate-700 py-4 border-t border-b border-slate-100">
                        <div class="flex items-center gap-2 font-semibold">
                            <i class="fas fa-check-circle text-amber-600"></i>
                            <span>Prime High-Elevation Cliff Harvest</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>100% Water Soluble • 84+ Minerals</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Stainless Steel Measured Spatula</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Priority Nationwide Dispatch (24h)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Worldwide DHL Shipping Available</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4">
                    <p class="text-center text-xs font-bold text-amber-700 mb-3">Direct Dispatch from Satpara Road, Skardu</p>
                    <a href="https://wa.me/923425343629?text={{ urlencode('Hello! I would like to order the 50g Signature Pure Balti Salajeet Jar.') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-primary flex items-center justify-center gap-2 w-full py-4 rounded-xl text-base font-bold text-white shadow-xl hover:shadow-2xl transition-all">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>Order 50g via WhatsApp</span>
                    </a>
                </div>
            </div>

            {{-- Option 3: 100 Grams --}}
            <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-2">Connoisseur & Family Pack</span>
                    <h3 class="font-display text-2xl font-bold text-navy-950 mb-1">100 Grams</h3>
                    <p class="text-xs text-slate-500 mb-6">~200 to 300 Servings (Full Season Supply)</p>

                    <div class="space-y-3 text-xs text-slate-700 py-4 border-t border-b border-slate-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Finest Reserve Gold-Grade Resin</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Dual Spatula Set & Gift Box</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Maximum Savings per Gram</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check text-emerald-600"></i>
                            <span>Free Express Delivery Across Pakistan</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-4">
                    <p class="text-center text-xs font-bold text-amber-700 mb-3">Export Grade Sealed Packaging</p>
                    <a href="https://wa.me/923425343629?text={{ urlencode('Hello! I would like to order the 100g Connoisseur Pure Balti Salajeet Pack.') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-primary flex items-center justify-center gap-2 w-full py-3.5 rounded-xl text-sm font-bold text-white shadow-md hover:shadow-lg transition-all">
                        <i class="fab fa-whatsapp text-lg"></i>
                        <span>Order 100g via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- How to Consume Section (Usage Guide) --}}
<section class="bg-white py-20 border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-amber-600 text-xs font-bold tracking-[0.2em] uppercase block mb-2">
                Daily Ritual & Dosing
            </span>
            <h2 class="font-display text-3xl md:text-4xl font-bold text-navy-950">
                How to Take Your Pure Salajeet
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center text-lg font-bold mx-auto mb-4">
                    1
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-2">Pea-Sized Amount</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Use the included spatula to take a small rice-to-pea sized portion (roughly 300 to 500 mg).
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center text-lg font-bold mx-auto mb-4">
                    2
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-2">Dissolve in Liquid</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Stir into a cup of lukewarm spring water, warm milk, or herbal green tea until completely dissolved.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-700 flex items-center justify-center text-lg font-bold mx-auto mb-4">
                    3
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-2">Morning Ritual</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Drink once daily first thing in the morning on an empty stomach or 30 minutes before your trek or workout.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Comprehensive Health Disclaimer (Ethical & Legal Compliance) --}}
<section class="bg-slate-50 py-16 border-b border-slate-200/70">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm space-y-4">
            <div class="flex items-center gap-3 text-amber-600 mb-1">
                <i class="fas fa-shield-alt text-2xl"></i>
                <h3 class="font-display text-lg font-bold text-slate-900">
                    Important Health & Quality Notice
                </h3>
            </div>
            <div class="text-xs text-slate-600 space-y-2.5 leading-relaxed">
                <p>
                    <strong>Traditional Dietary Food Supplement:</strong> Salajeet (Shilajit) is a natural mountain mineral pitch traditionally consumed as a general dietary tonic. It is not an engineered pharmaceutical drug and is not intended to diagnose, treat, cure, or prevent any medical condition or disease.
                </p>
                <p>
                    <strong>Consult a Healthcare Professional:</strong> If you are pregnant, nursing, taking prescription medication, or have high blood iron levels, uric acid concerns, or kidney ailments, please consult with your physician prior to incorporating any new dietary mineral resin into your routine.
                </p>
                <p>
                    <strong>Origin Authenticity:</strong> All Karakorum Crown Salajeet is harvested and sun-purified under traditional methods in Gilgit-Baltistan and packaged at our headquarters on Satpara Road, Skardu.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Final CTA Section --}}
<section class="bg-navy-950 py-20 text-white relative overflow-hidden">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-3xl">
        <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.25em] text-amber-300 backdrop-blur-md mb-6">
            Direct From The Karakoram
        </span>
        <h2 class="font-display text-3xl md:text-5xl font-bold leading-tight">
            Order Pure Balti Salajeet Today
        </h2>
        <p class="mt-4 text-white/75 text-base md:text-lg leading-relaxed max-w-xl mx-auto font-light">
            Have questions about purity, shipping, or bulk orders? Chat directly with our team in Skardu for fast dispatch.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/923425343629?text={{ urlencode('Hi Karakorum Crown! I want to order pure Salajeet directly from Skardu.') }}"
               target="_blank"
               rel="noopener noreferrer"
               class="btn-primary inline-flex items-center justify-center rounded-2xl px-8 py-4 font-bold text-base text-white shadow-xl hover:shadow-2xl transition-all gap-2">
                <i class="fab fa-whatsapp text-2xl text-white"></i>
                <span>WhatsApp: +92 3425343629</span>
            </a>
            <a href="tel:+923425343629"
               class="inline-flex items-center justify-center rounded-2xl px-8 py-4 font-semibold text-base text-white border border-white/30 bg-white/10 hover:bg-white/20 backdrop-blur-md transition-all gap-2">
                <i class="fas fa-phone text-amber-300"></i>
                <span>Call Us Directly</span>
            </a>
        </div>
    </div>
</section>

@endsection
