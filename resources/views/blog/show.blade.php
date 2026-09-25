@extends('layouts.app')

@section('title', $post->meta_title ?: $post->title . ' - Karakorum Crown Expeditions')
@section('meta_description', $post->meta_description ?: Str::limit(strip_tags($post->content), 160))
@section('og_image', $post->featured_image ? Storage::url($post->featured_image) : asset('assets/default-og.jpg'))

@section('content')

{{-- Hero Section --}}
<section class="relative bg-navy-950 pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden">
    @if($post->featured_image)
        <div class="absolute inset-0">
            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-950/80 to-transparent"></div>
        </div>
    @else
        <div class="absolute inset-0 hero-glow"></div>
    @endif
    
    <div class="relative container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="text-center">
            @if($post->category)
                <a href="{{ route('blog.category', $post->category->slug) }}" class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-brand-400 backdrop-blur-md mb-6 hover:bg-white/10 transition-colors">
                    {{ $post->category->name }}
                </a>
            @endif
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl text-white leading-tight mb-6">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center justify-center gap-6 text-sm text-white/70">
                @if($post->author)
                    <span class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-brand-500/20 flex items-center justify-center border border-brand-500/30 text-brand-400 font-bold text-xs">
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
                    {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} min read
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
            
            <article class="prose prose-slate prose-lg md:prose-xl max-w-none">
                {!! $post->content !!}
            </article>

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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#1877F2] hover:text-white transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#1DA1F2] hover:text-white transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 hover:bg-[#25D366] hover:text-white transition-colors">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </a>
                </div>
            </div>

            {{-- Author Box --}}
            @if($post->author)
            <div class="mt-12 bg-slate-50 rounded-3xl border border-slate-100 p-8 flex flex-col md:flex-row gap-6 items-center md:items-start text-center md:text-left">
                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-brand-400 to-brand-600 flex flex-shrink-0 items-center justify-center text-white font-display text-3xl shadow-lg">
                    {{ substr($post->author->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="font-display text-xl text-slate-900 mb-2">Written by {{ $post->author->name }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Passionate explorer and guide at Karakorum Crown Expeditions. Dedicated to sharing the untold stories and hidden gems of Gilgit-Baltistan with the world.
                    </p>
                    <a href="{{ route('booking.create') }}" class="text-brand-600 font-semibold text-sm hover:text-brand-700 transition-colors">Book a tour with our experts <i class="fas fa-arrow-right ml-1"></i></a>
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
        <h2 class="font-display text-3xl text-slate-900 mb-10 text-center">You might also like</h2>
        
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($relatedPosts as $related)
                <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300">
                    <a href="{{ route('blog.show', $related->slug) }}" class="block relative h-48 overflow-hidden">
                        @if($related->featured_image)
                            <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                <i class="fas fa-image text-slate-400 text-3xl"></i>
                            </div>
                        @endif
                    </a>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span class="flex items-center gap-1.5"><i class="fas fa-calendar-alt text-brand-400"></i> {{ $related->published_at ? $related->published_at->format('M d') : $related->created_at->format('M d') }}</span>
                            <span class="flex items-center gap-1.5"><i class="fas fa-clock text-brand-400"></i> {{ max(1, ceil(str_word_count(strip_tags($related->content)) / 200)) }} min</span>
                        </div>
                        <h3 class="font-display text-lg text-slate-900 leading-tight mb-3 group-hover:text-brand-600 transition-colors">
                            <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                        </h3>
                        <p class="text-slate-600 text-sm line-clamp-2">
                            {{ Str::limit(strip_tags($related->content), 100) }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
