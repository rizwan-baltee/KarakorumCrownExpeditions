<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - {{ $booking->reference_code }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Playfair Display', 'serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: { 50:'#f0f7ff', 100:'#e0effe', 200:'#bae0fd', 300:'#7cc8fb', 400:'#36adf6', 500:'#0c93e7', 600:'#0074c5', 700:'#015ca0', 800:'#064f84', 900:'#0b426e', 950:'#072a49' },
                        navy: { 50:'#f0f3f9', 100:'#e4e9f2', 200:'#c9d5e6', 300:'#a3b8d3', 400:'#7694ba', 500:'#5677a1', 600:'#435e86', 700:'#374d6d', 800:'#2f425b', 900:'#1e2d42', 950:'#131c2c' },
                    }
                }
            }
        }
    </script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
            .print-card { box-shadow: none !important; border: 1px solid #e5e7eb !important; }
        }
    </style>
</head>
<body class="bg-gray-100 font-body min-h-screen">
    <div class="min-h-screen flex flex-col">
        {{-- Top Bar (no-print) --}}
        <div class="no-print bg-white border-b border-gray-200 py-4">
            <div class="max-w-2xl mx-auto px-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/karakorum-logo.png') }}" alt="Karakorum Crown Expeditions" class="h-10 w-10 rounded-lg object-cover">
                    <span class="font-display font-semibold text-navy-900">Karakorum Crown Expeditions</span>
                </div>
                <button onclick="window.print()" class="bg-brand-600 hover:bg-brand-700 text-white px-5 py-2.5 rounded-lg font-semibold text-sm transition-colors inline-flex items-center gap-2">
                    <i class="fas fa-download"></i> Download / Print
                </button>
            </div>
        </div>

        {{-- Main Confirmation Card --}}
        <div class="flex-1 flex items-start justify-center py-8 px-4">
            <div class="print-card bg-white rounded-2xl shadow-xl max-w-2xl w-full overflow-hidden">
                {{-- Header --}}
                <div class="bg-navy-900 text-white px-8 py-10 text-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-brand-400 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-brand-300 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-green-400/30">
                            <i class="fas fa-check-circle text-3xl text-green-400"></i>
                        </div>
                        <h1 class="font-display text-2xl md:text-3xl font-semibold mb-2">Booking Confirmation</h1>
                        <p class="text-white/60 text-sm">{{ $booking->isInquiry() ? 'Inquiry Received Successfully' : 'Your booking request has been submitted' }}</p>
                    </div>
                </div>

                {{-- Reference Code Banner --}}
                <div class="bg-gradient-to-r from-brand-500 to-brand-600 px-8 py-5 text-center">
                    <p class="text-white/80 text-xs uppercase tracking-widest font-medium mb-1">Your Booking Reference</p>
                    <p class="text-white text-3xl md:text-4xl font-bold font-mono tracking-wider">{{ $booking->reference_code }}</p>
                    <p class="text-white/70 text-xs mt-1.5">Please save this reference number for all future communications</p>
                </div>

                {{-- Booking Details --}}
                <div class="px-8 py-8">
                    {{-- Customer Info --}}
                    <div class="mb-6">
                        <h3 class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-4 flex items-center gap-2">
                            <i class="fas fa-user"></i> Guest Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Full Name</p>
                                <p class="text-gray-900 font-semibold">{{ $booking->name }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Email</p>
                                <p class="text-gray-900 font-semibold text-sm">{{ $booking->email }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Phone</p>
                                <p class="text-gray-900 font-semibold">{{ $booking->phone }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Country</p>
                                <p class="text-gray-900 font-semibold">{{ $booking->country ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100 my-6">

                    {{-- Trek Details --}}
                    <div class="mb-6">
                        <h3 class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-4 flex items-center gap-2">
                            <i class="fas fa-mountain"></i> {{ $booking->isInquiry() ? 'Inquiry Details' : 'Booking Details' }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($booking->trendingTrek)
                            <div class="bg-brand-50 rounded-xl p-4 border border-brand-100">
                                <p class="text-brand-600 text-xs mb-1">Package</p>
                                <p class="text-navy-900 font-bold text-lg">{{ $booking->trendingTrek->title }}</p>
                            </div>
                            @endif
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Number of Travelers</p>
                                <p class="text-gray-900 font-semibold text-lg">{{ $booking->guests }}</p>
                            </div>
                            @if($booking->start_date)
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Start Date</p>
                                <p class="text-gray-900 font-semibold">{{ $booking->start_date->format('d M Y') }}</p>
                            </div>
                            @endif
                            @if($booking->end_date)
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">End Date</p>
                                <p class="text-gray-900 font-semibold">{{ $booking->end_date->format('d M Y') }}</p>
                            </div>
                            @endif
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Request Type</p>
                                <p class="text-gray-900 font-semibold">{{ ucfirst($booking->type) }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-400 text-xs mb-1">Status</p>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                    <i class="fas fa-circle text-[6px] mr-1.5"></i> Received
                                </span>
                            </div>
                        </div>
                    </div>

                    @if($booking->special_requirements)
                    <hr class="border-gray-100 my-6">
                    <div class="mb-6">
                        <h3 class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-3 flex items-center gap-2">
                            <i class="fas fa-clipboard-list"></i> Special Requirements
                        </h3>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-gray-700 text-sm leading-relaxed">{{ $booking->special_requirements }}</p>
                        </div>
                    </div>
                    @endif

                    @if($booking->notes)
                    <div class="mb-6">
                        <h3 class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-3 flex items-center gap-2">
                            <i class="fas fa-sticky-note"></i> Additional Notes
                        </h3>
                        <div class="bg-gray-50 rounded-xl p-4">
                            <p class="text-gray-700 text-sm leading-relaxed">{{ $booking->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <hr class="border-gray-100 my-6">

                    {{-- What Happens Next --}}
                    <div class="mb-6">
                        <h3 class="text-xs uppercase tracking-widest text-gray-400 font-semibold mb-4 flex items-center gap-2">
                            <i class="fas fa-info-circle"></i> What Happens Next?
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 bg-brand-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-brand-700 font-bold text-xs">1</span>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-medium text-sm">Confirmation</p>
                                    <p class="text-gray-500 text-xs">Our team will review your request within 24 hours</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 bg-brand-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-brand-700 font-bold text-xs">2</span>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-medium text-sm">Personal Consultation</p>
                                    <p class="text-gray-500 text-xs">We'll contact you to finalize your itinerary and pricing</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-7 h-7 bg-brand-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <span class="text-brand-700 font-bold text-xs">3</span>
                                </div>
                                <div>
                                    <p class="text-gray-900 font-medium text-sm">Your Adventure</p>
                                    <p class="text-gray-500 text-xs">Experience the breathtaking beauty of Gilgit-Baltistan!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="bg-gray-50 border-t border-gray-100 px-8 py-6 text-center">
                    <div class="flex items-center justify-center gap-2 mb-3">
                        <img src="{{ asset('assets/karakorum-logo.png') }}" alt="Karakorum Crown Expeditions" class="h-8 w-8 rounded-md object-cover">
                        <span class="font-display font-semibold text-navy-900 text-sm">Karakorum Crown Expeditions</span>
                    </div>
                    <p class="text-gray-400 text-xs mb-1">Premium trekking experiences in Gilgit-Baltistan, Pakistan</p>
                    <p class="text-gray-400 text-xs">
                        <i class="fas fa-envelope mr-1"></i> info@discoverghanche.com
                        <span class="mx-2">•</span>
                        <i class="fas fa-phone mr-1"></i> +92 313 1562859
                    </p>
                    <p class="text-gray-300 text-[10px] mt-3">Booking Reference: {{ $booking->reference_code }} • Generated on {{ now()->format('d M Y \a\t h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>
