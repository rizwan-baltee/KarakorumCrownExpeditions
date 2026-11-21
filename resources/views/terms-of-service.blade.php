@extends('layouts.app')

@section('title', 'Terms of Service & Expedition Agreement - Karakorum Crown Expeditions')
@section('meta_description', 'Official Terms of Service, booking conditions, cancellation policy, high-altitude liability, and emergency evacuation protocols for Karakorum Crown Expeditions in Skardu, Pakistan.')

@push('styles')
<style>
    .legal-card {
        transition: all 0.2s ease-in-out;
    }
    .legal-card:hover {
        border-color: #cbd5e1;
    }
    .toc-link.active {
        color: #16a34a;
        font-weight: 700;
        border-left-color: #16a34a;
        background-color: #f0fdf4;
    }
</style>
@endpush

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden text-white">
    <div class="absolute inset-0 opacity-20 pointer-events-none">
        <img src="{{ asset('assets/Front-banner-k2.webp') }}" alt="Karakoram Mountains" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/80 to-transparent pointer-events-none"></div>
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>

    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-4xl">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.2em] text-brand-300 backdrop-blur-md mb-6">
            <i class="fas fa-file-contract text-brand-400"></i>
            <span>Official Expedition Agreement & Booking Terms</span>
        </div>
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
            Terms of Service
        </h1>
        <p class="mt-4 text-white/70 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed font-light">
            Essential contractual conditions, high-altitude safety responsibilities, transparent cancellation schedules, and mandatory helicopter rescue protocols for trekking in Gilgit-Baltistan.
        </p>

        {{-- Metadata Strip --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-6 text-xs text-white/60 pt-6 border-t border-white/10">
            <span class="flex items-center gap-2">
                <i class="far fa-calendar-check text-brand-400"></i>
                <span>Last Updated: November 2026</span>
            </span>
            <span class="hidden sm:inline">•</span>
            <span class="flex items-center gap-2">
                <i class="fas fa-certificate text-brand-400"></i>
                <span>Registered CUIN: 0343091</span>
            </span>
            <span class="hidden sm:inline">•</span>
            <span class="flex items-center gap-2">
                <i class="fas fa-mountain text-brand-400"></i>
                <span>DTS Licensed Tour Operator (Skardu, Pakistan)</span>
            </span>
        </div>
    </div>
</section>

{{-- Main Terms Body --}}
<section class="py-16 md:py-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- Left Column: Sticky Table of Contents --}}
            <aside class="lg:col-span-4 hidden lg:block">
                <div class="sticky top-28 bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
                        <h3 class="font-display text-lg font-bold text-slate-900 flex items-center gap-2">
                            <i class="fas fa-list-ol text-brand-600 text-sm"></i>
                            <span>Agreement Sections</span>
                        </h3>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">9 Clauses</span>
                    </div>

                    <nav class="space-y-1 text-xs">
                        <a href="#clause-1" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">1. Legal Entity & Contract Scope</a>
                        <a href="#clause-2" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">2. Booking Inquiries & Payments</a>
                        <a href="#clause-3" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors font-semibold text-brand-700">3. Cancellation & Refund Policy</a>
                        <a href="#clause-4" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">4. Mandatory Rescue Insurance</a>
                        <a href="#clause-5" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">5. Objective Alpine Risks & Health</a>
                        <a href="#clause-6" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">6. Weather, Flights & Force Majeure</a>
                        <a href="#clause-7" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">7. Porter Welfare & CKNP Ethics</a>
                        <a href="#clause-8" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">8. Guide Authority & Team Safety</a>
                        <a href="#clause-9" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">9. Governing Law & Jurisdiction</a>
                    </nav>

                    {{-- Help & Contact Box --}}
                    <div class="mt-6 pt-5 border-t border-slate-100 bg-brand-50/50 rounded-2xl p-4 text-center">
                        <p class="text-xs font-semibold text-slate-800">Questions about our terms?</p>
                        <p class="text-[11px] text-slate-500 mt-1">Talk directly with our expedition team in Skardu.</p>
                        <a href="https://wa.me/923425343629" target="_blank" rel="noopener noreferrer" class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 bg-white border border-emerald-200 px-3 py-1.5 rounded-xl shadow-xs">
                            <i class="fab fa-whatsapp text-emerald-600"></i>
                            <span>WhatsApp: +92 3425343629</span>
                        </a>
                    </div>
                </div>
            </aside>

            {{-- Right Column: Structured Agreement Content --}}
            <main class="lg:col-span-8 space-y-8">

                {{-- Clause 1 --}}
                <article id="clause-1" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            01
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Legal Framework</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Legal Entity & Contract Scope</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            These Terms of Service constitute a legally binding agreement between you (the "Client" or "Traveler") and <strong>Karakorum Crown Expeditions</strong> (registered under Corporate Unique Identification Number <strong>CUIN: 0343091</strong>, Department of Tourist Services licensed tour operator, head-quartered at Satpara Road, Zhye Thang 1, Near Hispar Hotel, Skardu, Gilgit-Baltistan, Pakistan).
                        </p>
                        <p>
                            By submitting a booking request, making a deposit payment, signing an expedition roster, or embarking on any trekking, mountaineering, or cultural tour arranged by us, you explicitly accept and agree to comply with all terms and conditions outlined herein.
                        </p>
                    </div>
                </article>

                {{-- Clause 2 --}}
                <article id="clause-2" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            02
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Financial Terms</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Booking Inquiries, Quotes & Payments</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>
                            Due to fluctuating government park fees, military permit rates, seasonal mountain logistics, and custom group size requirements, all expedition packages are quoted transparently upon direct consultation via our online portal or WhatsApp.
                        </p>

                        <div class="grid sm:grid-cols-2 gap-4 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                <h4 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                                    <i class="fas fa-hand-holding-usd text-brand-600"></i> Deposit to Confirm
                                </h4>
                                <p class="text-slate-600 leading-relaxed">
                                    A <strong>25% to 30% advance deposit</strong> is required to lock dates, obtain Letters of Invitation (LOI), secure domestic flight seats (Islamabad–Skardu), and issue mandatory permits.
                                </p>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                                <h4 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                                    <i class="fas fa-money-check-alt text-brand-600"></i> Remaining Balance
                                </h4>
                                <p class="text-slate-600 leading-relaxed">
                                    The remaining balance is payable prior to trail departure upon arrival in Islamabad or at our Skardu operations base via approved bank transfer or foreign currency cash (USD / EUR / GBP).
                                </p>
                            </div>
                        </div>

                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs flex items-start gap-3">
                            <i class="fas fa-shield-alt text-emerald-600 text-base mt-0.5 flex-shrink-0"></i>
                            <div>
                                <strong>Zero Hidden Fees:</strong> Your finalized quotation outlines all inclusions (licensed guide, porters, national park conservation fees, 3 daily fresh trail meals, 4-season mountain tents, kitchen crew, and 4x4 mountain jeeps).
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Clause 3 --}}
                <article id="clause-3" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            03
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Policies</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Cancellation & Refund Policy</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>
                            High-altitude expeditions require non-refundable upfront expenditures months in advance (including Central Karakoram National Park permits, liaison officer clearances, advance porter food deposits, and hotel reservations in high season).
                        </p>

                        {{-- Cancellation Table --}}
                        <div class="overflow-x-auto rounded-2xl border border-slate-200">
                            <table class="w-full text-left text-xs">
                                <thead class="bg-slate-100 text-slate-800 font-bold uppercase tracking-wider text-[11px] border-b border-slate-200">
                                    <tr>
                                        <th class="py-3 px-4">Notice Period Before Start</th>
                                        <th class="py-3 px-4">Refund of Deposit</th>
                                        <th class="py-3 px-4">Administrative Deductions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-600">
                                    <tr class="hover:bg-slate-50/50">
                                        <td class="py-3 px-4 font-semibold text-slate-900">60+ Days Prior</td>
                                        <td class="py-3 px-4 text-emerald-600 font-bold">85% Refund</td>
                                        <td class="py-3 px-4 text-slate-500">15% processing & LOI issuance cost</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50">
                                        <td class="py-3 px-4 font-semibold text-slate-900">30 – 59 Days Prior</td>
                                        <td class="py-3 px-4 text-blue-600 font-bold">50% Refund</td>
                                        <td class="py-3 px-4 text-slate-500">50% unrecoverable hotel & permit fees</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50">
                                        <td class="py-3 px-4 font-semibold text-slate-900">15 – 29 Days Prior</td>
                                        <td class="py-3 px-4 text-amber-600 font-bold">25% Refund</td>
                                        <td class="py-3 px-4 text-slate-500">75% committed flight & vehicle prep</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50">
                                        <td class="py-3 px-4 font-semibold text-slate-900">Under 15 Days / No-Show</td>
                                        <td class="py-3 px-4 text-red-600 font-bold">0% Refund</td>
                                        <td class="py-3 px-4 text-slate-500">Full crew, porters, and rations committed</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 text-blue-900 text-xs">
                            <i class="fas fa-calendar-alt text-blue-600 mr-1.5"></i>
                            <strong>Trip Postponement Option:</strong> If you cannot travel due to unforeseen medical emergencies or visa delays, you may postpone your trek to the following season with 30+ days written notice for a nominal 10% administrative rescheduling fee.
                        </div>
                    </div>
                </article>

                {{-- Clause 4 --}}
                <article id="clause-4" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            04
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Critical Requirement</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Mandatory High-Altitude Travel & Rescue Insurance</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>
                            Adequate, comprehensive travel insurance is <strong>strictly mandatory</strong> for every client participating in our Karakoram, Himalayan, or Hindu Kush expeditions.
                        </p>

                        <div class="bg-rose-50 border-2 border-rose-200 rounded-2xl p-5 text-rose-950 text-xs leading-relaxed space-y-2">
                            <h4 class="font-bold text-sm text-rose-900 flex items-center gap-2">
                                <i class="fas fa-helicopter text-rose-600"></i> Askari Aviation Helicopter Evacuation Protocol
                            </h4>
                            <p>
                                In Pakistan, military and high-altitude emergency helicopter rescues in wilderness zones (such as Baltoro Glacier, Concordia, Gondogoro La, Snow Lake, or Nanga Parbat) are operated exclusively by Askari Aviation / Pakistan Army Aviation.
                            </p>
                            <p class="font-semibold text-rose-800">
                                Your policy must explicitly cover:
                            </p>
                            <ul class="list-disc pl-5 space-y-1 text-rose-900">
                                <li>Emergency medical helicopter evacuation up to at least <strong>6,000 meters (19,685 feet)</strong> above sea level.</li>
                                <li>Direct guarantee of payment or minimum $10,000 to $15,000 helicopter dispatch bond.</li>
                                <li>Repatriation of remains and overseas hospital medical coverage.</li>
                            </ul>
                        </div>

                        <p class="text-xs text-slate-500">
                            You must provide proof of valid policy documentation to our operations desk prior to leaving Skardu. Clients without verified insurance coverage cannot be permitted onto technical glaciated routes.
                        </p>
                    </div>
                </article>

                {{-- Clause 5 --}}
                <article id="clause-5" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            05
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Safety & Liability</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Objective Alpine Risks & Health Disclosures</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            Trekking and mountaineering in Gilgit-Baltistan take place in some of the most rugged, isolated wilderness environments on earth. Travelers must acknowledge the inherent objective hazards that exist independently of human control:
                        </p>

                        <div class="grid sm:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                <i class="fas fa-mountain text-slate-400 mt-1"></i>
                                <span><strong>Altitude Illness:</strong> AMS, High Altitude Pulmonary Edema (HAPE), and Cerebral Edema (HACE) at elevations over 3,000 meters.</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                <i class="fas fa-snowflake text-slate-400 mt-1"></i>
                                <span><strong>Glacial Hazards:</strong> Hidden crevasses, shifting seracs, icy moraine traverses, and rapid sub-zero weather changes.</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                <i class="fas fa-water text-slate-400 mt-1"></i>
                                <span><strong>River Crossings:</strong> Rapid glacial meltwater streams requiring rope-assisted crossings in early afternoon hours.</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex items-start gap-2.5">
                                <i class="fas fa-car-crash text-slate-400 mt-1"></i>
                                <span><strong>Rugged 4x4 Jeep Trails:</strong> Unpaved mountain tracks prone to rockfalls and steep canyon river drops.</span>
                            </div>
                        </div>

                        <p class="text-xs text-slate-600">
                            <strong>Health Disclosure:</strong> You confirm that you possess a physical fitness level commensurate with the chosen expedition and agree to voluntarily inform our team of any cardiovascular history, chronic asthma, severe allergies, or regular medications.
                        </p>
                    </div>
                </article>

                {{-- Clause 6 --}}
                <article id="clause-6" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            06
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Contingencies</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Weather, Flight Cancellations & Force Majeure</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            Flights between Islamabad and Skardu operate under Visual Flight Rules (VFR) and are susceptible to sudden mountain cloud cover, rain, or low visibility. When flights are cancelled:
                        </p>
                        <ul class="space-y-2 text-xs text-slate-700">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-road text-brand-600 mt-0.5"></i>
                                <span><strong>Road Contingency:</strong> Karakorum Crown Expeditions immediately activates overland contingency transport via the legendary Karakoram Highway (KKH) or Babusar Pass with seasoned alpine drivers.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-exclamation-triangle text-brand-600 mt-0.5"></i>
                                <span><strong>Force Majeure Events:</strong> We bear no financial liability for delays, missed international connections, or itinerary curtailments caused by natural landslides, floods, seismic events, civil unrest, or governmental border restrictions.</span>
                            </li>
                        </ul>
                    </div>
                </article>

                {{-- Clause 7 --}}
                <article id="clause-7" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            07
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Ethics & Ecology</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Porter Welfare & CKNP Environmental Standards</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            Our mountain porters are the true backbone of our expeditions. Karakorum Crown Expeditions upholds strict ethical treatment standards under Gilgit-Baltistan Tourism Department guidelines:
                        </p>
                        <div class="grid sm:grid-cols-3 gap-3 text-xs">
                            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-center">
                                <span class="font-bold text-brand-600 text-lg block mb-1">25 kg</span>
                                <span class="font-semibold text-slate-800 block text-[11px]">Strict Weight Limit</span>
                                <span class="text-slate-500 text-[10px]">No porter is overloaded beyond legal safety maximums.</span>
                            </div>
                            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-center">
                                <span class="font-bold text-brand-600 text-lg block mb-1">100% Gear</span>
                                <span class="font-semibold text-slate-800 block text-[11px]">Full Alpine Protection</span>
                                <span class="text-slate-500 text-[10px]">Quality shelter, thermal boots, sunglasses, and medical support.</span>
                            </div>
                            <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-center">
                                <span class="font-bold text-brand-600 text-lg block mb-1">Zero Waste</span>
                                <span class="font-semibold text-slate-800 block text-[11px]">Leave-No-Trace Policy</span>
                                <span class="text-slate-500 text-[10px]">All non-biodegradable waste is hauled off the glaciers to Skardu.</span>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Clause 8 --}}
                <article id="clause-8" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            08
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Trail Protocol</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Guide Authority & Expedition Discipline</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            To ensure group survival and safety, our licensed High-Altitude Sirdar (Lead Guide) possesses absolute authority on the trail:
                        </p>
                        <ul class="space-y-2 text-xs text-slate-700">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-user-shield text-brand-600 mt-0.5"></i>
                                <span><strong>Turnaround Decisions:</strong> The guide holds full discretion to mandate descent or abort a pass crossing (e.g. Gondogoro La or Hispar La) in severe blizzards or acute mountain illness without refund.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-drone text-brand-600 mt-0.5"></i>
                                <span><strong>Drone Regulations:</strong> Flying unmanned aerial vehicles (drones) in military or border sensitivity zones without explicit Ministry of Defense clearance is prohibited by Pakistan law.</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-praying-hands text-brand-600 mt-0.5"></i>
                                <span><strong>Cultural Respect:</strong> Travelers agree to respect Balti and Pakistani cultural sensitivities in rural villages, avoiding offensive photography or attire.</span>
                            </li>
                        </ul>
                    </div>
                </article>

                {{-- Clause 9 --}}
                <article id="clause-9" class="legal-card bg-gradient-to-br from-navy-900 to-navy-950 text-white rounded-3xl p-5 sm:p-7 md:p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm shadow-md">
                            09
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400">Jurisdiction</span>
                            <h2 class="font-display text-2xl font-bold text-white">Governing Law & Skardu Dispute Resolution</h2>
                        </div>
                    </div>
                    <div class="text-white/80 text-sm leading-relaxed space-y-4">
                        <p>
                            This agreement is governed in accordance with the substantive laws of Gilgit-Baltistan and the Islamic Republic of Pakistan. Any legal dispute, arbitration, or claim arising out of or in connection with this contract shall be submitted to the exclusive jurisdiction of the competent civil courts in Skardu, Gilgit-Baltistan.
                        </p>
                        <div class="grid sm:grid-cols-2 gap-4 text-xs pt-2">
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/10">
                                <span class="text-brand-300 font-bold block mb-1">Company Headquarters</span>
                                <p class="text-white/80 leading-relaxed">
                                    Karakorum Crown Expeditions<br>
                                    Satpara Road, Zhye Thang 1, Near Hispar Hotel,<br>
                                    Skardu, Gilgit-Baltistan, Pakistan (Postal Code: 16100)
                                </p>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/10">
                                <span class="text-brand-300 font-bold block mb-1">Official Verification</span>
                                <p class="text-white/80 leading-relaxed space-y-1">
                                    <span><strong>Registration CUIN:</strong> 0343091</span><br>
                                    <span><strong>Email:</strong> karakorumcrownexpeditions@gmail.com</span><br>
                                    <span><strong>Emergency Support:</strong> +92 3425343629</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </article>

            </main>
        </div>
    </div>
</section>

@endsection
