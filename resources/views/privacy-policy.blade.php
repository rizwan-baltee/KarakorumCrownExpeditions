@extends('layouts.app')

@section('title', 'Privacy & Cookie Policy - Karakorum Crown Expeditions')
@section('meta_description', 'Official Privacy & Cookie Policy for Karakorum Crown Expeditions. Learn how we handle traveler data, permit clearances, cookies, and Google advertising compliance.')

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
            <i class="fas fa-shield-alt text-brand-400"></i>
            <span>Customer Trust & Data Protection</span>
        </div>
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white">
            Privacy & Cookie Policy
        </h1>
        <p class="mt-4 text-white/70 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed font-light">
            How Karakorum Crown Expeditions collects, safeguards, and processes personal information for international mountain expeditions and website operations.
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
                <i class="fas fa-landmark text-brand-400"></i>
                <span>DTS Licensed Tour Operator (Skardu, Pakistan)</span>
            </span>
        </div>
    </div>
</section>

{{-- Main Policy Body --}}
<section class="py-16 md:py-20 bg-slate-50 min-h-screen">
    <div class="container mx-auto px-4 lg:px-8 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            {{-- Left Column: Sticky Table of Contents --}}
            <aside class="lg:col-span-4 hidden lg:block">
                <div class="sticky top-28 bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-4">
                        <h3 class="font-display text-lg font-bold text-slate-900 flex items-center gap-2">
                            <i class="fas fa-list-ul text-brand-600 text-sm"></i>
                            <span>Table of Contents</span>
                        </h3>
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">9 Sections</span>
                    </div>

                    <nav class="space-y-1 text-xs">
                        <a href="#section-1" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">1. Overview & Data Controller</a>
                        <a href="#section-2" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">2. Information We Collect</a>
                        <a href="#section-3" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">3. How We Use Your Data</a>
                        <a href="#section-4" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">4. Cookies & Web Analytics</a>
                        <a href="#section-5" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors font-semibold text-brand-700">5. Google Advertising Disclosure</a>
                        <a href="#section-6" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">6. Government Permits & Third Parties</a>
                        <a href="#section-7" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">7. Data Security & Storage</a>
                        <a href="#section-8" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">8. International Traveler Rights</a>
                        <a href="#section-9" class="toc-link block px-3 py-2 rounded-lg text-slate-600 hover:text-brand-600 hover:bg-slate-50 transition-colors">9. Contact Our Data Officer</a>
                    </nav>

                    {{-- Help & Contact Box --}}
                    <div class="mt-6 pt-5 border-t border-slate-100 bg-brand-50/50 rounded-2xl p-4 text-center">
                        <p class="text-xs font-semibold text-slate-800">Have a privacy question?</p>
                        <p class="text-[11px] text-slate-500 mt-1">Our support team in Skardu responds within 24 hours.</p>
                        <a href="mailto:karakorumcrownexpeditions@gmail.com" class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold text-brand-700 hover:text-brand-800">
                            <i class="fas fa-envelope"></i>
                            <span>Email Privacy Team</span>
                        </a>
                    </div>
                </div>
            </aside>

            {{-- Right Column: Detailed Sections in Cards --}}
            <main class="lg:col-span-8 space-y-8">

                {{-- Section 1 --}}
                <article id="section-1" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            01
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Introduction</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Overview & Data Controller</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            <strong>Karakorum Crown Expeditions</strong> ("we", "our", or "us") is a licensed trekking and tour operating enterprise registered with the Government of Pakistan under Corporate Universal Identification Number (CUIN) <strong>0343091</strong>, with headquarters located on Satpara Road, Zhye Thang 1, Near Hispar Hotel, Skardu, Gilgit-Baltistan, Pakistan.
                        </p>
                        <p>
                            We are committed to respecting and protecting the personal privacy of every client, trekker, mountaineer, and website visitor. This policy explains what personal data we collect, why we need it, how it is secured, and your legal rights under applicable international data protection standards including the EU General Data Protection Regulation (GDPR) and regional Pakistani consumer regulations.
                        </p>
                    </div>
                </article>

                {{-- Section 2 --}}
                <article id="section-2" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            02
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Data Collection</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Information We Collect</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>Due to the specialized nature of remote mountaineering expeditions, we collect specific categories of personal data:</p>
                        
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                                <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <i class="fas fa-user text-brand-600"></i> Contact & Identity
                                </h4>
                                <ul class="list-disc pl-4 text-xs space-y-1 text-slate-600">
                                    <li>Full legal name as printed on passport</li>
                                    <li>Email address & WhatsApp phone number</li>
                                    <li>Country of residence & nationality</li>
                                </ul>
                            </div>
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                                <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <i class="fas fa-passport text-brand-600"></i> Expedition Clearance Data
                                </h4>
                                <ul class="list-disc pl-4 text-xs space-y-1 text-slate-600">
                                    <li>Passport scan copy & validity dates</li>
                                    <li>Pakistan Trekking Visa / LOI records</li>
                                    <li>Emergency contact name & telephone</li>
                                </ul>
                            </div>
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                                <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <i class="fas fa-heartbeat text-brand-600"></i> Safety & Medical Preferences
                                </h4>
                                <ul class="list-disc pl-4 text-xs space-y-1 text-slate-600">
                                    <li>Dietary requirements & severe allergies</li>
                                    <li>High-altitude fitness disclosures (voluntary)</li>
                                    <li>Helicopter rescue insurance policy details</li>
                                </ul>
                            </div>
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100">
                                <h4 class="font-bold text-slate-900 text-xs uppercase tracking-wider mb-2 flex items-center gap-2">
                                    <i class="fas fa-laptop text-brand-600"></i> Automated Technical Data
                                </h4>
                                <ul class="list-disc pl-4 text-xs space-y-1 text-slate-600">
                                    <li>IP address & browser user-agent string</li>
                                    <li>Pages viewed & referring URL sources</li>
                                    <li>Approximate geographic region (country level)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs leading-relaxed flex items-start gap-3">
                            <i class="fas fa-info-circle text-amber-600 text-base mt-0.5 flex-shrink-0"></i>
                            <div>
                                <strong>Payment Card Data:</strong> We do NOT collect or store credit card numbers on this website. All payments are handled via official company bank wire transfers, government-approved foreign exchange channels, or verified electronic payment gateways.
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Section 3 --}}
                <article id="section-3" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            03
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Purpose</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">How We Use Your Information</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>We process your personal information strictly for lawful, legitimate purposes:</p>
                        <ul class="space-y-2 text-xs text-slate-700">
                            <li class="flex items-start gap-2.5">
                                <i class="fas fa-check-circle text-brand-600 mt-0.5"></i>
                                <span><strong>Fulfilling Expedition Services:</strong> Organizing 4x4 mountain vehicles, hotel room allotments, mountain guide assignments, camp gear allotments, and meal preparations.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fas fa-check-circle text-brand-600 mt-0.5"></i>
                                <span><strong>Issuing Official Letters of Invitation (LOI):</strong> Generating mandatory documentation for your official Pakistan Tourist or Trekking e-Visa application.</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fas fa-check-circle text-brand-600 mt-0.5"></i>
                                <span><strong>Regulatory Government Filings:</strong> Procuring Central Karakoram National Park (CKNP) passes, Deosai National Park entry permits, and military security No Objection Certificates (NOC).</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fas fa-check-circle text-brand-600 mt-0.5"></i>
                                <span><strong>High-Altitude Safety & Evacuation:</strong> Providing essential manifests to Askari Aviation or high-altitude military rescue helicopters in medical emergencies.</span>
                            </li>
                        </ul>
                    </div>
                </article>

                {{-- Section 4 --}}
                <article id="section-4" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            04
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Web Tracking</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Cookies & Web Technologies</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            Cookies are small text files placed on your device to ensure smooth website operation and improve browsing quality.
                        </p>
                        <div class="space-y-2 text-xs">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex justify-between items-center">
                                <div>
                                    <strong class="text-slate-900">Essential Technical Cookies</strong>
                                    <p class="text-slate-500 text-[11px] mt-0.5">Required for form submission, CSRF security, and multi-step booking navigation.</p>
                                </div>
                                <span class="text-emerald-700 bg-emerald-100 font-bold px-2 py-0.5 rounded text-[10px]">Strictly Necessary</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex justify-between items-center">
                                <div>
                                    <strong class="text-slate-900">Preference Cookies</strong>
                                    <p class="text-slate-500 text-[11px] mt-0.5">Remembers your preferred language, package selections, or dates.</p>
                                </div>
                                <span class="text-blue-700 bg-blue-100 font-bold px-2 py-0.5 rounded text-[10px]">Functional</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 flex justify-between items-center">
                                <div>
                                    <strong class="text-slate-900">Analytical & Measurement Cookies</strong>
                                    <p class="text-slate-500 text-[11px] mt-0.5">Anonymously measures site traffic to improve itinerary pages and speed.</p>
                                </div>
                                <span class="text-slate-700 bg-slate-200 font-bold px-2 py-0.5 rounded text-[10px]">Analytics</span>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Section 5 (Crucial for AdSense) --}}
                <article id="section-5" class="legal-card bg-white rounded-3xl border-2 border-brand-500/50 p-5 sm:p-7 md:p-8 shadow-sm relative overflow-hidden">
                    <div class="absolute -right-12 -top-12 w-36 h-36 bg-brand-50 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm shadow-md">
                            05
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-700">Advertising Compliance</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Third-Party Advertising & Google AdSense</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4">
                        <p>
                            We may partner with third-party advertising networks, such as <strong>Google AdSense</strong>, to display relevant informational ads to visitors. Google and other third-party vendors use cookies to serve ads based on prior visits to our website or other sites across the internet:
                        </p>
                        
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200 text-xs space-y-3">
                            <p>
                                <strong>Google's Advertising Cookies:</strong> Google's use of advertising cookies enables it and its partners to serve ads to users based on their visit to our sites and/or other sites on the Internet.
                            </p>
                            <p>
                                <strong>User Opt-Out:</strong> Users may opt out of personalized advertising by visiting Google's official Ad Settings page: 
                                <a href="https://adssettings.google.com" target="_blank" rel="noopener noreferrer" class="text-brand-600 underline font-bold">https://adssettings.google.com</a>. Alternatively, users may opt out of third-party vendor use of cookies for personalized advertising by visiting <a href="https://www.aboutads.info/choices/" target="_blank" rel="noopener noreferrer" class="text-brand-600 underline font-bold">www.aboutads.info/choices</a>.
                            </p>
                            <p>
                                <strong>European Economic Area (EEA), UK & Switzerland:</strong> For visitors from the EEA and UK, third-party cookies for advertising are only deployed in compliance with applicable Consent Management frameworks (CMP).
                            </p>
                        </div>
                    </div>
                </article>

                {{-- Section 6 --}}
                <article id="section-6" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            06
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Data Sharing</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Government Permits & Third Parties</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p class="font-semibold text-slate-900">We do NOT sell, lease, or monetize your personal information to marketing brokers or unrelated third parties.</p>
                        <p>We only share necessary trip data with the following authorized entities:</p>
                        <ul class="list-disc pl-5 text-xs text-slate-600 space-y-1.5">
                            <li><strong>Government Regulatory Authorities:</strong> Department of Tourist Services (DTS), Alpine Club of Pakistan, and Ministry of Interior for mandatory restricted-zone security clearance (NOC).</li>
                            <li><strong>National Park Authorities:</strong> Central Karakoram National Park (CKNP) and Gilgit-Baltistan Wildlife Department for environmental entry passes.</li>
                            <li><strong>Logistical Partners:</strong> Partner hotels in Islamabad, Skardu, Gilgit, and Hunza for room reservations.</li>
                            <li><strong>Emergency Rescue Operators:</strong> Askari Aviation, military search-and-rescue wings, and local Skardu hospitals during medical emergencies.</li>
                        </ul>
                    </div>
                </article>

                {{-- Section 7 --}}
                <article id="section-7" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            07
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Security</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">Data Security & Storage</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>
                            We employ modern physical, electronic, and administrative safeguards to protect your personal details against unauthorized alteration, disclosure, or destruction:
                        </p>
                        <ul class="list-disc pl-5 text-xs text-slate-600 space-y-1">
                            <li>All web traffic is encrypted end-to-end via <strong>HTTPS / SSL/TLS protocols</strong>.</li>
                            <li>Expedition documents and passport scans are stored in restricted-access directories, accessible only by accredited expedition coordinators.</li>
                            <li>Booking records are retained for the statutory duration required by Pakistani tax, tourism, and immigration accounting guidelines, after which they are securely archived or purged.</li>
                        </ul>
                    </div>
                </article>

                {{-- Section 8 --}}
                <article id="section-8" class="legal-card bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 md:p-8 shadow-xs">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 border border-brand-200 text-brand-600 flex items-center justify-center font-bold text-sm">
                            08
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Your Rights</span>
                            <h2 class="font-display text-2xl font-bold text-slate-900">International Traveler Rights</h2>
                        </div>
                    </div>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-3">
                        <p>Regardless of your geographic location, we respect your rights regarding personal data:</p>
                        <div class="grid sm:grid-cols-2 gap-3 text-xs">
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                                <strong class="text-slate-900">Right to Access:</strong>
                                <p class="text-slate-500 mt-0.5">Request a copy of the personal information we hold about you.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                                <strong class="text-slate-900">Right to Rectification:</strong>
                                <p class="text-slate-500 mt-0.5">Update or correct any inaccurate passport or contact details.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                                <strong class="text-slate-900">Right to Erasure:</strong>
                                <p class="text-slate-500 mt-0.5">Request deletion of non-statutory records once your trek is completed.</p>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-50 border border-slate-100">
                                <strong class="text-slate-900">Right to Withdraw Consent:</strong>
                                <p class="text-slate-500 mt-0.5">Opt out of marketing updates or cookie tracking at any time.</p>
                            </div>
                        </div>
                    </div>
                </article>

                {{-- Section 9 --}}
                <article id="section-9" class="legal-card bg-gradient-to-br from-navy-900 to-navy-950 text-white rounded-3xl p-5 sm:p-7 md:p-8 shadow-xl">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-500 text-white flex items-center justify-center font-bold text-sm shadow-md">
                            09
                        </div>
                        <div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-brand-400">Communication</span>
                            <h2 class="font-display text-2xl font-bold text-white">Contact Our Data Protection Officer</h2>
                        </div>
                    </div>
                    <div class="text-white/80 text-sm leading-relaxed space-y-4">
                        <p>
                            If you have questions regarding this policy, wish to exercise your data rights, or want to review records submitted for your expedition, please reach out to our dedicated team:
                        </p>
                        <div class="grid sm:grid-cols-2 gap-4 text-xs">
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/10">
                                <span class="text-brand-300 font-bold block mb-1">Company Address</span>
                                <p class="text-white/80 leading-relaxed">
                                    Karakorum Crown Expeditions<br>
                                    Satpara Road, Zhye Thang 1, Near Hispar Hotel,<br>
                                    Skardu, Gilgit-Baltistan, Pakistan (Postal Code: 16100)
                                </p>
                            </div>
                            <div class="bg-white/10 rounded-2xl p-4 border border-white/10">
                                <span class="text-brand-300 font-bold block mb-1">Direct Contacts</span>
                                <p class="text-white/80 leading-relaxed space-y-1">
                                    <span><strong>Email:</strong> karakorumcrownexpeditions@gmail.com</span><br>
                                    <span><strong>WhatsApp / Call:</strong> +92 3425343629</span><br>
                                    <span><strong>Official Registration:</strong> CUIN: 0343091</span>
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
