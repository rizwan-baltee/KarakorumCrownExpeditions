<!-- Footer -->
<footer class="bg-navy-950 text-white pt-20 pb-8">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
            <!-- Column 1 - Brand & Description -->
            <div class="lg:col-span-1">
                <div class="mb-6">
                    <img src="{{ asset('assets/karakorum-logo.png') }}" alt="Karakorum Crown Expeditions" class="h-14 mb-4 rounded-lg">
                    <h3 class="text-xl font-display font-semibold tracking-wide">Karakorum Crown Expeditions</h3>
                    <p class="text-white/40 text-xs tracking-[0.15em] uppercase mt-1">Premium Treks & Tours</p>
                </div>
                <p class="text-white/50 text-sm leading-relaxed mb-6">
                    Pakistan's trusted partner for premium adventure travel in Gilgit-Baltistan. Licensed, certified, and committed to delivering world-class mountain experiences since 2016.
                </p>
                <div class="flex gap-3">
                    <a href="#" class="w-10 h-10 bg-white/5 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-all duration-300 border border-white/10 hover:border-brand-500">
                        <i class="fab fa-facebook-f text-white/60 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/5 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-all duration-300 border border-white/10 hover:border-brand-500">
                        <i class="fab fa-instagram text-white/60 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/5 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-all duration-300 border border-white/10 hover:border-brand-500">
                        <i class="fab fa-youtube text-white/60 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/5 hover:bg-brand-600 rounded-lg flex items-center justify-center transition-all duration-300 border border-white/10 hover:border-brand-500">
                        <i class="fab fa-whatsapp text-white/60 hover:text-white text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2 - Quick Links -->
            <div>
                <h4 class="text-white font-semibold text-sm tracking-wider uppercase mb-6 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-brand-500"></span> Quick Links
                </h4>
                <ul class="space-y-3">
                    <li><a href="/" class="text-white/50 hover:text-brand-400 transition-colors text-sm">Home</a></li>
                    <li><a href="/about-us" class="text-white/50 hover:text-brand-400 transition-colors text-sm">About Us</a></li>
                    <li><a href="/how-to-apply" class="text-white/50 hover:text-brand-400 transition-colors text-sm">Visa Guide</a></li>
                    <li><a href="#" class="text-white/50 hover:text-brand-400 transition-colors text-sm">Privacy Policy</a></li>
                    <li><a href="#" class="text-white/50 hover:text-brand-400 transition-colors text-sm">Terms & Conditions</a></li>
                    <li><a href="#" class="text-white/50 hover:text-brand-400 transition-colors text-sm">Cancellation Policy</a></li>
                </ul>
            </div>

            <!-- Column 3 - Popular Treks (Dynamic) -->
            <div>
                <h4 class="text-white font-semibold text-sm tracking-wider uppercase mb-6 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-brand-500"></span> Popular Treks
                </h4>
                <ul class="space-y-3">
                    @forelse($footerTrendingTreks as $footerTrek)
                    <li><a href="{{ route('trek.show', $footerTrek->slug) }}" class="text-white/50 hover:text-brand-400 transition-colors text-sm">{{ $footerTrek->title }}</a></li>
                    @empty
                    <li class="text-white/30 text-sm">Tours coming soon</li>
                    @endforelse
                </ul>
            </div>

            <!-- Column 4 - Contact -->
            <div>
                <h4 class="text-white font-semibold text-sm tracking-wider uppercase mb-6 flex items-center gap-2">
                    <span class="w-8 h-0.5 bg-brand-500"></span> Contact
                </h4>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-brand-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-map-marker-alt text-brand-400 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-white/50 text-sm">Jamia Mosque Road,<br>near Doctor Hospital, Skardu</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-brand-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-phone-alt text-brand-400 text-xs"></i>
                        </div>
                        <div>
                            <a href="tel:+923131562859" class="text-white/50 hover:text-brand-400 transition-colors text-sm block">+92 313 1562859</a>
                            <a href="tel:+923358411291" class="text-white/50 hover:text-brand-400 transition-colors text-sm block">+92 335 8411291</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-brand-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-envelope text-brand-400 text-xs"></i>
                        </div>
                        <div>
                            <a href="mailto:info@discoverghanche.com" class="text-white/50 hover:text-brand-400 transition-colors text-sm block break-all">info@discoverghanche.com</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 bg-brand-600/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                            <i class="fas fa-clock text-brand-400 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-white/50 text-sm">24/7 Emergency Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Badges -->
        <div class="border-t border-white/10 pt-10 mb-10">
            <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                <div class="text-center">
                    <div class="text-white font-bold text-sm tracking-wider">PATO</div>
                    <p class="text-white/30 text-[10px] uppercase tracking-wider mt-0.5">Certified Member</p>
                </div>
                <div class="w-px h-8 bg-white/10 hidden md:block"></div>
                <div class="text-center">
                    <div class="text-white font-bold text-sm tracking-wider">License #2332</div>
                    <p class="text-white/30 text-[10px] uppercase tracking-wider mt-0.5">Govt. Authorized</p>
                </div>
                <div class="w-px h-8 bg-white/10 hidden md:block"></div>
                <div class="text-center">
                    <div class="text-white font-bold text-sm tracking-wider">NADRA</div>
                    <p class="text-white/30 text-[10px] uppercase tracking-wider mt-0.5">Verified Operator</p>
                </div>
                <div class="w-px h-8 bg-white/10 hidden md:block"></div>
                <div class="text-center">
                    <div class="text-white font-bold text-sm tracking-wider">100%</div>
                    <p class="text-white/30 text-[10px] uppercase tracking-wider mt-0.5">Safety Record</p>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/30 text-xs">
                    &copy; {{ date('Y') }} Karakorum Crown Expeditions. All rights reserved. Licensed Tour Operator, Gilgit-Baltistan, Pakistan.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-white/30 hover:text-white/60 transition-colors text-xs">Privacy Policy</a>
                    <span class="text-white/10">|</span>
                    <a href="#" class="text-white/30 hover:text-white/60 transition-colors text-xs">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/923131562859" target="_blank" class="fixed bottom-6 right-6 bg-[#25D366] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 z-50 group" aria-label="Chat on WhatsApp">
    <i class="fab fa-whatsapp text-2xl"></i>
    <span class="absolute right-16 bg-navy-900 text-white text-xs px-3 py-2 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap font-medium shadow-xl">
        Chat with us
    </span>
</a>
