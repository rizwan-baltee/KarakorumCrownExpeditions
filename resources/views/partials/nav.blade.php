<!-- Top Bar - Minimal & Elegant -->
<div class="bg-navy-900 text-white/70 py-2 text-xs tracking-wide border-b border-white/10">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-6">
                <a href="tel:+923131562859" class="flex items-center gap-1.5 hover:text-white transition-colors">
                    <i class="fas fa-phone text-brand-400"></i>
                    <span>+92 3425343629</span>
                </a>
                <a href="mailto:karakorumcrownexpeditions@gmail.com" class="hidden sm:flex items-center gap-1.5 hover:text-white transition-colors">
                    <i class="fas fa-envelope text-brand-400"></i>
                    <span>karakorumcrownexpeditions@gmail.com</span>
                </a>
                <span class="hidden md:flex items-center gap-1.5">
                    <i class="fas fa-map-marker-alt text-brand-400"></i>
                    <span>Satpara Road, Zhye Thang 1, Near Hispar Hotel, Skardu, Shigar, Skardu, Gilgit-Baltistan, Pakistan</span>
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="hidden sm:inline text-white/40">|</span>
                <span class="hidden sm:inline text-white/50">Licensed Tour Operator CUIN: 0343091
</span>
                <div class="flex items-center gap-3 ml-2">
                    <a href="#" class="hover:text-white transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-white transition-colors"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav id="main-nav" class="bg-navy-900/95 sticky top-0 z-50 transition-all duration-500">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 group">
                <img src="{{ asset('assets/karakorum-logo.png') }}" alt="Karakorum Crown Expeditions" class="h-12 md:h-14 w-auto rounded-lg bg-white/5 object-contain group-hover:scale-105 transition-transform duration-300">
                <div class="hidden sm:block">
                    <div class="text-white font-display text-lg font-semibold leading-tight tracking-wide">Karakorum Crown</div>
                    <div class="text-brand-400 text-[10px] tracking-[0.2em] uppercase font-medium">Expeditions</div>
                </div>
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none p-2">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Desktop Menu -->
            <ul class="hidden lg:flex items-center space-x-0.5">
                <li>
                    <a href="/" class="nav-link text-white/80 hover:text-white px-2 py-7 block text-sm font-medium tracking-wide">Home</a>
                </li>

                {{-- Dynamic Type-Based Navigation --}}
                @foreach($navTypes as $navType)
                    <li class="dropdown relative">
                        <a href="{{ route('type.index', $navType->slug) }}" class="nav-link text-white/80 hover:text-white px-2 py-7 flex items-center gap-1.5 text-sm font-medium tracking-wide">
                            {{ $navType->name }} <i class="fas fa-chevron-down text-[10px] opacity-50"></i>
                        </a>
                        <div class="dropdown-menu absolute left-0 bg-white shadow-2xl rounded-xl mt-0 py-4 w-72 border border-gray-100">
                            <div class="px-5">
                                <a href="{{ route('type.index', $navType->slug) }}" class="bg-brand-50 px-3 py-2 rounded-lg mb-3 block hover:bg-brand-100 transition-colors">
                                    <h4 class="font-bold text-brand-700 text-xs uppercase tracking-wider">
                                        <i class="{{ $navType->icon ?? 'fas fa-compass' }} mr-1"></i> All {{ $navType->name }}
                                    </h4>
                                </a>
                                @if($navType->trendingTreks->count())
                                <ul class="space-y-1 pl-1">
                                    @foreach($navType->trendingTreks as $trek)
                                    <li>
                                        <a href="{{ route('trek.show', $trek->slug) }}" class="text-gray-600 hover:text-brand-600 block py-1.5 text-sm transition-all">
                                            {{ $trek->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                <p class="text-gray-400 text-sm py-2">No items yet</p>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach

                <li>
                    <a href="/about-us" class="nav-link text-white/80 hover:text-white px-2 py-7 block text-sm font-medium tracking-wide">About</a>
                </li>
                <li>
                    <a href="/how-to-apply" class="nav-link text-white/80 hover:text-white px-2 py-7 block text-sm font-medium tracking-wide">Visa Guide</a>
                </li>
                <li>
                    <a href="/salajeet" class="nav-link text-white/80 hover:text-white px-2 py-7 block text-sm font-medium tracking-wide">Salajeet</a>
                </li>
                <li class="dropdown relative">
                    <a href="#" class="nav-link text-white/80 hover:text-white px-2 py-7 flex items-center gap-1.5 text-sm font-medium tracking-wide">
                        <i class="fas fa-globe text-brand-400"></i> Language <i class="fas fa-chevron-down text-[10px] opacity-50"></i>
                    </a>
                    <div class="dropdown-menu absolute right-0 left-auto md:left-0 md:right-auto bg-white shadow-2xl rounded-xl mt-0 py-2 w-48 border border-gray-100">
                        <div class="px-2" id="desktop-language-list">
                            <a href="#" onclick="doGTranslate('en|en'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇺🇸 English</a>
                            <a href="#" onclick="doGTranslate('en|ms'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors font-semibold text-brand-600">🇲🇾 Bahasa Melayu</a>
                            <a href="#" onclick="doGTranslate('en|zh-CN'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇨🇳 中文 (Chinese)</a>
                            <a href="#" onclick="doGTranslate('en|es'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇪🇸 Español (Spanish)</a>
                            <a href="#" onclick="doGTranslate('en|fr'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇫🇷 Français (French)</a>
                            <a href="#" onclick="doGTranslate('en|de'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇩🇪 Deutsch (German)</a>
                            <a href="#" onclick="doGTranslate('en|ar'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇸🇦 العربية (Arabic)</a>
                            <a href="#" onclick="doGTranslate('en|ja'); return false;" class="block px-3 py-2 text-sm text-gray-600 hover:text-brand-600 hover:bg-brand-50 rounded-lg transition-colors">🇯🇵 日本語 (Japanese)</a>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- CTA Button -->
            <div class="hidden lg:flex items-center gap-4">
                <a href="{{ route('booking.create') }}" class="btn-primary px-6 py-2.5 rounded-lg text-white text-sm font-semibold tracking-wide">
                    <i class="fas fa-calendar-check mr-2"></i>Book Now
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-navy-900 border-t border-white/10 max-h-[80vh] overflow-y-auto">
        <ul class="space-y-0 px-4 py-2">
            <li><a href="/" class="text-white/80 block py-3 hover:text-white px-3 text-sm font-medium">Home</a></li>
            
            {{-- Dynamic Mobile Navigation --}}
            @foreach($navTypes as $navType)
            <li>
                <div class="flex items-center justify-between py-3 px-3">
                    <a href="{{ route('type.index', $navType->slug) }}" class="text-white/80 text-sm font-medium hover:text-white flex items-center gap-2">
                        <i class="{{ $navType->icon ?? 'fas fa-compass' }} text-brand-400 text-xs"></i>
                        {{ $navType->name }}
                    </a>
                    @if($navType->trendingTreks->count())
                    <button class="mobile-dropdown-btn text-white/60 p-1">
                        <i class="fas fa-chevron-down text-xs transition-transform"></i>
                    </button>
                    @endif
                </div>
                @if($navType->trendingTreks->count())
                <div class="hidden pl-4 pb-2 space-y-1">
                    <a href="{{ route('type.index', $navType->slug) }}" class="text-brand-400 block py-2 px-3 text-sm font-medium hover:text-white">
                        View all {{ $navType->name }} →
                    </a>
                    @foreach($navType->trendingTreks as $trek)
                    <a href="{{ route('trek.show', $trek->slug) }}" class="text-white/60 block py-2 px-3 text-sm hover:text-white">{{ $trek->title }}</a>
                    @endforeach
                </div>
                @endif
            </li>
            @endforeach
            
            <li><a href="/about-us" class="text-white/80 block py-3 px-3 text-sm font-medium hover:text-white">About Us</a></li>
            <li><a href="/how-to-apply" class="text-white/80 block py-3 px-3 text-sm font-medium hover:text-white">Visa Guide</a></li>
            <li><a href="/salajeet" class="text-white/80 block py-3 px-3 text-sm font-medium hover:text-white">Salajeet</a></li>
            
            <!-- Language Selection -->
            <li>
                <div class="flex items-center justify-between py-3 px-3">
                    <span class="text-white/80 text-sm font-medium flex items-center gap-2">
                        <i class="fas fa-globe text-brand-400 text-xs"></i> Language
                    </span>
                </div>
                <div class="pl-4 pb-2 space-y-1" id="mobile-language-list">
                    <a href="#" onclick="doGTranslate('en|en'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇺🇸 English</a>
                    <a href="#" onclick="doGTranslate('en|ms'); return false;" class="text-brand-400 font-semibold block py-2 px-3 text-sm hover:text-white">🇲🇾 Bahasa Melayu</a>
                    <a href="#" onclick="doGTranslate('en|zh-CN'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇨🇳 中文 (Chinese)</a>
                    <a href="#" onclick="doGTranslate('en|es'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇪🇸 Español (Spanish)</a>
                    <a href="#" onclick="doGTranslate('en|fr'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇫🇷 Français (French)</a>
                    <a href="#" onclick="doGTranslate('en|de'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇩🇪 Deutsch (German)</a>
                    <a href="#" onclick="doGTranslate('en|ar'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇸🇦 العربية (Arabic)</a>
                    <a href="#" onclick="doGTranslate('en|ja'); return false;" class="text-white/60 block py-2 px-3 text-sm hover:text-white">🇯🇵 日本語 (Japanese)</a>
                </div>
            </li>
            
            <!-- Mobile CTA -->
            <li class="pt-4 pb-2">
                <a href="{{ route('booking.create') }}" class="block btn-primary text-center py-3 rounded-lg text-white text-sm font-semibold">
                    <i class="fas fa-calendar-check mr-2"></i>Book Now
                </a>
            </li>
            <li class="pb-2">
                <a href="tel:+923131562859" class="block text-center py-3 rounded-lg border border-white/20 text-white/70 text-sm font-medium hover:text-white hover:border-white/40 transition-colors">
                    <i class="fas fa-phone-alt mr-2"></i>Or Call Us Directly
                </a>
            </li>
        </ul>
    </div>
</nav>