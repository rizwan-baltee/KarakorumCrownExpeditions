@extends('layouts.app')

@section('title', (isset($category) ? $category->name . ' - ' : (isset($tag) ? 'Tag: ' . $tag->name . ' - ' : 'Blog - ')) . 'Karakorum Crown Expeditions')

@section('content')

<section class="relative bg-navy-950 pt-32 pb-16">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-white/80 backdrop-blur-md mb-6">
                <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                Travel Stories & Guides
            </div>
            <h1 class="font-display text-4xl md:text-5xl text-white leading-tight">
                @if(isset($category))
                    {{ $category->name }}
                @elseif(isset($tag))
                    Posts Tagged: {{ $tag->name }}
                @else
                    The Explorer's Journal
                @endif
            </h1>
            <p class="mt-4 text-white/60 text-lg max-w-xl mx-auto">
                @if(isset($category))
                    {{ $category->description ?? 'Discover our latest articles about ' . $category->name . '.' }}
                @elseif(isset($tag))
                    Browse all stories and guides related to {{ $tag->name }}.
                @else
                    Expert advice, destination guides, and stories from the heart of the Karakoram.
                @endif
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50 min-h-[50vh]">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-10">
            
            {{-- Main Content --}}
            <div class="lg:w-2/3">
                @if($posts->count() > 0)
                    <div class="grid md:grid-cols-2 gap-8">
                        @foreach($posts as $post)
                            <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-xl transition-all duration-300">
                                <a href="{{ route('blog.show', $post->slug) }}" class="block relative h-64 overflow-hidden">
                                    @if($post->featured_image)
                                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                                            <i class="fas fa-image text-slate-400 text-4xl"></i>
                                        </div>
                                    @endif
                                    @if($post->category)
                                        <span class="absolute top-4 left-4 bg-brand-500 text-white text-xs font-bold uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-lg">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                </a>
                                <div class="p-6 md:p-8">
                                    <div class="flex items-center gap-4 text-xs text-slate-500 mb-3">
                                        <span class="flex items-center gap-1.5">
                                            <i class="fas fa-calendar-alt text-brand-400"></i>
                                            {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                        </span>
                                        <span class="flex items-center gap-1.5">
                                            <i class="fas fa-clock text-brand-400"></i>
                                            {{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} min read
                                        </span>
                                    </div>
                                    <h2 class="font-display text-xl md:text-2xl text-slate-900 leading-tight mb-3 group-hover:text-brand-600 transition-colors">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p class="text-slate-600 line-clamp-3 mb-5">
                                        {{ Str::limit(strip_tags($post->content), 150) }}
                                    </p>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center gap-2 text-brand-600 font-semibold hover:text-brand-700 transition-colors">
                                        Read Article <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-3xl border border-slate-200 p-12 text-center">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-2xl text-slate-400"></i>
                        </div>
                        <h3 class="font-display text-2xl text-slate-900 mb-2">No articles found</h3>
                        <p class="text-slate-500">We couldn't find any articles matching your criteria.</p>
                        <a href="{{ route('blog.index') }}" class="btn-primary mt-6 inline-block px-6 py-3 rounded-xl font-semibold">View All Articles</a>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="lg:w-1/3">
                <div class="lg:sticky lg:top-28 space-y-8">
                    
                    {{-- Search Widget --}}
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-display text-lg text-slate-900 mb-4">Search Articles</h3>
                        <form action="{{ route('blog.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-300 focus:outline-none focus:border-brand-500 focus:ring-1 focus:ring-brand-500">
                                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-brand-500">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Categories Widget --}}
                    @if(isset($categories) && $categories->count() > 0)
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-display text-lg text-slate-900 mb-4">Categories</h3>
                        <ul class="space-y-3">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('blog.category', $cat->slug) }}" class="flex items-center justify-between group">
                                        <span class="text-slate-600 group-hover:text-brand-600 transition-colors {{ isset($category) && $category->id === $cat->id ? 'font-bold text-brand-600' : '' }}">{{ $cat->name }}</span>
                                        <span class="bg-slate-100 text-slate-500 text-xs font-semibold px-2.5 py-1 rounded-full group-hover:bg-brand-50 group-hover:text-brand-600 transition-colors">{{ $cat->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Tags Widget --}}
                    @if(isset($tags) && $tags->count() > 0)
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-display text-lg text-slate-900 mb-4">Popular Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($tags as $t)
                                <a href="{{ route('blog.tag', $t->slug) }}" class="inline-block border border-slate-200 text-slate-600 text-xs font-semibold px-3 py-1.5 rounded-lg hover:border-brand-300 hover:bg-brand-50 hover:text-brand-700 transition-colors {{ isset($tag) && $tag->id === $t->id ? 'bg-brand-50 border-brand-300 text-brand-700' : '' }}">
                                    {{ $t->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- CTA Widget --}}
                    <div class="bg-navy-950 rounded-3xl border border-navy-900 shadow-xl p-6 text-white text-center relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-brand-500/20 blur-2xl"></div>
                        <h3 class="font-display text-xl mb-3 relative z-10">Plan Your Adventure</h3>
                        <p class="text-sm text-white/70 mb-5 relative z-10">Ready to explore Gilgit-Baltistan with local experts?</p>
                        <a href="{{ route('booking.create') }}" class="btn-primary block w-full py-3 rounded-xl font-semibold relative z-10">Book a Tour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
