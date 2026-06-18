@extends('layouts.app')

@section('title', 'About Us - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-24 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[140px]"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/20 text-brand-300 rounded-full px-5 py-2 text-xs font-semibold tracking-[0.2em] uppercase mb-6">
                <i class="fas fa-mountain text-[10px]"></i> Our Story
            </span>
            <h1 class="font-display text-4xl md:text-6xl lg:text-7xl text-white mb-6 leading-tight">
                Local experts for<br>
                <span class="text-brand-400">unforgettable mountain journeys</span>
            </h1>
            <p class="text-white/60 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Karakorum Crown Expeditions was founded to help travelers experience Gilgit-Baltistan with real local guidance, honest planning, and a simple booking process.
            </p>
        </div>
    </div>
</section>

<section class="bg-white py-24">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-4 block">Who We Are</span>
                <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-6 leading-tight">
                    Born in the mountains,<br>
                    built for travelers
                </h2>
                <div class="space-y-4 text-gray-600 leading-relaxed text-base">
                    <p>
                        We are a local travel team from Gilgit-Baltistan who know these valleys, peaks, and routes personally. Our job is to make your trip easier, safer, and more memorable.
                    </p>
                    <p>
                        From trekking and cultural tours to custom itineraries, we help travelers explore the region with clear communication, flexible planning, and real local support.
                    </p>
                    <p>
                        Whether you are coming for adventure, photography, family travel, or a first-time visit to northern Pakistan, we keep the process simple from the first message to the final day of your trip.
                    </p>
                </div>
            </div>

            <div class="relative">
                <div class="bg-gradient-to-br from-navy-900 to-navy-800 rounded-3xl p-8 md:p-10 text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-brand-500/10 rounded-full blur-3xl"></div>
                    <div class="relative grid grid-cols-2 gap-5">
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">30+</div>
                            <div class="text-white/70 text-sm">Countries served</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">100%</div>
                            <div class="text-white/70 text-sm">Local expertise</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">24h</div>
                            <div class="text-white/70 text-sm">Response time</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">Simple</div>
                            <div class="text-white/70 text-sm">Booking process</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-slate-50 py-24">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-4 block">Why Choose Us</span>
            <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-4">A better way to explore Gilgit-Baltistan</h2>
            <p class="text-gray-600 leading-relaxed">
                We focus on the details that matter most to international travelers: trust, clarity, local knowledge, and a fast booking experience.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-map-marked-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Local planning</h3>
                <p class="text-gray-600 leading-relaxed">Every route is planned with people who know the terrain, weather, and logistics on the ground.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-comments text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Fast communication</h3>
                <p class="text-gray-600 leading-relaxed">We reply quickly, share clear details, and keep everything simple through WhatsApp, email, and booking reference tracking.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-shield-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Trusted support</h3>
                <p class="text-gray-600 leading-relaxed">From inquiry to trip completion, we stay available to help with questions, changes, and special requests.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-navy-950 py-24 text-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-brand-300 text-xs font-bold tracking-[0.2em] uppercase mb-4 block">Our Mission</span>
                <h2 class="font-display text-3xl md:text-4xl mb-6 leading-tight">Make travel to the north simple, human, and memorable</h2>
                <p class="text-white/65 leading-relaxed mb-6">
                    We want more travelers to experience the beauty of Gilgit-Baltistan without confusion, hidden steps, or long delays. Our mission is to offer a smooth service that feels personal and dependable.
                </p>
                <p class="text-white/65 leading-relaxed">
                    If you are planning your first trip, returning for another trek, or organizing a custom journey, our team is here to help you enjoy the adventure with confidence.
                </p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-3xl p-8 md:p-10 backdrop-blur-md">
                <h3 class="text-xl font-semibold mb-6">What we help with</h3>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-brand-500/20 text-brand-300 flex items-center justify-center mt-0.5">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-white/75">Trekking packages and expedition planning</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-brand-500/20 text-brand-300 flex items-center justify-center mt-0.5">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-white/75">Custom tours for families, couples, and groups</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-brand-500/20 text-brand-300 flex items-center justify-center mt-0.5">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-white/75">Clear booking support with reference tracking</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-brand-500/20 text-brand-300 flex items-center justify-center mt-0.5">
                            <i class="fas fa-check text-xs"></i>
                        </div>
                        <p class="text-white/75">Fast help through WhatsApp and email</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-4">Ready to plan your trip?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-8">
            Browse our treks or send a booking request. We will guide you from there.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('booking.create') }}" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                <i class="fas fa-calendar-check mr-2"></i> Book Now
            </a>
            <a href="{{ route('home') }}#treks" class="inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-navy-900 bg-slate-100 hover:bg-slate-200 transition-colors">
                <i class="fas fa-mountain mr-2"></i> Explore Treks
            </a>
        </div>
    </div>
</section>
@endsection
