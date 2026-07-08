@extends('layouts.app')

@section('title', 'Pakistan Visa & Travel Guide - Karakorum Crown Expeditions')

@section('content')
<!-- Hero Section -->
<section class="relative bg-navy-950 pt-32 pb-24 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[140px]"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/20 text-brand-300 rounded-full px-5 py-2 text-xs font-semibold tracking-[0.2em] uppercase mb-6">
                <i class="fas fa-passport text-[10px]"></i> Travel Information
            </span>
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl text-white mb-6 leading-tight">
                Pakistan Visa & <br>
                <span class="text-brand-400">Permit Guide</span>
            </h1>
            <p class="text-white/60 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Everything you need to know about getting your visa and permits for an unforgettable adventure in Gilgit-Baltistan.
            </p>
        </div>
    </div>
</section>

<!-- Main Guide Content -->
<section class="bg-slate-50 py-20">
    <div class="container mx-auto px-4 lg:px-8">
        
        <!-- Step 1: E-Visa Process -->
        <div class="max-w-5xl mx-auto bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 mb-10">
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-16 h-16 shrink-0 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center border border-brand-100">
                    <span class="font-display text-2xl font-bold">1</span>
                </div>
                <div>
                    <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-2 block">Step 1</span>
                    <h2 class="font-display text-3xl text-navy-900 mb-4">The Pakistan E-Visa</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Before traveling to Gilgit-Baltistan, you must secure a valid Pakistan visa. The process is completely digitized and handled through the official government portal. Depending on your nationality, you can apply for a Tourist E-Visa or receive an Electronic Travel Authorization (ETA) for a Visa on Arrival.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-brand-500 mt-1"></i>
                            <span class="text-gray-600"><strong>Apply Online:</strong> Use the official <a href="https://visa.nadra.gov.pk/" target="_blank" class="text-brand-600 hover:underline font-medium">Pakistan Online Visa System (NADRA)</a>.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-brand-500 mt-1"></i>
                            <span class="text-gray-600"><strong>Processing Time:</strong> Typically takes 7-10 working days, though we recommend applying well in advance.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-brand-500 mt-1"></i>
                            <span class="text-gray-600"><strong>Required Documents:</strong> Passport copy, passport-sized photograph, and an invitation letter (which we provide upon booking your tour/trek).</span>
                        </li>
                    </ul>
                    <a href="https://visa.nadra.gov.pk/" target="_blank" class="btn-primary inline-flex items-center rounded-xl px-6 py-3 font-semibold text-white text-sm">
                        Visit NADRA Portal <i class="fas fa-external-link-alt ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Step 2: NOC & Permits -->
        <div class="max-w-5xl mx-auto bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100 mb-10">
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-16 h-16 shrink-0 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center border border-brand-100">
                    <span class="font-display text-2xl font-bold">2</span>
                </div>
                <div>
                    <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-2 block">Step 2</span>
                    <h2 class="font-display text-3xl text-navy-900 mb-4">NOCs & Trekking Permits</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Good news! For most popular tourist destinations in Gilgit-Baltistan, foreign tourists <strong>do not</strong> need a No Objection Certificate (NOC). However, specialized trekking in restricted zones requires government permits.
                    </p>
                    
                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-green-50/50 p-6 rounded-2xl border border-green-100">
                            <h3 class="font-bold text-green-800 mb-3 flex items-center gap-2">
                                <i class="fas fa-lock-open"></i> Open Zones (No NOC Required)
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Standard tourist visa is sufficient for standard tours to:
                            </p>
                            <ul class="text-gray-600 text-sm mt-3 space-y-2">
                                <li>• Hunza Valley (Karimabad, Passu, Sost)</li>
                                <li>• Skardu & Shigar Valleys</li>
                                <li>• Deosai National Park</li>
                                <li>• Gilgit City & surrounding areas</li>
                            </ul>
                        </div>
                        
                        <div class="bg-red-50/50 p-6 rounded-2xl border border-red-100">
                            <h3 class="font-bold text-red-800 mb-3 flex items-center gap-2">
                                <i class="fas fa-lock"></i> Restricted Zones (Permit Required)
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Special trekking/mountaineering permits are required for:
                            </p>
                            <ul class="text-gray-600 text-sm mt-3 space-y-2">
                                <li>• K2 Base Camp & Concordia</li>
                                <li>• Snow Lake / Biafo Hispar Traverse</li>
                                <li>• Areas close to the borders/Line of Control</li>
                                <li>• Peaks above 6,500m</li>
                            </ul>
                            <div class="mt-4 text-xs font-medium text-red-700 bg-red-100/50 p-3 rounded-lg">
                                We handle all restricted zone permit applications on behalf of our clients!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Step 3: Essential Travel Tips -->
        <div class="max-w-5xl mx-auto bg-navy-900 text-white rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-brand-500/10 rounded-full blur-3xl"></div>
            
            <h2 class="font-display text-3xl text-white mb-8 text-center">Essential Travel Requirements</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-colors">
                    <i class="fas fa-id-card text-brand-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold mb-2">Checkpoints</h3>
                    <p class="text-white/60 text-sm leading-relaxed">
                        You will encounter routine security checkpoints. Keep your original passport, visa copy, and a few printed photocopies of your passport details page handy.
                    </p>
                </div>
                
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-colors">
                    <i class="fas fa-user-tie text-brand-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold mb-2">Licensed Operators</h3>
                    <p class="text-white/60 text-sm leading-relaxed">
                        By law, foreigners entering restricted zones must be accompanied by a government-licensed tour operator. Karakorum Crown Expeditions is fully licensed (CUIN: 0343091).
                    </p>
                </div>

                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-colors">
                    <i class="fas fa-hotel text-brand-400 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold mb-2">Police Registration</h3>
                    <p class="text-white/60 text-sm leading-relaxed">
                        Hotels and guesthouses will register you with local authorities upon arrival. This is standard procedure in Gilgit-Baltistan for your safety and security.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="bg-white py-24">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-4">Need an Invitation Letter?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-8 text-lg">
            Book your tour or trek with us, and we will provide all the necessary documents and support to make your visa application smooth and hassle-free.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-8 py-4 font-semibold text-white">
                Explore Packages & Book Now
            </a>
            <a href="/about-us" class="inline-flex items-center justify-center rounded-xl px-8 py-4 font-semibold text-navy-900 bg-slate-100 hover:bg-slate-200 transition-colors">
                Contact Support
            </a>
        </div>
    </div>
</section>
@endsection
