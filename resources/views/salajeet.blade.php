@extends('layouts.app')

@section('title', 'Traditional Mountain Mineral Pitch (Salajeet) - Karakorum Crown Expeditions')
@section('meta_description', 'An educational overview of traditional high-altitude mineral resin collected by native mountain gatherers in the Karakoram and Himalayan cliffs of Gilgit-Baltistan.')
@section('meta_robots', 'noindex, nofollow')

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-20 md:pt-40 md:pb-24 overflow-hidden text-white">
    <div class="absolute inset-0 hero-glow pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-500/10 rounded-full blur-[140px] pointer-events-none"></div>

    <div class="relative container mx-auto px-4 lg:px-8 text-center max-w-4xl">
        <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.2em] text-brand-300 backdrop-blur-md mb-6">
            <i class="fas fa-mountain text-brand-400"></i>
            <span>Geological & Cultural Heritage of Gilgit-Baltistan</span>
        </div>
        <h1 class="font-display text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight text-white leading-tight">
            Traditional Mountain Mineral Pitch<br>
            <span class="text-brand-400">(Salajeet / Shilajit)</span>
        </h1>
        <p class="mt-4 text-white/70 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed font-light">
            An educational look at the natural mineral resin traditionally gathered by native highlanders from high-altitude rock crevices in the Karakoram and Himalayan ranges.
        </p>

        {{-- Mandatory Policy Notice --}}
        <div class="mt-8 max-w-2xl mx-auto bg-amber-500/15 border border-amber-400/30 rounded-2xl p-4 text-left text-xs text-amber-200/90 leading-relaxed">
            <div class="flex items-start gap-2.5">
                <i class="fas fa-exclamation-triangle text-amber-400 mt-0.5 flex-shrink-0 text-sm"></i>
                <div>
                    <strong>Notice:</strong> This page is strictly for cultural, geographical, and historical education. Karakorum Crown Expeditions is a licensed tourism and trekking operator. We make zero medical or therapeutic claims.
                </div>
            </div>
        </div>
    </div>

    <!-- Video Showcase -->
    @if(file_exists(public_path('assets/salajeet.MOV')))
    <div class="relative w-full mt-12 h-[45vh] md:h-[65vh] bg-navy-950 border-t border-b border-white/10 max-w-6xl mx-auto rounded-3xl overflow-hidden shadow-2xl">
        <video 
            class="absolute inset-0 w-full h-full object-cover" 
            autoplay loop muted playsinline controls>
            <source src="{{ asset('assets/salajeet.MOV') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    @endif
</section>

{{-- Geological Origin Section --}}
<section class="bg-white py-20 border-b border-slate-100">
    <div class="container mx-auto px-4 lg:px-8 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-5">
                <span class="text-brand-600 text-xs font-bold tracking-[0.2em] uppercase block">
                    Geological Context
                </span>
                <h2 class="font-display text-3xl md:text-4xl text-navy-950 font-bold leading-tight">
                    A Natural Rock Exudate of High-Altitude Cliffs
                </h2>
                <div class="space-y-4 text-slate-600 text-sm md:text-base leading-relaxed">
                    <p>
                        In the steep cliff walls of Gilgit-Baltistan—often at elevations between 3,000 and 5,000 meters—a thick, tar-like dark mineral resin known locally as <em>Salajeet</em> naturally exudes from rock fractures during hot summer months.
                    </p>
                    <p>
                        Geologists and researchers note that this substance forms over extensive periods through the slow humification of compressed mountain flora and microorganisms within sedimentary rock layers, absorbing minerals from the surrounding granite and limestone.
                    </p>
                    <p>
                        Native Balti gatherers scale these vertical rock faces during midsummer to harvest the raw pitch before it is washed and purified using traditional water filtration and sunlight settling techniques.
                    </p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-3xl p-8 space-y-4">
                <h3 class="font-display text-lg font-bold text-slate-900 mb-2 flex items-center gap-2">
                    <i class="fas fa-layer-group text-brand-600"></i>
                    <span>Composition & Characteristics</span>
                </h3>
                <div class="space-y-3 text-xs text-slate-600">
                    <div class="p-3.5 bg-white rounded-xl border border-slate-100 flex items-start gap-3">
                        <i class="fas fa-mountain text-slate-400 mt-0.5"></i>
                        <div>
                            <strong class="text-slate-900 block">Origin Elevation:</strong>
                            Harvested primarily from steep rock faces in Skardu, Shigar, and Khaplu valleys (3,000 m – 5,000 m).
                        </div>
                    </div>
                    <div class="p-3.5 bg-white rounded-xl border border-slate-100 flex items-start gap-3">
                        <i class="fas fa-filter text-slate-400 mt-0.5"></i>
                        <div>
                            <strong class="text-slate-900 block">Traditional Filtration:</strong>
                            Dissolved in spring water, filtered through clean cotton muslin, and slowly evaporated under direct sunlight.
                        </div>
                    </div>
                    <div class="p-3.5 bg-white rounded-xl border border-slate-100 flex items-start gap-3">
                        <i class="fas fa-flask text-slate-400 mt-0.5"></i>
                        <div>
                            <strong class="text-slate-900 block">Naturally Occurring Elements:</strong>
                            Contains fulvic complexes, humic acids, and naturally occurring trace elements common to alpine bedrock.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Comprehensive Medical Disclaimer --}}
<section class="bg-slate-50 py-16 border-b border-slate-200/70">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-3xl border border-slate-200 p-8 md:p-10 shadow-sm space-y-4">
            <div class="flex items-center gap-3 text-amber-600 mb-2">
                <i class="fas fa-shield-alt text-2xl"></i>
                <h3 class="font-display text-xl font-bold text-slate-900">
                    Mandatory Health & Regulatory Disclaimer
                </h3>
            </div>
            <div class="text-xs text-slate-600 space-y-3 leading-relaxed">
                <p>
                    <strong>Not a Regulated Pharmaceutical Drug:</strong> Salajeet (Shilajit) referenced on this site has not been evaluated, tested, or registered as a drug or medicine by the Drug Regulatory Authority of Pakistan (DRAP), the United States Food and Drug Administration (FDA), the European Medicines Agency (EMA), or any other regulatory health authority.
                </p>
                <p>
                    <strong>No Therapeutic Claims:</strong> This product or substance is <em>not intended to diagnose, treat, cure, mitigate, or prevent any illness, chronic condition, or disease</em>. Karakorum Crown Expeditions explicitly disclaims all unproven medical claims, including claims regarding chronic fatigue, testosterone, memory enhancement, immune curing, or anti-aging properties.
                </p>
                <p>
                    <strong>Medical Supervision Required:</strong> Raw or unpurified mountain resins can contain heavy metal traces or impurities if improperly processed. Anyone considering consuming traditional dietary resins must seek advice from a licensed medical practitioner, especially individuals who are pregnant, nursing, suffering from gout, kidney disorders, high iron levels, or taking prescription pharmaceuticals.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="bg-white py-16">
    <div class="container mx-auto px-4 lg:px-8 text-center max-w-2xl">
        <h2 class="font-display text-2xl md:text-3xl text-navy-950 font-bold mb-3">General Inquiries</h2>
        <p class="text-slate-600 text-sm mb-6">
            For questions regarding local Balti mountain heritage, traditional crafts, or trekking logistics in Gilgit-Baltistan:
        </p>
        <div class="inline-flex flex-col sm:flex-row gap-3 justify-center">
            <a href="https://wa.me/923425343629" target="_blank" rel="noopener noreferrer" class="btn-primary inline-flex items-center justify-center rounded-xl px-6 py-3.5 text-xs font-bold text-white shadow-sm">
                <i class="fab fa-whatsapp text-sm mr-2"></i> WhatsApp Support: +92 3425343629
            </a>
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-xl px-6 py-3.5 text-xs font-bold text-slate-800 bg-slate-100 hover:bg-slate-200 transition-colors">
                <i class="fas fa-home mr-2"></i> Return to Homepage
            </a>
        </div>
    </div>
</section>

@endsection
