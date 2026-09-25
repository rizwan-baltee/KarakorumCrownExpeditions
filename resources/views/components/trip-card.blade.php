@props([
    'trek',
    'showBookButton' => true,
    'class' => ''
])

@php
    $imageUrl = $trek->primary_image_url;
    $categoryName = $trek->type?->name ?? 'Adventure';
    $startingPrice = $trek->starting_price_formatted;
    $numericPrice = $trek->calculated_starting_price;
    $detailUrl = route('trek.show', $trek->slug);
    $bookUrl = route('booking.create', ['trek' => $trek->slug]);
@endphp

<article {{ $attributes->merge(['class' => 'group flex flex-col overflow-hidden rounded-3xl bg-white shadow-md hover:shadow-2xl border border-slate-100 transition-all duration-500 hover:-translate-y-1.5 ' . $class]) }}>
    {{-- Cover Image & Badges --}}
    <div class="relative aspect-[16/10] w-full overflow-hidden bg-navy-950">
        <a href="{{ $detailUrl }}" class="block h-full w-full">
            <img src="{{ $imageUrl }}"
                 alt="{{ $trek->title }}"
                 loading="lazy"
                 decoding="async"
                 class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-108">
        </a>
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-navy-950/85 via-navy-950/20 to-transparent"></div>

        {{-- Top Badges --}}
        <div class="absolute top-4 left-4 right-4 flex items-center justify-between gap-2 pointer-events-none">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-navy-900/80 backdrop-blur-md px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-brand-300 border border-white/10 shadow-sm">
                    <i class="{{ $trek->type?->icon ?? 'fas fa-mountain' }} text-[10px] text-brand-400"></i>
                    {{ $categoryName }}
                </span>
                @if($trek->is_trending)
                    <span class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-white shadow-sm">
                        <i class="fas fa-fire-alt text-[9px]"></i> Popular
                    </span>
                @endif
            </div>

            @if($trek->duration_days)
                <span class="inline-flex items-center gap-1.5 rounded-full bg-white/90 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-slate-800 shadow-sm">
                    <i class="far fa-clock text-brand-600 text-xs"></i>
                    {{ $trek->duration_days }} {{ \Str::plural('Day', $trek->duration_days) }}
                </span>
            @endif
        </div>

        {{-- Bottom Overlay Info on Image (Location & Altitude) --}}
        <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between text-xs text-white/90 pointer-events-none">
            @if($trek->location)
                <span class="flex items-center gap-1.5 font-medium truncate max-w-[65%] drop-shadow-sm">
                    <i class="fas fa-map-marker-alt text-brand-400 flex-shrink-0 text-xs"></i>
                    <span class="truncate">{{ $trek->location }}</span>
                </span>
            @endif
            @if($trek->height_meters)
                <span class="flex items-center gap-1 font-semibold text-white/95 drop-shadow-sm ml-auto">
                    <i class="fas fa-mountain text-brand-400 text-xs"></i>
                    {{ number_format($trek->height_meters) }}m
                </span>
            @endif
        </div>
    </div>

    {{-- Body Content --}}
    <div class="flex flex-1 flex-col p-6">
        {{-- Trek Title --}}
        <h3 class="font-display text-xl font-bold text-slate-900 group-hover:text-brand-700 transition-colors line-clamp-1">
            <a href="{{ $detailUrl }}">{{ $trek->title }}</a>
        </h3>

        {{-- Short 1-2 line description --}}
        <p class="mt-2 text-sm text-slate-600 line-clamp-2 leading-relaxed min-h-[2.5rem]">
            {{ \Str::limit(strip_tags($trek->overview ?: ($trek->description ?: 'Explore the majestic Karakoram mountains with certified high-altitude guides and tailored logistics.')), 120) }}
        </p>

        {{-- Meta Highlights Pill Grid --}}
        <div class="mt-4 pt-3.5 border-t border-slate-100 grid grid-cols-2 gap-2 text-xs">
            <div class="flex items-center gap-2 text-slate-600">
                <div class="w-6 h-6 rounded-md bg-slate-50 flex items-center justify-center flex-shrink-0 text-slate-400">
                    <i class="fas fa-signal text-[10px]"></i>
                </div>
                <span class="truncate font-medium">
                    {{ $trek->difficulty_label }}
                </span>
            </div>

            @if($trek->best_season)
                <div class="flex items-center gap-2 text-slate-600">
                    <div class="w-6 h-6 rounded-md bg-amber-50 flex items-center justify-center flex-shrink-0 text-amber-600">
                        <i class="far fa-calendar-alt text-[10px]"></i>
                    </div>
                    <span class="truncate font-medium" title="{{ $trek->best_season }}">
                        {{ $trek->best_season }}
                    </span>
                </div>
            @elseif($trek->max_guests)
                <div class="flex items-center gap-2 text-slate-600">
                    <div class="w-6 h-6 rounded-md bg-blue-50 flex items-center justify-center flex-shrink-0 text-blue-600">
                        <i class="fas fa-users text-[10px]"></i>
                    </div>
                    <span class="truncate font-medium">
                        Max {{ $trek->max_guests }} persons
                    </span>
                </div>
            @endif
        </div>

        {{-- Pricing & Action CTAs --}}
        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            {{-- Price Block --}}
            <div>
                <p class="text-[10px] uppercase tracking-wider font-semibold text-slate-400 leading-none">Starting From</p>
                <div class="mt-1 flex items-baseline gap-1">
                    <span class="font-display text-2xl font-bold text-slate-900 tracking-tight">
                        {{ $startingPrice }}
                    </span>
                    @if($numericPrice)
                        <span class="text-[11px] text-slate-500 font-medium">/ person</span>
                    @endif
                </div>
            </div>

            {{-- Dual CTAs --}}
            <div class="flex items-center gap-2">
                <a href="{{ $detailUrl }}"
                   class="inline-flex items-center justify-center rounded-xl px-3.5 py-2.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-colors"
                   title="View complete itinerary and details">
                    Details
                </a>

                @if($showBookButton)
                    <a href="{{ $bookUrl }}"
                       class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2.5 text-xs font-bold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 shadow-md hover:shadow-lg transition-all"
                       title="Book this trip directly">
                        <i class="fas fa-calendar-check text-[11px]"></i>
                        <span>Book</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</article>
