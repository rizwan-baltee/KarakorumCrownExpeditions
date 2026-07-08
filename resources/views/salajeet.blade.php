@extends('layouts.app')

@section('title', 'Premium Salajeet - Karakorum Crown Expeditions')

@section('content')
<section class="relative bg-navy-950 pt-32 pb-24 overflow-hidden">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[140px]"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 bg-brand-500/10 border border-brand-500/20 text-brand-300 rounded-full px-5 py-2 text-xs font-semibold tracking-[0.2em] uppercase mb-6">
                <i class="fas fa-leaf text-[10px]"></i> Pure & Authentic
            </span>
            <h1 class="font-display text-4xl md:text-6xl lg:text-7xl text-white mb-6 leading-tight">
                Premium Himalayan<br>
                <span class="text-brand-400">Salajeet (Shilajit)</span>
            </h1>
            <p class="text-white/60 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Experience the natural energy and wellness benefits of pure, high-altitude Salajeet, sustainably sourced directly from the Karakorum and Himalayan mountains of Gilgit-Baltistan.
            </p>
        </div>
    </div>

    <!-- Full Screen Video Showcase -->
    <div class="relative w-full mt-16 h-[50vh] md:h-[80vh] bg-navy-950 border-t border-b border-white/10">
        <video 
            class="absolute inset-0 w-full h-full object-cover" 
            autoplay loop muted playsinline controls>
            <source src="{{ asset('assets/salajeet.MOV') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<section class="bg-white py-24">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-4 block">Natural Wellness</span>
                <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-6 leading-tight">
                    The Mountain's Hidden<br>
                    Treasure
                </h2>
                <div class="space-y-4 text-gray-600 leading-relaxed text-base">
                    <p>
                        Salajeet, also known as Shilajit, is a sticky, tar-like resin found in the high rocks of the Himalayas and Karakorum. Formed over centuries by the slow decomposition of plants, it is one of nature's most potent mineral supplements.
                    </p>
                    <p>
                        Rich in fulvic acid and over 84 trace minerals, it has been used for generations to boost energy, improve stamina, and support overall health and vitality.
                    </p>
                    <p>
                        We source our Salajeet directly from local gatherers in Gilgit-Baltistan, ensuring it is 100% pure, unadulterated, and traditionally purified without the use of harsh chemicals.
                    </p>
                </div>
            </div>

            <div class="relative">
                <div class="bg-gradient-to-br from-navy-900 to-navy-800 rounded-3xl p-8 md:p-10 text-white relative overflow-hidden shadow-2xl">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-brand-500/10 rounded-full blur-3xl"></div>
                    <div class="relative grid grid-cols-2 gap-5">
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">100%</div>
                            <div class="text-white/70 text-sm">Pure & Natural</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-3xl font-bold text-brand-300 mb-2">84+</div>
                            <div class="text-white/70 text-sm">Trace Minerals</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-xl font-bold text-brand-300 mb-2 mt-1">Direct</div>
                            <div class="text-white/70 text-sm">From the Source</div>
                        </div>
                        <div class="bg-white/8 border border-white/10 rounded-2xl p-5">
                            <div class="text-xl font-bold text-brand-300 mb-2 mt-1">Premium</div>
                            <div class="text-white/70 text-sm">Export Quality</div>
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
            <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase mb-4 block">Key Benefits</span>
            <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-4">Why use our Salajeet?</h2>
            <p class="text-gray-600 leading-relaxed">
                Known as the "Conqueror of Mountains," Salajeet offers numerous benefits for your mind and body.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-bolt text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Boosts Energy</h3>
                <p class="text-gray-600 leading-relaxed">Enhances mitochondrial function to naturally increase energy levels and combat chronic fatigue.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-brain text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Cognitive Health</h3>
                <p class="text-gray-600 leading-relaxed">Rich in fulvic acid, it acts as an antioxidant to support brain function and memory.</p>
            </div>
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5">
                    <i class="fas fa-shield-virus text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 mb-3">Immunity & Aging</h3>
                <p class="text-gray-600 leading-relaxed">Reduces inflammation, supports immune function, and promotes healthy aging with vital nutrients.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-24">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl text-navy-900 mb-4">Ready to Order?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto mb-8">
            Contact us directly via WhatsApp or phone to place your order. We deliver pure Gilgit-Baltistan Salajeet nationwide and internationally.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/923131562859" target="_blank" class="btn-primary inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-white">
                <i class="fab fa-whatsapp text-lg mr-2"></i> Order via WhatsApp
            </a>
            <a href="tel:+923131562859" class="inline-flex items-center justify-center rounded-xl px-7 py-4 font-semibold text-navy-900 bg-slate-100 hover:bg-slate-200 transition-colors">
                <i class="fas fa-phone mr-2"></i> Call Us Directly
            </a>
        </div>
    </div>
</section>
@endsection
