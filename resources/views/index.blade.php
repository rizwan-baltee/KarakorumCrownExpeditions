@extends('layouts.app')

@section('title', 'Peokora Travel - Discover Pakistan\'s Wild Beauty')

@push('styles')
    .carousel-item {
        display: none;
    }
    
    .carousel-item.active {
        display: block;
    }
    
    .hero-overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5));
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
    }
    
    .feature-card {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .trek-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .trek-card:hover {
        transform: scale(1.05);
    }
    
    .trek-card img {
        transition: transform 0.5s ease;
    }
    
    .trek-card:hover img {
        transform: scale(1.1);
    }
    
    /* Owl Carousel Custom Styles */
    .owl-carousel .owl-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 16px;
    }
    
    .treks-carousel {
        position: relative;
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
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: white !important;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex !important;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        transition: all 0.3s ease;
        pointer-events: all;
        position: absolute !important;
    }
    
    .owl-theme .owl-nav .owl-prev {
        top: -43px;
        left: -25px;
    }
    
    .owl-theme .owl-nav .owl-next {
        top: -43px;
        right: -25px;
    }
    
    .owl-theme .owl-nav [class*='owl-']:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
    }
    
    .owl-theme .owl-dots .owl-dot span {
        background: #d1d5db !important;
        width: 12px;
        height: 12px;
    }
    
    .owl-theme .owl-dots .owl-dot.active span {
        background: #10b981 !important;
        width: 30px;
        border-radius: 6px;
    }
    
    .trek-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        padding: 6px 16px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        border-radius: 6px;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }
    
    .trek-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        padding: 30px 20px 20px;
        color: white;
        border-radius: 0 0 16px 16px;
    }
@endpush

@section('content')
    

    <!-- Hero Carousel Section -->
    <section class="relative h-screen overflow-hidden">
        <div class="carousel relative h-full">
            <!-- Slide 1 -->
            <div class="carousel-item active h-full relative">
                <img src="assets/Front-banner-k2.webp" alt="K2 Mountain" class="w-full h-full object-cover">
                <div class="hero-overlay absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-5xl md:text-7xl font-bold mb-4 animate-fade-in">Travel With Peokora Travel</h1>
                        <p class="text-xl md:text-2xl mb-8">Discover Pakistan's Wild Beauty With Trusted Local Experts</p>
                        <a href="#book" class="btn-primary inline-block px-8 py-4 text-lg font-semibold rounded-full text-white">
                            Plan Your Adventure
                        </a>
                    </div>
                </div>
            </div>
x
            <!-- Slide 2 -->
            <div class="carousel-item h-full relative">
                <img src="assets/K2-&-Concordia.webp" alt="K2 & Concordia" class="w-full h-full object-cover">
                <div class="hero-overlay absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-5xl md:text-7xl font-bold mb-4">K2 & Concordia Trek</h1>
                        <p class="text-xl md:text-2xl mb-8">Experience the World's Most Spectacular Mountain Views</p>
                        <a href="#book" class="btn-primary inline-block px-8 py-4 text-lg font-semibold rounded-full text-white">
                            Explore Treks
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item h-full relative">
                <img src="assets/shangrila-resort.webp" alt="Shangrila Resort" class="w-full h-full object-cover">
                <div class="hero-overlay absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white px-4">
                        <h1 class="text-5xl md:text-7xl font-bold mb-4">Luxury Mountain Resorts</h1>
                        <p class="text-xl md:text-2xl mb-8">Relax in Paradise After Your Adventure</p>
                        <a href="#book" class="btn-primary inline-block px-8 py-4 text-lg font-semibold rounded-full text-white">
                            Book Your Stay
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button id="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-4 rounded-full backdrop-blur-sm transition">
                <i class="fas fa-chevron-left text-2xl"></i>
            </button>
            <button id="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-4 rounded-full backdrop-blur-sm transition">
                <i class="fas fa-chevron-right text-2xl"></i>
            </button>

            <!-- Carousel Indicators -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-3">
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition" data-slide="0"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition" data-slide="1"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white transition" data-slide="2"></button>
            </div>
        </div>

        <!-- Booking Search Bar -->
        <div class="absolute bottom-0 left-0 right-0 pb-8 px-4 hidden md:block">
            <div class="container mx-auto max-w-6xl">
                <div class="bg-white rounded-2xl shadow-2xl p-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-gray-600 mb-2 text-sm"><i class="fas fa-map-marker-alt text-emerald-600 mr-2"></i>Location</label>
                        <input type="text" placeholder="Where to?" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-2 text-sm"><i class="fas fa-hiking text-emerald-600 mr-2"></i>Booking Type</label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                            <option>Trek</option>
                            <option>Expedition</option>
                            <option>Tour</option>
                            <option>Rock Climbing</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-2 text-sm"><i class="fas fa-calendar text-emerald-600 mr-2"></i>Date</label>
                        <input type="date" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-600 mb-2 text-sm"><i class="fas fa-users text-emerald-600 mr-2"></i>Persons</label>
                        <input type="number" placeholder="0" value="1" min="1" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    </div>
                    <div class="md:col-span-4">
                        <button class="w-full btn-primary py-4 rounded-lg text-white font-semibold text-lg">
                            <i class="fas fa-search mr-2"></i> Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Counter Section -->
    <section class="py-16 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 border-t-4 border-emerald-500">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-full mb-4 shadow-lg">
                        <i class="fas fa-mountain text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 counter" data-target="500">0</div>
                    <div class="text-gray-400 text-sm md:text-base font-medium uppercase tracking-wider">Successful Treks</div>
                </div>
                
                <!-- Stat 2 -->
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full mb-4 shadow-lg">
                        <i class="fas fa-users text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 counter" data-target="1200">0</div>
                    <div class="text-gray-400 text-sm md:text-base font-medium uppercase tracking-wider">Happy Travelers</div>
                </div>
                
                <!-- Stat 3 -->
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full mb-4 shadow-lg">
                        <i class="fas fa-trophy text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 counter" data-target="8">0</div>
                    <div class="text-gray-400 text-sm md:text-base font-medium uppercase tracking-wider">Years Experience</div>
                </div>
                
                <!-- Stat 4 -->
                <div class="text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full mb-4 shadow-lg">
                        <i class="fas fa-certificate text-white text-3xl"></i>
                    </div>
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 counter" data-target="100">0</div>
                    <div class="text-gray-400 text-sm md:text-base font-medium uppercase tracking-wider">Safety Rate %</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Badges & Certifications Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Licensed & Certified Tour Operator</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Your safety is our priority. We are officially registered and certified by Pakistan's tourism authorities.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <!-- Badge 1 - PATO -->
                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105" data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-md">
                            <div class="text-emerald-600 font-bold text-2xl">PATO</div>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-2">Certified Member</h4>
                        <p class="text-xs text-gray-600">Pakistan Association of Tour Operators</p>
                    </div>
                </div>
                
                <!-- Badge 2 - License -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105" data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-md">
                            <i class="fas fa-id-card text-blue-600 text-4xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-2">License #2332</h4>
                        <p class="text-xs text-gray-600">Govt. Authorized Tour Operator</p>
                    </div>
                </div>
                
                <!-- Badge 3 - NADRA -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105" data-aos="zoom-in" data-aos-delay="300">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-md">
                            <div class="text-purple-600 font-bold text-xl">NADRA</div>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-2">Verified</h4>
                        <p class="text-xs text-gray-600">National Database Registered</p>
                    </div>
                </div>
                
                <!-- Badge 4 - Safety -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105" data-aos="zoom-in" data-aos-delay="400">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-white rounded-full mx-auto mb-4 flex items-center justify-center shadow-md">
                            <i class="fas fa-shield-alt text-orange-600 text-4xl"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-2">Safety First</h4>
                        <p class="text-xs text-gray-600">100% Safety Standards</p>
                    </div>
                </div>
            </div>
            
            <!-- Additional Trust Elements -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-sm">Emergency Support</h5>
                        <p class="text-xs text-gray-600">24/7 Assistance Available</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-sm">Transparent Pricing</h5>
                        <p class="text-xs text-gray-600">No Hidden Charges</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-4 bg-gray-50 rounded-xl p-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-3xl text-green-600"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-sm">Flexible Cancellation</h5>
                        <p class="text-xs text-gray-600">Fair Refund Policy</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Treks Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 text-white inline-block px-12 py-4 rounded-2xl shadow-2xl mb-4">
                    Popular Treks in Pakistan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mt-6">Explore the most breathtaking trekking routes in the heart of the Himalayas and Karakoram</p>
            </div>

            <!-- Owl Carousel -->
            <div class="owl-carousel owl-theme treks-carousel" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <!-- Trek 1 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/Front-banner-k2.webp" alt="Four 8000m Base Camp trek">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">Four 8000m Base Camp trek</h3>
                            <p class="text-gray-300 text-sm mb-3">Experience four of the world's highest peaks in one epic journey</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>18-21 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Difficult</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek 2 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/K2-&-Concordia.webp" alt="K2 Base camp trek">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">K2 Base camp trek</h3>
                            <p class="text-gray-300 text-sm mb-3">Journey to the base of the world's second highest mountain</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>12-15 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Challenging</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek 3 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/K2-&-Concordia.webp" alt="K2 Base camp Gondogoro la trek">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">K2 Base camp Gondogoro la trek</h3>
                            <p class="text-gray-300 text-sm mb-3">Ultimate adventure combining K2 Base Camp with Gondogoro La Pass</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>14-16 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Expert</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek 4 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/Front-banner-k2.webp" alt="Charakusa k7 Base Camp trek">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">Charakusa k7 Base Camp trek</h3>
                            <p class="text-gray-300 text-sm mb-3">Remote valley trek with stunning granite spires and glaciers</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>10-12 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Moderate</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek 5 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/shangrila-resort.webp" alt="Nanga Parbat Base Camp trek">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">Nanga Parbat Base Camp trek</h3>
                            <p class="text-gray-300 text-sm mb-3">Stunning views of the Killer Mountain's massive Rupal Face</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>8-10 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Moderate</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trek 6 -->
                <div class="item">
                    <div class="relative group cursor-pointer">
                        <img src="assets/K2-&-Concordia.webp" alt="Fairy Meadows">
                        <span class="trek-badge">TREK</span>
                        <div class="trek-overlay">
                            <h3 class="text-2xl font-bold mb-2">Fairy Meadows</h3>
                            <p class="text-gray-300 text-sm mb-3">Paradise on earth with breathtaking views of Nanga Parbat</p>
                            <div class="flex items-center gap-4 text-sm">
                                <span><i class="fas fa-clock mr-2"></i>5-7 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Easy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <a href="#" class="inline-block px-10 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                    View All Treks <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Company Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Side - Images -->
                <div class="relative" data-aos="fade-right" data-aos-duration="1200">
                    <!-- Main Mountain Image -->
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img src="assets/Front-banner-k2.webp" alt="Mountain View" class="w-full h-[500px] object-cover">
                        <!-- Experience Badge -->
                        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 bg-white rounded-2xl shadow-2xl p-6 w-64" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="1000">
                            <div class="flex items-center gap-4">
                                <div class="text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-500 to-blue-500">
                                    8
                                </div>
                                <div>
                                    <div class="text-xl font-bold text-gray-800">Years of</div>
                                    <div class="text-xl font-bold text-gray-800">Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Small Badge Image -->
                    <div class="absolute -bottom-8 -left-8 w-48 h-48 rounded-2xl overflow-hidden shadow-2xl border-8 border-white" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <img src="assets/logo.png" alt="Peokora Travel Badge" class="w-full h-full object-cover bg-white">
                    </div>
                </div>

                <!-- Right Side - Content -->
                <div class="space-y-8">
                    <!-- Section Title -->
                    <div data-aos="fade-left" data-aos-duration="1000">
                        <span class="text-cyan-500 font-bold text-lg uppercase tracking-wide">About Company</span>
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 leading-tight">
                            Great opportunity for adventure & travels
                        </h2>
                    </div>

                    <!-- Features List -->
                    <div class="space-y-6 relative">
                        <!-- Timeline Line -->
                        <div class="absolute left-7 top-10 bottom-10 w-0.5 bg-gradient-to-b from-yellow-400 via-cyan-400 to-cyan-400 hidden md:block" data-aos="fade-down" data-aos-delay="200" data-aos-duration="1500"></div>

                        <!-- Feature 1 -->
                        <div class="flex gap-6 items-start" data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                            <div class="flex-shrink-0 relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300">
                                    <i class="fas fa-route text-white text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1 bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Customized Itineraries:</h3>
                                <p class="text-gray-600">Offer's personalized experiences, allowing you to tailor your trip to match your interests and preferences.</p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex gap-6 items-start" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000">
                            <div class="flex-shrink-0 relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300">
                                    <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1 bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Low price & friendly</h3>
                                <p class="text-gray-600">Affordability meets warmth in our low-price, friendly service.</p>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex gap-6 items-start" data-aos="fade-left" data-aos-delay="600" data-aos-duration="1000">
                            <div class="flex-shrink-0 relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300">
                                    <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1 bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">Native travel guide</h3>
                                <p class="text-gray-600">Embark on a journey rooted in heritage, guided by tradition, and enriched by the stories of our ancestors.</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                        <a href="/about-us" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                            <span>Learn More About Us</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Trekking Price For <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">Private / B2B Groups</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Competitive pricing for individual travelers and group bookings</p>
            </div>

            <!-- Pricing Table -->
            <div class="max-w-6xl mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <!-- Desktop Table -->
                <div class="hidden md:block bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <!-- Table Header -->
                    <div class="grid grid-cols-12 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold text-lg">
                        <div class="col-span-6 px-8 py-5">
                            <i class="fas fa-mountain mr-3"></i>TREKS
                        </div>
                        <div class="col-span-3 px-8 py-5 text-center border-l border-emerald-500/30">
                            <i class="fas fa-dollar-sign mr-2"></i>COST 7-12
                        </div>
                        <div class="col-span-3 px-8 py-5 text-center border-l border-emerald-500/30">
                            <i class="fas fa-info-circle mr-2"></i>MORE INFO
                        </div>
                    </div>

                    <!-- Table Rows -->
                    <div class="divide-y divide-gray-200">
                        <!-- Row 1 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="300">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">K2 Base camp Gondogoro la trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">2,300$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="350">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Charakusa k7 Base Camp trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">2,500$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="400">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Four 8000m Base Camp trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">2,599$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="450">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Nanga Parbat Base Camp trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 5 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="500">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Rakaposhi Base camp trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 6 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="550">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Shimshal pass trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>

                        <!-- Row 7 -->
                        <div class="grid grid-cols-12 items-center hover:bg-emerald-50 transition-all duration-300 group" data-aos="fade-right" data-aos-delay="600">
                            <div class="col-span-6 px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-hiking text-emerald-600 text-xl"></i>
                                    </div>
                                    <span class="text-gray-900 font-semibold text-lg">Nangma Valley trek</span>
                                </div>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <div class="col-span-3 px-8 py-6 text-center">
                                <a href="#" class="inline-block px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105">
                                    More info
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile Cards -->
                <div class="md:hidden space-y-4">
                    <!-- Card 1 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">K2 Base camp Gondogoro la trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">2,300$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="350">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Charakusa k7 Base Camp trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">2,500$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Four 8000m Base Camp trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">2,599$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="450">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Nanga Parbat Base Camp trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Rakaposhi Base camp trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="550">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Shimshal pass trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>

                    <!-- Card 7 -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Nangma Valley trek</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-600">Price (7-12 persons)</span>
                                <span class="text-2xl font-bold text-emerald-600">1,500$</span>
                            </div>
                            <a href="#" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-full hover:from-emerald-700 hover:to-teal-700 transition">
                                More info
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Note -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="700">
                <p class="text-gray-600 text-lg mb-6">Need a custom quote for your group? <span class="font-bold text-emerald-600">Contact us for personalized pricing!</span></p>
                <a href="tel:+923238312244" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                    <i class="fas fa-phone"></i>
                    <span>Get Custom Quote</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Expeditions Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 text-white inline-block px-12 py-4 rounded-2xl shadow-2xl mb-4">
                    Expeditions In Pakistan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto mt-6">Conquer the world's highest peaks with expert guidance and support</p>
            </div>

            <!-- Owl Carousel -->
            <div class="owl-carousel owl-theme expeditions-carousel" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <!-- Expedition 1 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/Front-banner-k2.webp" alt="Gasherbrum-II Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">Gasherbrum-II Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Challenge yourself on the 13th highest mountain in the world at 8,035m</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>8,035m</span>
                                <span><i class="fas fa-calendar mr-2"></i>45-60 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Extreme</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expedition 2 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/K2-&-Concordia.webp" alt="Broad Peak Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">Broad Peak Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Climb the 12th highest peak in the world with stunning panoramic views</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>8,051m</span>
                                <span><i class="fas fa-calendar mr-2"></i>45-60 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Extreme</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expedition 3 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/shangrila-resort.webp" alt="Nanga Parbat Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">Nanga Parbat Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">The Killer Mountain - One of the most dangerous 8000m peaks to climb</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>8,126m</span>
                                <span><i class="fas fa-calendar mr-2"></i>50-65 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Extreme</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expedition 4 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/Front-banner-k2.webp" alt="Gasherbrum-I Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">Gasherbrum-I Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Hidden Peak - The 11th highest mountain offering technical challenges</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>8,080m</span>
                                <span><i class="fas fa-calendar mr-2"></i>45-60 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Extreme</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expedition 5 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/K2-&-Concordia.webp" alt="K2 Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">K2 Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">The Savage Mountain - World's second highest and most dangerous peak</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>8,611m</span>
                                <span><i class="fas fa-calendar mr-2"></i>60-75 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Extreme</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expedition 6 -->
                <div class="item">
                    <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500">
                        <img src="assets/shangrila-resort.webp" alt="Rakaposhi Expedition" class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                        <div class="absolute top-6 left-6">
                            <span class="expedition-badge bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-xs font-bold uppercase rounded-lg shadow-lg">
                                EXPEDITION
                            </span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-8">
                            <h3 class="text-3xl font-bold text-white mb-3 transform group-hover:translate-y-[-8px] transition-transform duration-300">Rakaposhi Expedition</h3>
                            <p class="text-gray-200 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Beautiful 7000m peak with uninterrupted rise from base to summit</p>
                            <div class="flex items-center gap-4 text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span><i class="fas fa-mountain mr-2"></i>7,788m</span>
                                <span><i class="fas fa-calendar mr-2"></i>30-40 days</span>
                                <span><i class="fas fa-signal mr-2"></i>Very Hard</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <a href="#" class="inline-block px-10 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                    View All Expeditions <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Top Hiking Trips Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Top Hiking Trips In Pakistan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover the most scenic and rewarding hiking adventures across Pakistan's mountains</p>
            </div>

            <!-- Hiking Trips Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Trip 1 - Khaney Broq -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/Front-banner-k2.webp" alt="Khaney Broq" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            11 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Khaney Broq</h3>
                    </div>
                </div>

                <!-- Trip 2 - Gondogoro La -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer md:col-span-2" data-aos="fade-up" data-aos-delay="150">
                    <img src="assets/K2-&-Concordia.webp" alt="Gondogoro La" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            20 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Gondogoro La</h3>
                    </div>
                </div>

                <!-- Trip 3 - Charakusa k7 -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/shangrila-resort.webp" alt="Charakusa k7" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            14 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Charakusa k7</h3>
                    </div>
                </div>

                <!-- Trip 4 - Rush Lake -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="250">
                    <img src="assets/Front-banner-k2.webp" alt="Rush Lake" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            13 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Rush Lake</h3>
                    </div>
                </div>

                <!-- Trip 5 - Nangma Valley -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="300">
                    <img src="assets/K2-&-Concordia.webp" alt="Nangma Valley" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            12 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Nangma Valley</h3>
                    </div>
                </div>

                <!-- Trip 6 - Naltar Askomen -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="350">
                    <img src="assets/shangrila-resort.webp" alt="Naltar Askomen" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            16 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Naltar Askomen</h3>
                    </div>
                </div>

                <!-- Trip 7 - Snow Lake -->
                <div class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer" data-aos="fade-up" data-aos-delay="400">
                    <img src="assets/Front-banner-k2.webp" alt="Snow Lake" class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute top-4 right-4">
                        <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                            21 Days
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <p class="text-gray-300 text-sm mb-2">Travel To</p>
                        <h3 class="text-2xl font-bold text-white transform group-hover:translate-y-[-4px] transition-transform duration-300">Snow Lake</h3>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="450">
                <a href="#" class="inline-block px-10 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                    Explore More Hiking Trips <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Customer Testimonials Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wider inline-block mb-4">
                    Testimonials
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    What Our International Travelers Say
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Real experiences from adventurers around the world</p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed mb-6 italic">
                        "An absolutely incredible experience! The guides were professional, knowledgeable, and ensured our safety throughout the K2 Base Camp trek. Worth every penny!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            JM
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">James Miller</h4>
                            <p class="text-sm text-gray-600">USA • K2 Base Camp Trek</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed mb-6 italic">
                        "Peokora Travel made our dream adventure come true! Professional organization, excellent equipment, and amazing local insights. Highly recommended for foreigners!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            SC
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Sophie Chen</h4>
                            <p class="text-sm text-gray-600">Singapore • Fairy Meadows Tour</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex gap-1 mb-4">
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                        <i class="fas fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <p class="text-gray-700 text-base leading-relaxed mb-6 italic">
                        "Outstanding service! Communication was clear, logistics were perfect, and the team went above and beyond. Pakistan's mountains are breathtaking!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            MK
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Michael König</h4>
                            <p class="text-sm text-gray-600">Germany • Hunza Valley Tour</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CEO Message Card -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-emerald-600 to-teal-700 rounded-3xl shadow-2xl p-8 md:p-12 relative overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-32 -mt-32"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-5 rounded-full -ml-24 -mb-24"></div>
                    
                    <div class="relative z-10 grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="inline-block mb-4">
                                <span class="bg-white/20 text-white px-4 py-2 rounded-lg font-semibold text-xs uppercase tracking-wider">
                                    From Our CEO
                                </span>
                            </div>
                            <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">
                                Your Safety & Satisfaction is Our Promise
                            </h3>
                            <p class="text-white/90 text-lg leading-relaxed">
                                "We're committed to providing world-class adventure experiences with the highest safety standards. Every member of our team is trained, certified, and passionate about sharing Pakistan's beauty with the world."
                            </p>
                            <div class="mt-6 flex items-center gap-4">
                                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-tie text-white text-2xl"></i>
                                </div>
                                <div class="text-white">
                                    <h4 class="font-bold text-lg">CEO, Peokora Travel</h4>
                                    <p class="text-white/80 text-sm">Founder & Lead Expedition Guide</p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center justify-center">
                            <div class="relative">
                                <div class="w-64 h-64 bg-white/10 rounded-full animate-pulse"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fas fa-quote-right text-white/30 text-9xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Expert Team Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wider inline-block mb-4">
                    Our Team
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Meet Your Expert Guides
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Experienced, certified, and passionate about mountain adventures</p>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="group" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg mb-4">
                        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 aspect-square flex items-center justify-center">
                            <i class="fas fa-user text-white text-6xl opacity-80"></i>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-white text-sm">Lead guide with 8+ years experience in high-altitude expeditions</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Senior Expedition Guide</h4>
                    <p class="text-emerald-600 font-semibold mb-2">IFMGA Certified</p>
                    <p class="text-gray-600 text-sm">K2, Broad Peak, Nanga Parbat Expert</p>
                </div>

                <!-- Team Member 2 -->
                <div class="group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg mb-4">
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-600 aspect-square flex items-center justify-center">
                            <i class="fas fa-user text-white text-6xl opacity-80"></i>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-white text-sm">Specialized in trekking safety and emergency response</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Trekking Guide</h4>
                    <p class="text-blue-600 font-semibold mb-2">Wilderness First Responder</p>
                    <p class="text-gray-600 text-sm">Karakoram & Himalaya Specialist</p>
                </div>

                <!-- Team Member 3 -->
                <div class="group" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg mb-4">
                        <div class="bg-gradient-to-br from-purple-500 to-pink-600 aspect-square flex items-center justify-center">
                            <i class="fas fa-user text-white text-6xl opacity-80"></i>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-white text-sm">Expert in cultural tours and historical site visits</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Cultural Tour Guide</h4>
                    <p class="text-purple-600 font-semibold mb-2">Licensed Tour Guide</p>
                    <p class="text-gray-600 text-sm">Hunza Valley & Baltistan Expert</p>
                </div>

                <!-- Team Member 4 -->
                <div class="group" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg mb-4">
                        <div class="bg-gradient-to-br from-orange-500 to-red-600 aspect-square flex items-center justify-center">
                            <i class="fas fa-user text-white text-6xl opacity-80"></i>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                            <p class="text-white text-sm">Ensures seamless logistics and customer satisfaction</p>
                        </div>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-1">Operations Manager</h4>
                    <p class="text-orange-600 font-semibold mb-2">Tour Operations Expert</p>
                    <p class="text-gray-600 text-sm">Trip Planning & Coordination</p>
                </div>
            </div>

            <!-- Team Credentials -->
            <div class="mt-16 max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="500">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 md:p-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Our Team's Qualifications</h3>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Certified Guides</h4>
                                <p class="text-gray-600 text-sm">IFMGA, WFR, and local mountaineering certifications</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-language text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Multilingual</h4>
                                <p class="text-gray-600 text-sm">Fluent in English, Urdu, and local languages</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-heartbeat text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-2">Medical Training</h4>
                                <p class="text-gray-600 text-sm">First aid and altitude sickness management certified</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Safety & Security Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wider inline-block mb-4">
                    Safety First
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    Your Safety is Our Priority
                </h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">Comprehensive safety measures and emergency protocols for every adventure</p>
            </div>

            <!-- Safety Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- Safety Item 1 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-first-aid text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Medical Equipment</h3>
                    <p class="text-gray-400">Comprehensive first aid kits, oxygen cylinders, and altitude medication on every trek. Guides trained in wilderness medicine.</p>
                </div>

                <!-- Safety Item 2 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-satellite-dish text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Communication</h3>
                    <p class="text-gray-400">Satellite phones and GPS devices for constant communication with base camp and emergency services.</p>
                </div>

                <!-- Safety Item 3 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-helicopter text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Emergency Evacuation</h3>
                    <p class="text-gray-400">24/7 helicopter rescue coordination with local authorities. Insurance coverage assistance for medical emergencies.</p>
                </div>

                <!-- Safety Item 4 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-mountain text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Weather Monitoring</h3>
                    <p class="text-gray-400">Real-time weather updates and route adjustments. Safety decisions made by experienced guides, never rush schedules.</p>
                </div>

                <!-- Safety Item 5 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Quality Equipment</h3>
                    <p class="text-gray-400">High-grade mountaineering gear regularly inspected and maintained. Backup equipment available for all critical items.</p>
                </div>

                <!-- Safety Item 6 -->
                <div class="bg-gray-800/50 backdrop-blur rounded-2xl p-8 border border-gray-700 hover:border-emerald-500 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Travel Insurance</h3>
                    <p class="text-gray-400">We strongly recommend comprehensive travel insurance. We can guide you to suitable providers for mountaineering coverage.</p>
                </div>
            </div>

            <!-- Emergency Protocol -->
            <div class="max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-gradient-to-br from-red-600/20 to-orange-600/20 border-2 border-red-500/50 rounded-2xl p-8 md:p-12">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-white text-3xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">Emergency Contact 24/7</h3>
                            <p class="text-gray-300 text-lg mb-6">In case of emergency during your trek, our team is available around the clock. We maintain direct contact with rescue services, hospitals, and local authorities.</p>
                            <div class="flex flex-wrap gap-4">
                                <a href="tel:+923238312244" class="inline-flex items-center gap-3 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                                    <i class="fas fa-phone-alt"></i>
                                    +92 323 8312244
                                </a>
                                <a href="tel:+923358411291" class="inline-flex items-center gap-3 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                                    <i class="fas fa-phone-alt"></i>
                                    +92 335 8411291
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Blog Section -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Amazing News & Blog For<br>Every Single Update
                </h2>
            </div>

            <!-- Blog Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 - Diran Peak -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative overflow-hidden">
                        <img src="assets/Front-banner-k2.webp" alt="Diran Peak expedition" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                50 Days
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-yellow-400 text-gray-900 px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                Expedition
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-gray-500 text-sm mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user-circle text-emerald-600"></i> Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-comments text-emerald-600"></i> Comments
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                            Diran Peak expedition
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Diran Peak, at a height of 7,266m from sea level, is located in the Karakoram Range in the Gilgit-Baltistan region of Pakistan...
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-3 transition-all">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2 - Fairy Meadow Tour -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative overflow-hidden">
                        <img src="assets/K2-&-Concordia.webp" alt="Fairy meadow Tour" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                15 Days
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-yellow-400 text-gray-900 px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                Tour
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-gray-500 text-sm mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user-circle text-emerald-600"></i> Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-comments text-emerald-600"></i> Comments
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                            Fairy meadow Tour
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Fairy Meadows, standing at an altitude of 3300 meters from the sea level, is nestled among the mighty Himalayas in northern Pakistan...
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-3 transition-all">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3 - K2 Expedition -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative overflow-hidden">
                        <img src="assets/shangrila-resort.webp" alt="K2 Expedition" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                49 Days
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-yellow-400 text-gray-900 px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                Expedition
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-gray-500 text-sm mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user-circle text-emerald-600"></i> Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-comments text-emerald-600"></i> Comments
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                            K2 Expedition
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            K2 or Mount Godwin-Austen, also known as Chogho Ree among the locals and Savage Mountain among climbers, is the second highest mountain...
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-3 transition-all">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 4 - Kolpin Peak Expedition -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="relative overflow-hidden">
                        <img src="assets/Front-banner-k2.webp" alt="Kolpin peak Expedition" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                30 Days
                            </span>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-yellow-400 text-gray-900 px-4 py-2 text-sm font-bold rounded-lg shadow-lg">
                                Expedition
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-gray-500 text-sm mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user-circle text-emerald-600"></i> Admin
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fas fa-comments text-emerald-600"></i> Comments
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                            Kolpin peak Expedition
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            Kolpin Peak is Located in the Karakoram Mountain Ranges in the Region of Gilgit Baltistan, Pakistan. The altitude of Kolpin Peak is 6,040...
                        </p>
                        <a href="#" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-3 transition-all">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Banner -->
    <div class="bg-gray-900 py-6 overflow-hidden">
        <div class="support-scroll flex items-center gap-8 whitespace-nowrap">
            <div class="flex items-center gap-4 text-white text-xl font-medium">
                Need any support for tour & travels ?
                <span class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full">
                    <i class="fas fa-phone-alt text-white"></i>
                </span>
            </div>
            <div class="flex items-center gap-4 text-white text-xl font-medium">
                Need any support for tour & travels ?
                <span class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full">
                    <i class="fas fa-phone-alt text-white"></i>
                </span>
            </div>
            <div class="flex items-center gap-4 text-white text-xl font-medium">
                Need any support for tour & travels ?
                <span class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full">
                    <i class="fas fa-phone-alt text-white"></i>
                </span>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <span class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-full font-semibold text-sm uppercase tracking-wider inline-block mb-4">
                    FAQ
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Frequently Asked Questions
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Everything you need to know about booking your adventure with us</p>
            </div>

            <!-- FAQ Grid -->
            <div class="max-w-4xl mx-auto space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">Do you provide visa assistance for foreign travelers?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">Yes! We provide complete visa guidance and can issue official invitation letters required for Pakistan tourist visas. We'll guide you through the entire visa application process and answer all your questions. Check our "How to Apply (Visa)" page for detailed information.</p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">What is included in the trek price?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed mb-3">Our comprehensive packages include:</p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>All ground transportation from Islamabad</li>
                            <li>Experienced licensed guides and porters</li>
                            <li>All meals during the trek (breakfast, lunch, dinner)</li>
                            <li>Camping equipment and tents</li>
                            <li>Permits and park entry fees</li>
                            <li>Emergency medical equipment</li>
                            <li>Accommodation in hotels before/after trek</li>
                        </ul>
                        <p class="text-gray-600 mt-3"><strong>Not included:</strong> International flights, travel insurance, personal gear, tips for guides/porters.</p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">What is your cancellation and refund policy?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <div class="text-gray-600 leading-relaxed">
                            <p class="mb-3">We understand plans can change. Our cancellation policy is:</p>
                            <ul class="list-disc list-inside space-y-2">
                                <li><strong>60+ days before:</strong> Full refund minus 10% admin fee</li>
                                <li><strong>30-59 days before:</strong> 50% refund</li>
                                <li><strong>Less than 30 days:</strong> No refund, but you can transfer to another trek</li>
                            </ul>
                            <p class="mt-3">Cancellations due to political instability or natural disasters are fully refundable or can be rescheduled.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">Is it safe for solo female travelers?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">Absolutely! We have successfully organized treks for many solo female travelers from around the world. Our professional team ensures your safety and comfort at all times. We can arrange female guides upon request, and our group treks often have other female travelers you can connect with.</p>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="500">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">What level of fitness is required for K2 Base Camp trek?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">K2 Base Camp trek is considered challenging and requires good physical fitness. We recommend: regular cardio exercise (hiking, running) for 3-4 months before the trek, ability to walk 6-7 hours daily with a daypack, and previous high-altitude trekking experience is beneficial but not mandatory. Consult your doctor before booking any high-altitude trek.</p>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="600">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">How do I communicate during the trek?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">While most trek routes don't have mobile coverage, our guides carry satellite phones for emergency communication. We also provide regular updates to your emergency contacts. In towns and villages before/after treks, you'll find WiFi and mobile connectivity. We recommend informing family/friends about the communication limitations beforehand.</p>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="700">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">What about travel insurance?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">Comprehensive travel insurance is <strong>mandatory</strong> for all our treks. Your insurance must cover: Emergency medical treatment and evacuation, Trip cancellation/interruption, Lost or stolen gear/baggage, and High-altitude trekking up to 6,000m+. We recommend World Nomads or similar providers specializing in adventure travel. We can provide guidance on suitable insurance options.</p>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="800">
                    <button class="faq-button w-full text-left px-8 py-6 flex justify-between items-center gap-4 hover:bg-emerald-50 transition-colors group">
                        <span class="text-lg font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">Can I customize my trek itinerary?</span>
                        <i class="fas fa-chevron-down text-emerald-600 text-xl transition-transform"></i>
                    </button>
                    <div class="faq-content hidden px-8 pb-6">
                        <p class="text-gray-600 leading-relaxed">Yes! We specialize in customized private treks. Whether you want to add extra acclimatization days, visit specific locations, adjust the trek difficulty, or create a completely unique itinerary, we're here to help. Contact us with your preferences, and we'll design a personalized trek that matches your goals, fitness level, and budget.</p>
                    </div>
                </div>
            </div>

            <!-- Contact CTA -->
            <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="900">
                <p class="text-gray-600 text-lg mb-6">Still have questions?</p>
                <a href="https://wa.me/923238312244" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-full hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-2xl transform hover:scale-105">
                    <i class="fab fa-whatsapp text-2xl"></i>
                    <span>Chat with us on WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Gilgit-Baltistan AI Chatbot Widget -->
    <div id="gb-chatbot" class="fixed bottom-6 right-6 z-50 flex flex-col items-end">
        <!-- Chat Window (Hidden by default) -->
        <div id="chat-window" class="hidden mb-4 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden flex-col transition-all duration-300 transform origin-bottom-right scale-0 opacity-0">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 p-4 text-white flex justify-between items-center shadow-md">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-robot text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold">Gilgit Expert AI</h4>
                        <p class="text-xs text-emerald-100">Powered by OpenCode.ai</p>
                    </div>
                </div>
                <button id="close-chat" class="text-white hover:text-emerald-200 transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Chat Area -->
            <div id="chat-messages" class="p-4 h-80 overflow-y-auto bg-gray-50 flex flex-col gap-3 scroll-smooth">
                <!-- Bot Welcome Message -->
                <div class="flex gap-3 max-w-[85%]">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0 flex items-center justify-center mt-1 shadow-sm">
                        <i class="fas fa-robot text-emerald-600 text-sm"></i>
                    </div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-sm shadow-sm text-sm text-gray-700 border border-gray-100">
                        Hello! Welcome to Peokora Travel. I'm your Gilgit-Baltistan AI assistant. Ask me anything about K2, Hunza, NOCs, weather, or tours!
                    </div>
                </div>
                
                <!-- Quick Prompts - Placed here correctly -->
                <div class="flex flex-wrap gap-2 mt-2" id="quick-prompts">
                    <button class="quick-question-btn text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full hover:bg-emerald-100 transition shadow-sm">Do I need a visa?</button>
                    <button class="quick-question-btn text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full hover:bg-emerald-100 transition shadow-sm">Best time to visit K2?</button>
                    <button class="quick-question-btn text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full hover:bg-emerald-100 transition shadow-sm">Is Gilgit safe?</button>
                </div>
            </div>

            <!-- Input Area -->
            <div class="bg-white p-3 border-t flex items-center gap-2">
                <input type="text" id="chat-input" class="w-full bg-gray-100 border border-transparent rounded-full px-4 py-2 text-sm focus:border-emerald-500 focus:bg-white focus:ring-0 focus:outline-none transition-all" placeholder="Type your question...">
                <button id="send-chat" class="w-10 h-10 bg-emerald-600 text-white rounded-full flex items-center justify-center hover:bg-emerald-700 transition flex-shrink-0 shadow-md transform hover:scale-105">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>

        <!-- Toggle Button -->
        <button id="toggle-chat" class="w-14 h-14 md:w-16 md:h-16 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform duration-300 relative group z-50">
            <i class="fas fa-comment-dots text-2xl md:text-3xl"></i>
            <!-- Notification Dot -->
            <span class="absolute top-0 right-0 w-3 h-3 md:w-4 md:h-4 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
            <span class="absolute -top-12 right-0 bg-gray-900 text-white text-xs px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                Chat with AI!
            </span>
        </button>
    </div>

@endsection

@push('scripts')
    <script>
        // --- AI Chatbot Script ---
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.getElementById('toggle-chat');
            const closeBtn = document.getElementById('close-chat');
            const chatWindow = document.getElementById('chat-window');
            const chatMessages = document.getElementById('chat-messages');
            const chatInput = document.getElementById('chat-input');
            const sendBtn = document.getElementById('send-chat');
            const quickBtns = document.querySelectorAll('.quick-question-btn');
            const quickPromptsDiv = document.getElementById('quick-prompts');
            let chatOpen = false;

            function toggleChat() {
                chatOpen = !chatOpen;
                if(chatOpen) {
                    chatWindow.classList.remove('hidden');
                    // Small delay to allow display block to apply before animating opacity/transform
                    setTimeout(() => {
                        chatWindow.classList.remove('scale-0', 'opacity-0');
                        chatWindow.classList.add('scale-100', 'opacity-100');
                        chatInput.focus();
                    }, 10);
                } else {
                    chatWindow.classList.remove('scale-100', 'opacity-100');
                    chatWindow.classList.add('scale-0', 'opacity-0');
                    setTimeout(() => {
                        chatWindow.classList.add('hidden');
                    }, 300);
                }
            }

            toggleBtn.addEventListener('click', toggleChat);
            closeBtn.addEventListener('click', toggleChat);

            function addMessage(text, sender = 'user') {
                const wrapper = document.createElement('div');
                wrapper.className = `flex gap-3 max-w-[85%] ${sender === 'user' ? 'ml-auto flex-row-reverse' : ''} mb-3`;
                
                const iconHTML = sender === 'user' 
                    ? `<div class="w-8 h-8 rounded-full bg-teal-100 flex-shrink-0 flex items-center justify-center mt-1 shadow-sm"><i class="fas fa-user text-teal-600 text-sm"></i></div>`
                    : `<div class="w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0 flex items-center justify-center mt-1 shadow-sm"><i class="fas fa-robot text-emerald-600 text-sm"></i></div>`;
                
                const msgClass = sender === 'user' 
                    ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white p-3 rounded-2xl rounded-tr-sm shadow-md text-sm'
                    : 'bg-white p-3 rounded-2xl rounded-tl-sm shadow-sm text-sm text-gray-700 border border-gray-100';

                wrapper.innerHTML = `
                    ${iconHTML}
                    <div class="${msgClass}">${text}</div>
                `;
                
                chatMessages.insertBefore(wrapper, quickPromptsDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            async function botReply(userMsg) {
                // Typing indicator
                const typingWrapper = document.createElement('div');
                typingWrapper.id = 'typing-indicator';
                typingWrapper.className = 'flex gap-3 max-w-[85%] mb-3';
                typingWrapper.innerHTML = `
                    <div class="w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0 flex items-center justify-center mt-1 shadow-sm">
                        <i class="fas fa-robot text-emerald-600 text-sm"></i>
                    </div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-sm shadow-sm text-sm text-gray-500 italic border border-gray-100 flex gap-1 items-center">
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                    </div>
                `;
                chatMessages.insertBefore(typingWrapper, quickPromptsDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                try {
                    const response = await fetch('/chatbot/ask', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: userMsg })
                    });

                    let data = null;
                    try {
                        data = await response.json();
                    } catch (parseError) {
                        data = null;
                    }

                    if (!response.ok) {
                        throw new Error(data && data.reply ? data.reply : 'Request failed');
                    }

                    const indicator = document.getElementById('typing-indicator');
                    if(indicator) indicator.remove();

                    addMessage(data && data.reply ? data.reply : 'Sorry, I could not find an answer right now.', 'bot');
                } catch (error) {
                    const indicator = document.getElementById('typing-indicator');
                    if(indicator) indicator.remove();
                    addMessage("Network error. Please try again later or reach out on WhatsApp.", 'bot');
                }
            }

            function handleSend() {
                const text = chatInput.value.trim();
                if(!text) return;
                addMessage(text, 'user');
                chatInput.value = '';
                
                // Hide quick prompts once a conversation starts
                if(quickPromptsDiv) {
                    quickPromptsDiv.style.opacity = '0';
                    setTimeout(() => quickPromptsDiv.style.display = 'none', 300);
                }

                botReply(text);
            }

            sendBtn.addEventListener('click', handleSend);
            chatInput.addEventListener('keypress', (e) => {
                if(e.key === 'Enter') handleSend();
            });

            quickBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const text = btn.innerText;
                    addMessage(text, 'user');
                    
                    if(quickPromptsDiv) {
                        quickPromptsDiv.style.opacity = '0';
                        setTimeout(() => quickPromptsDiv.classList.add('hidden'), 300);
                    }
                    
                    botReply(text);
                });
            });
        });

        // Carousel Functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const indicators = document.querySelectorAll('.carousel-indicator');
        const totalSlides = slides.length;

        function showSlide(n) {
            slides[currentSlide].classList.remove('active');
            indicators[currentSlide].classList.remove('bg-white');
            indicators[currentSlide].classList.add('bg-white/50');
            
            currentSlide = (n + totalSlides) % totalSlides;
            
            slides[currentSlide].classList.add('active');
            indicators[currentSlide].classList.remove('bg-white/50');
            indicators[currentSlide].classList.add('bg-white');
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        // Auto-play carousel
        let autoPlay = setInterval(nextSlide, 5000);

        // Carousel controls
        document.getElementById('nextSlide').addEventListener('click', () => {
            nextSlide();
            clearInterval(autoPlay);
            autoPlay = setInterval(nextSlide, 5000);
        });

        document.getElementById('prevSlide').addEventListener('click', () => {
            prevSlide();
            clearInterval(autoPlay);
            autoPlay = setInterval(nextSlide, 5000);
        });

        // Indicator controls
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                showSlide(index);
                clearInterval(autoPlay);
                autoPlay = setInterval(nextSlide, 5000);
            });
        });

        // Initialize first indicator
        indicators[0].classList.add('bg-white');

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Initialize Owl Carousels
        $(document).ready(function(){
            // Treks Carousel
            $('.treks-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    },
                    1280: {
                        items: 4
                    }
                }
            });

            // Expeditions Carousel
            $('.expeditions-carousel').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    640: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    },
                    1280: {
                        items: 4
                    }
                }
            });
        });

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        let counterStarted = false;

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 200; // Adjust speed
            let current = 0;

            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            updateCounter();
        };

        // Trigger counter animation when section is in view
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !counterStarted) {
                    counterStarted = true;
                    counters.forEach(counter => animateCounter(counter));
                }
            });
        }, observerOptions);

        // Observe the statistics section
        const statsSection = document.querySelector('.counter')?.closest('section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // FAQ Accordion
        const faqButtons = document.querySelectorAll('.faq-button');
        
        faqButtons.forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const icon = button.querySelector('.fa-chevron-down');
                const isOpen = !content.classList.contains('hidden');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-content').forEach(item => {
                    if (item !== content) {
                        item.classList.add('hidden');
                    }
                });
                
                document.querySelectorAll('.fa-chevron-down').forEach(item => {
                    if (item !== icon) {
                        item.classList.remove('rotate-180');
                    }
                });
                
                // Toggle current FAQ
                if (isOpen) {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                } else {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                }
            });
        });
    </script>
@endpush
