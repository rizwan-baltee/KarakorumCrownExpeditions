@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title)
@section('meta_description', $post->meta_description ?: Str::limit(strip_tags($post->content), 160))
@section('og_image', $post->featured_image_url)

@push('styles')
<style>
    /* Premium Editorial Typography for Article Content */
    .article-content {
        color: #334155;
        font-size: 1.125rem;
        line-height: 1.85;
    }
    .article-content h2 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.875rem;
        font-weight: 700;
        color: #0f172a;
        margin-top: 2.75rem;
        margin-bottom: 1.25rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid #e2e8f0;
        line-height: 1.3;
    }
    .article-content h3 {
        font-family: 'Playfair Display', Georgia, serif;
        font-size: 1.375rem;
        font-weight: 600;
        color: #1e293b;
        margin-top: 2rem;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }
    .article-content p {
        margin-bottom: 1.5rem;
    }
    .article-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-bottom: 1.75rem;
        space-y: 0.5rem;
    }
    .article-content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-bottom: 1.75rem;
    }
    .article-content li {
        margin-bottom: 0.5rem;
    }
    .article-content strong {
        color: #0f172a;
        font-weight: 600;
    }
    .article-content a {
        color: #16a34a;
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 3px;
        transition: color 0.2s;
    }
    .article-content a:hover {
        color: #15803d;
    }
    .article-content blockquote {
        border-left: 4px solid #16a34a;
        background: #f0fdf4;
        padding: 1.25rem 1.5rem;
        border-radius: 0 1rem 1rem 0;
        font-style: italic;
        margin: 2rem 0;
        color: #166534;
    }
    .article-content table {
        width: 100%;
        text-align: left;
        margin: 2rem 0;
        border-collapse: collapse;
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        overflow: hidden;
    }
    .article-content th {
        background: #f8fafc;
        padding: 0.75rem 1rem;
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 700;
        color: #475569;
        border-bottom: 1px solid #e2e8f0;
    }
    .article-content td {
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
    }
    .article-content .callout-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 4px solid #0f172a;
        padding: 1.25rem 1.5rem;
        border-radius: 0.75rem;
        margin: 2rem 0;
    }
    @media (max-width: 768px) {
        .article-content {
            font-size: 1rem;
            line-height: 1.75;
        }
        .article-content h2 {
            font-size: 1.5rem;
            margin-top: 2rem;
        }
        .article-content h3 {
            font-size: 1.25rem;
            margin-top: 1.5rem;
        }
        .article-content table {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }
</style>
@endpush

@push('head-scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Article",
  "headline": "{{ $post->title }}",
  "image": "{{ $post->featured_image_url }}",
  "author": {
    "@@type": "Person",
    "name": "{{ $post->author?->name ?? 'Muhammad Jaffar' }}",
    "jobTitle": "Licensed Expedition Guide",
    "worksFor": {
      "@@type": "Organization",
      "name": "Karakorum Crown Expeditions"
    }
  },
  "publisher": {
    "@@type": "Organization",
    "name": "Karakorum Crown Expeditions",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('assets/karakorum-logo.png') }}"
    }
  },
  "datePublished": "{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at ? $post->updated_at->toIso8601String() : $post->created_at->toIso8601String() }}",
  "mainEntityOfPage": {
    "@@type": "WebPage",
    "@@id": "{{ request()->url() }}"
  },
  "description": "{{ $post->meta_description ?: Str::limit(strip_tags($post->content), 160) }}"
}
</script>
@endpush

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-35">
        <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/80 to-transparent"></div>
    </div>
    
    <div class="relative container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="text-center">
            @if($post->category)
                <a href="{{ route('blog.category', $post->category->slug) }}" class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs uppercase tracking-[0.25em] text-brand-300 backdrop-blur-md mb-6 hover:bg-white/20 transition-colors">
                    {{ $post->category->name }}
                </a>
            @endif
            <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-6">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-white/80">
                @if($post->author)
                    <span class="flex items-center gap-2 font-medium">
                        <div class="w-8 h-8 rounded-full bg-brand-500/30 flex items-center justify-center border border-brand-400 text-brand-300 font-bold text-xs">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                        {{ $post->author->name }}
                    </span>
                @endif
                <span class="flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-brand-400"></i>
                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-clock text-brand-400"></i>
                    {{ $post->reading_time }} min read
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-eye text-brand-400"></i>
                    {{ number_format($post->views) }} views
                </span>
            </div>
        </div>
    </div>
</section>

{{-- Content Section --}}
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto">
            
            <article class="article-content">
                {!! $post->content !!}
            </article>

            {{-- In-article CTA Box --}}
            <div class="my-10 bg-gradient-to-r from-navy-900 to-navy-950 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <span class="text-xs uppercase tracking-widest text-brand-400 font-bold">Expert Mountain Planning</span>
                        <h4 class="font-display text-2xl font-bold mt-1 text-white">Planning this trek in Gilgit-Baltistan?</h4>
                        <p class="text-white/70 text-sm mt-2 max-w-lg">
                            Get personalized advice on route selection, required fitness levels, acclimatization schedules, and seasonal weather from our Skardu expedition team.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0 w-full md:w-auto">
                        <a href="https://wa.me/923425343629?text={{ urlencode('Hello Karakorum Crown Expeditions! I read your article "' . $post->title . '" and would like to ask some questions.') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#25D366] hover:bg-[#1fb855] text-white font-bold text-sm shadow-md transition-all text-center">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span>Chat on WhatsApp</span>
                        </a>
                        <a href="{{ route('booking.create') }}"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold text-sm transition-all text-center">
                            <span>Inquire Trip</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tags & Share --}}
            <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col sm:flex-row gap-6 justify-between items-center">
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('blog.tag', $tag->slug) }}" class="inline-block bg-slate-50 border border-slate-200 text-slate-600 text-sm font-semibold px-4 py-2 rounded-xl hover:border-brand-300 hover:bg-brand-50 hover:text-brand-700 transition-colors">
                            <i class="fas fa-hashtag text-slate-400 mr-1 text-xs"></i>{{ $tag->name }}
                        </a>
                    @endforeach
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm font-semibold text-slate-900 uppercase tracking-wider">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#1877F2] hover:text-white transition-colors" title="Share on Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#1DA1F2] hover:text-white transition-colors" title="Share on Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#25D366] hover:text-white transition-colors" title="Share on WhatsApp">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Author Box --}}
            @if($post->author)
            <div class="mt-12 bg-slate-50 rounded-3xl border border-slate-200 p-8 flex flex-col md:flex-row gap-6 items-center md:items-start text-center md:text-left">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-brand-500 to-brand-700 flex flex-shrink-0 items-center justify-center text-white font-display text-3xl shadow-lg">
                    {{ substr($post->author->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="font-display text-xl text-slate-900 mb-1 font-bold">Written by {{ $post->author->name }}</h3>
                    <p class="text-xs uppercase font-semibold text-brand-700 tracking-wider mb-3">Expedition Guide & Mountain Specialist</p>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Native to Gilgit-Baltistan with direct experience guiding high-altitude Karakoram expeditions, pass crossings, and wilderness treks. Dedicated to safe mountain tourism, local porter welfare, and unforgettable adventure journeys.
                    </p>
                    <a href="{{ route('booking.create') }}" class="text-brand-600 font-semibold text-sm hover:text-brand-700 transition-colors">
                        Plan a trek with our native team <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

{{-- Related Posts --}}
@if($relatedPosts && $relatedPosts->count() > 0)
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="font-display text-3xl text-slate-900 mb-10 text-center font-bold">You Might Also Like</h2>
        
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($relatedPosts as $related)
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col">
                    <a href="{{ route('blog.show', $related->slug) }}" class="block relative h-48 overflow-hidden bg-slate-900">
                        <img src="{{ $related->featured_image_url }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span class="flex items-center gap-1.5"><i class="fas fa-calendar-alt text-brand-500"></i> {{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-clock text-brand-500"></i> {{ $related->reading_time }} min</span>
                        </div>
                        <h3 class="font-display text-lg font-bold text-slate-900 leading-tight mb-3 group-hover:text-brand-600 transition-colors">
                            <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="text-slate-600 text-sm line-clamp-2 mb-4 flex-1">
                            {{ Str::limit(strip_tags($related->content), 110) }}
                        </p>
                        <div class="pt-3 border-t border-slate-100 mt-auto">
                            <a href="{{ route('blog.show', $related->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-600 hover:text-brand-700">
                                <span>Read More</span>
                                <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
