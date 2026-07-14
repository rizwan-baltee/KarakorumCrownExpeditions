<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Karakorum Crown Expeditions | Top Karakorum Treks & Tours')</title>
    <meta name="description" content="Karakorum Crown Expeditions offers the best premium guided treks, K2 expeditions, and cultural tours in Karakorum, Gilgit-Baltistan and Northern Pakistan. Top rated travel agency.">
    <meta name="keywords" content="Karakorum, Karakorum Crown Expeditions, top Karakorum tours, K2 base camp trek, Gilgit-Baltistan travel, Pakistan expeditions, best Karakorum treks">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        navy: {
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        },
                        gold: {
                            400: '#d4a853',
                            500: '#c9952e',
                        }
                    },
                    fontFamily: {
                        display: ['Playfair Display', 'Georgia', 'serif'],
                        body: ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts: Playfair Display (luxury headings) + Inter (clean body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    
    <style>
        /* ============================================
           GLOBAL PREMIUM STYLES
           ============================================ */
        * {
            font-family: 'Inter', system-ui, sans-serif;
        }
        
        body {
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        h1, h2, h3, .font-display {
            font-family: 'Playfair Display', Georgia, serif;
        }
        
        /* Smooth image loading */
        img {
            transition: opacity 0.3s ease;
        }
        
        /* ============================================
           NAVIGATION
           ============================================ */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-menu {
            display: none;
        }
        
        .mega-menu {
            min-width: 700px;
        }
        
        @media (min-width: 768px) {
            .mega-menu {
                width: 860px;
                left: 50%;
                transform: translateX(-50%);
            }
        }
        
        .mega-menu-column-header {
            color: #16a34a;
            font-weight: 600;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #dcfce7;
            margin-bottom: 0.75rem;
        }
        
        .nav-link {
            transition: color 0.3s ease, opacity 0.3s ease;
        }
        
        .nav-link:hover {
            color: #22c55e !important;
        }
        
        /* Navbar glass effect on scroll */
        .nav-scrolled {
            background: rgba(15, 23, 42, 0.95) !important;
            backdrop-filter: blur(20px);
            box-shadow: 0 1px 20px rgba(0, 0, 0, 0.3);
        }
        
        /* ============================================
           CAROUSEL / HERO
           ============================================ */
        .carousel-item {
            display: none;
        }
        
        .carousel-item.active {
            display: block;
        }
        
        .hero-overlay {
            background: linear-gradient(
                to bottom,
                rgba(15, 23, 42, 0.4) 0%,
                rgba(15, 23, 42, 0.2) 40%,
                rgba(15, 23, 42, 0.5) 80%,
                rgba(15, 23, 42, 0.85) 100%
            );
        }
        
        /* ============================================
           BUTTONS
           ============================================ */
        .btn-primary {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(22, 163, 74, 0.35);
        }
        
        .btn-gold {
            background: linear-gradient(135deg, #d4a853 0%, #c9952e 100%);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212, 168, 83, 0.35);
        }
        
        .btn-outline-light {
            border: 1.5px solid rgba(255, 255, 255, 0.6);
            transition: all 0.4s ease;
        }
        
        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.9);
        }
        
        /* ============================================
           CARDS
           ============================================ */
        .trek-card {
            transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow: hidden;
        }
        
        .trek-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
        }
        
        .trek-card img {
            transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        
        .trek-card:hover img {
            transform: scale(1.08);
        }
        
        /* ============================================
           OWL CAROUSEL OVERRIDES
           ============================================ */
        .owl-carousel .owl-item img {
            width: 100%;
            height: 480px;
            object-fit: cover;
        }
        
        .owl-theme .owl-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            left: 0;
            display: flex;
            justify-content: space-between;
            pointer-events: none;
            margin-top: 0 !important;
            padding: 0 !important;
        }
        
        .owl-theme .owl-nav [class*='owl-'] {
            background: rgba(255, 255, 255, 0.95) !important;
            color: #0f172a !important;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease;
            pointer-events: all;
            position: absolute !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        
        .owl-theme .owl-nav .owl-prev {
            top: -44px;
            left: -24px;
        }
        
        .owl-theme .owl-nav .owl-next {
            top: -44px;
            right: -24px;
        }
        
        .owl-theme .owl-nav [class*='owl-']:hover {
            background: #16a34a !important;
            color: white !important;
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(22, 163, 74, 0.3);
        }
        
        .owl-theme .owl-dots .owl-dot span {
            background: #cbd5e1 !important;
            width: 10px;
            height: 10px;
            transition: all 0.3s ease;
        }
        
        .owl-theme .owl-dots .owl-dot.active span {
            background: #16a34a !important;
            width: 28px;
            border-radius: 5px;
        }
        
        /* ============================================
           SUBTLE ANIMATIONS
           ============================================ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        
        /* ============================================
           UTILITY
           ============================================ */
        .text-balance {
            text-wrap: balance;
        }
        
        /* Divider line */
        .section-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #16a34a, #d4a853);
            border-radius: 2px;
        }
        
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* ============================================
           GOOGLE TRANSLATE OVERRIDES
           ============================================ */
        /* Hide the Google Translate toolbar */
        iframe.goog-te-banner-frame,
        .goog-te-banner-frame,
        #goog-gt-tt,
        .goog-te-balloon-frame,
        div#google_translate_element,
        .goog-te-gadget {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
        }
        /* Keep body from shifting down */
        body {
            top: 0 !important;
            position: static !important;
        }
        html {
            height: auto !important;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
        
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 4px;
        }
        
        /* Hide the tooltip that appears on hover */
        .goog-tooltip {
            display: none !important;
        }
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important; 
            box-shadow: none !important;
        }

        @stack('styles')
    </style>

    @stack('head-scripts')
</head>
<body class="bg-white font-body text-navy-800">
    @include('partials.nav')

    @yield('content')

    @include('partials.footer')

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                const icon = mobileMenuBtn.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-times');
                }
            });
        }

        // Mobile Submenu Toggle
        document.querySelectorAll('.mobile-dropdown-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = btn.parentElement.nextElementSibling;
                const icon = btn.querySelector('i');
                if (submenu) submenu.classList.toggle('hidden');
                if (icon) icon.classList.toggle('rotate-180');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('main-nav');
            if (nav) {
                if (window.scrollY > 50) {
                    nav.classList.add('nav-scrolled');
                } else {
                    nav.classList.remove('nav-scrolled');
                }
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
        
        // Counter animation
        function animateCounters() {
            document.querySelectorAll('.counter').forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000;
                const start = 0;
                const increment = target / (duration / 16);
                
                function updateCounter() {
                    const current = parseInt(counter.innerText);
                    if (current < target) {
                        counter.innerText = Math.ceil(current + increment);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target.toLocaleString();
                        if (target >= 100 && target < 1000) counter.innerText = target + '%';
                    }
                }
                updateCounter();
            });
        }
        
        // Intersection Observer for counter
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    counterObserver.disconnect();
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.getElementById('stats-section');
        if (statsSection) counterObserver.observe(statsSection);

    </script>
    
    <!-- Hidden Google Translate Element -->
    <div id="google_translate_element" style="position: absolute; left: -9999px; top: -9999px; width: 0; height: 0; overflow: hidden; opacity: 0;"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            // We initialize with a specific subset of languages to optimize performance
            new google.translate.TranslateElement({
                pageLanguage: 'en', 
                includedLanguages: 'en,ms,zh-CN,es,fr,de,ar,ja',
                autoDisplay: false
            }, 'google_translate_element');
        }

        // Forcefully remove Google Translate UI elements from the DOM just to be sure
        setInterval(function() {
            document.querySelectorAll('.goog-te-banner-frame, .skiptranslate > iframe, #goog-gt-tt').forEach(el => el.remove());
            document.body.style.top = '0px';
        }, 1000);

        function doGTranslate(lang_pair) {
            if(lang_pair == '') return;
            var lang = lang_pair.split('|')[1];
            
            var teCombo;
            var sel = document.getElementsByTagName('select');
            for (var i = 0; i < sel.length; i++) {
                if (sel[i].className.indexOf('goog-te-combo') != -1) {
                    teCombo = sel[i];
                    break;
                }
            }
            if (!teCombo || document.getElementById('google_translate_element') == null || document.getElementById('google_translate_element').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                setTimeout(function() {
                    doGTranslate(lang_pair)
                }, 500);
            } else {
                teCombo.value = lang;
                if (typeof Event === 'function') {
                    teCombo.dispatchEvent(new Event('change', { bubbles: true }));
                } else if (document.createEvent) {
                    var event = document.createEvent('HTMLEvents');
                    event.initEvent('change', true, true);
                    teCombo.dispatchEvent(event);
                } else {
                    teCombo.fireEvent('onchange');
                }
                
                // Close mobile menu if it's open
                var mobileMenu = document.getElementById('mobile-menu');
                var mobileMenuBtn = document.getElementById('mobile-menu-btn');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    if (mobileMenuBtn) {
                        var icon = mobileMenuBtn.querySelector('i');
                        if (icon) {
                            icon.classList.add('fa-bars');
                            icon.classList.remove('fa-times');
                        }
                    }
                }
            }
        }
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    @stack('scripts')
</body>
</html>
