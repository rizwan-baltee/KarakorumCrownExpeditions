@extends('layouts.app')

@section('title', 'Book Your Tour - Karakorum Crown Expeditions')

@push('styles')
    .form-input:focus { border-color: #d4a853; box-shadow: 0 0 0 3px rgba(212, 168, 83, 0.15); }
    .form-input { transition: border-color 0.2s, box-shadow 0.2s; }
    .tab-active { background: #0f172a; color: #fff; }
    .tab-inactive { background: #f1f5f9; color: #64748b; }
    .tab-inactive:hover { background: #e2e8f0; }
@endpush

@section('content')
<section class="relative bg-navy-950 pt-32 pb-16">
    <div class="absolute inset-0 hero-glow"></div>
    <div class="relative container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/8 px-4 py-2 text-xs uppercase tracking-[0.25em] text-white/80 backdrop-blur-md mb-6">
                <span class="h-2 w-2 rounded-full bg-brand-400"></span>
                {{ $selectedTrek ? 'Book This Experience' : 'Start Your Journey' }}
            </div>
            <h1 class="font-display text-4xl md:text-5xl text-white leading-tight">
                {{ $selectedTrek ? 'Book ' . $selectedTrek->title : 'Ready to explore?' }}
            </h1>
            <p class="mt-4 text-white/60 text-lg max-w-xl mx-auto">
                Submit a booking request, ask for a custom tour, or track a previous request with your reference number.
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-6xl mx-auto grid gap-10 lg:grid-cols-3">

            <div class="lg:col-span-2">
                <div class="flex flex-col sm:flex-row gap-2 mb-8 bg-white p-1.5 rounded-xl border border-slate-200 shadow-sm">
                    <button type="button" onclick="switchTab('booking')" id="tab-booking" class="flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-active">
                        <i class="fas fa-calendar-check mr-2"></i> Book a Tour
                    </button>
                    <button type="button" onclick="switchTab('inquiry')" id="tab-inquiry" class="flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-inactive">
                        <i class="fas fa-comment-dots mr-2"></i> Request Custom Tour
                    </button>
                </div>

                <form action="{{ route('booking.store') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-lg p-8 md:p-10">
                    @csrf
                    <input type="hidden" name="type" id="form-type" value="{{ $selectedTrek ? 'booking' : 'inquiry' }}">
                    @if($selectedTrek)
                        <input type="hidden" name="trending_trek_id" value="{{ $selectedTrek->id }}">
                    @endif

                    @if($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">
                            <p class="text-red-700 text-sm font-semibold mb-1">Please fix the following:</p>
                            <ul class="text-red-600 text-sm list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="font-display text-xl text-slate-900 mb-1">About You</h3>
                        <p class="text-sm text-slate-400 mb-5">Tell us who's traveling. We usually reply within 24 hours.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Full Name *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none" placeholder="John Smith">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Phone / WhatsApp *</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none" placeholder="+1 234 567 890">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Country *</label>
                                <select name="country" required class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none text-slate-600">
                                    <option value="">Select your country</option>
                                    @php
                                        $countries = ['Afghanistan','Albania','Algeria','Argentina','Australia','Austria','Bangladesh','Belgium','Brazil','Canada','China','Colombia','Denmark','Egypt','Finland','France','Germany','Ghana','Greece','Hungary','India','Indonesia','Iran','Iraq','Ireland','Israel','Italy','Japan','Jordan','Kenya','Kuwait','Lebanon','Libya','Malaysia','Mexico','Morocco','Nepal','Netherlands','New Zealand','Nigeria','Norway','Oman','Pakistan','Palestine','Philippines','Poland','Portugal','Qatar','Romania','Russia','Saudi Arabia','Singapore','South Africa','South Korea','Spain','Sri Lanka','Sweden','Switzerland','Syria','Thailand','Tunisia','Turkey','UAE','United Kingdom','United States','Vietnam','Yemen'];
                                    @endphp
                                    @foreach($countries as $c)
                                        <option value="{{ $c }}" {{ old('country') === $c ? 'selected' : '' }}>{{ $c }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="font-display text-xl text-slate-900 mb-1">Trip Details</h3>
                        <p class="text-sm text-slate-400 mb-5">Choose a trek or ask for a custom itinerary.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            @if(!$selectedTrek)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Package / Trek *</label>
                                <select name="trending_trek_id" class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none text-slate-600">
                                    <option value="">-- Select a trek or leave blank for custom --</option>
                                    @php
                                        $grouped = $treks->groupBy(fn($t) => $t->type?->name ?? 'Other');
                                    @endphp
                                    @foreach($grouped as $typeName => $typeTreks)
                                        <optgroup label="{{ $typeName }}">
                                            @foreach($typeTreks as $t)
                                                <option value="{{ $t->id }}" {{ old('trending_trek_id') == $t->id ? 'selected' : '' }}>
                                                    {{ $t->title }} — {{ $t->duration_days }}d
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Preferred Travel Start Date</label>
                                <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Preferred Travel End Date</label>
                                <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Number of Travelers *</label>
                                <input type="number" name="guests" value="{{ old('guests', 2) }}" min="1" max="100" required class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1.5">Additional Notes</label>
                                <input type="text" name="notes" value="{{ old('notes') }}" class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none" placeholder="Anything else we should know?">
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="font-display text-xl text-slate-900 mb-1">Special Requirements</h3>
                        <p class="text-sm text-slate-400 mb-5">Help us understand your needs</p>
                        <textarea name="special_requirements" rows="4" class="form-input w-full px-4 py-3 border border-slate-300 rounded-xl text-sm outline-none resize-none" placeholder="Dietary needs, fitness level, accessibility, photography interests..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-navy-950 text-white font-semibold text-base hover:bg-slate-800 transition-all flex items-center justify-center gap-2 shadow-lg">
                        <i class="fas fa-paper-plane"></i>
                        <span id="submit-text">Send Booking Request</span>
                    </button>

                    <p class="text-center text-xs text-slate-400 mt-4">
                        <i class="fas fa-lock mr-1"></i> Your information is secure and will only be used to arrange your trip.
                    </p>
                </form>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white rounded-3xl border border-slate-200 shadow-lg p-6">
                    <h3 class="font-display text-lg text-slate-900 mb-4">Track a booking</h3>
                    <p class="text-sm text-slate-500 mb-4">Already submitted a booking? Use your reference number to check status anytime.</p>
                    <a href="{{ route('booking.track') }}" class="block text-center py-3 rounded-xl border-2 border-brand-500 text-brand-700 font-semibold hover:bg-brand-50 transition-colors">
                        Track Booking Status
                    </a>
                </div>

                @if($selectedTrek)
                <div class="bg-white rounded-3xl border border-slate-200 shadow-lg overflow-hidden">
                    @if($selectedTrek->galleries->where('is_featured', true)->first())
                        <img src="{{ $selectedTrek->galleries->where('is_featured', true)->first()->full_image_url }}" alt="{{ $selectedTrek->title }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="p-6">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-brand-600">{{ $selectedTrek->type->name ?? 'Experience' }}</span>
                        <h3 class="font-display text-lg text-slate-900 mt-1">{{ $selectedTrek->title }}</h3>
                        <div class="flex items-center gap-4 mt-3 text-xs text-slate-500">
                            <span><i class="fas fa-clock mr-1"></i>{{ $selectedTrek->duration_days }}d</span>
                            <span><i class="fas fa-signal mr-1"></i>Level {{ $selectedTrek->difficulty_level }}/5</span>
                            @if($selectedTrek->height_meters)
                                <span><i class="fas fa-mountain mr-1"></i>{{ number_format($selectedTrek->height_meters) }}m</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <div class="bg-white rounded-3xl border border-slate-200 shadow-lg p-6">
                    <h3 class="font-display text-lg text-slate-900 mb-4">What happens next?</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-paper-plane text-brand-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Submit your request</p>
                                <p class="text-xs text-slate-500 mt-0.5">Takes less than 2 minutes</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-brand-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Response within 24 hours</p>
                                <p class="text-xs text-slate-500 mt-0.5">Our experts review every request</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map text-brand-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Custom itinerary</p>
                                <p class="text-xs text-slate-500 mt-0.5">Tailored to your pace & interests</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-full bg-brand-50 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check-circle text-brand-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Confirm & pay</p>
                                <p class="text-xs text-slate-500 mt-0.5">Only when you're ready</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-navy-950 rounded-3xl p-6 text-white">
                    <h3 class="font-display text-lg mb-4">Why travelers trust us</h3>
                    <div class="space-y-3 text-sm text-white/70">
                        <div class="flex items-start gap-3"><i class="fas fa-shield-alt text-brand-400 mt-0.5"></i><span>Licensed Tour Operator #2332</span></div>
                        <div class="flex items-start gap-3"><i class="fas fa-certificate text-brand-400 mt-0.5"></i><span>PATO & NADRA certified</span></div>
                        <div class="flex items-start gap-3"><i class="fas fa-users text-brand-400 mt-0.5"></i><span>300+ successful trips</span></div>
                        <div class="flex items-start gap-3"><i class="fas fa-headset text-brand-400 mt-0.5"></i><span>24/7 emergency support</span></div>
                        <div class="flex items-start gap-3"><i class="fas fa-map-pin text-brand-400 mt-0.5"></i><span>Born & based in Skardu</span></div>
                    </div>
                </div>

                <a href="https://wa.me/923131562859?text=Hi!%20I'd%20like%20to%20inquire%20about%20booking%20a%20tour." target="_blank" class="block bg-[#25D366] text-white rounded-3xl p-6 text-center hover:bg-[#1fb855] transition-colors shadow-lg">
                    <i class="fab fa-whatsapp text-3xl mb-2"></i>
                    <p class="font-semibold">Prefer to chat?</p>
                    <p class="text-sm text-white/80 mt-1">Message us on WhatsApp for instant replies</p>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function switchTab(tab) {
    const formType = document.getElementById('form-type');
    const bookingTab = document.getElementById('tab-booking');
    const inquiryTab = document.getElementById('tab-inquiry');
    const submitText = document.getElementById('submit-text');

    if (tab === 'booking') {
        formType.value = 'booking';
        bookingTab.className = 'flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-active';
        inquiryTab.className = 'flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-inactive';
        submitText.textContent = 'Send Booking Request';
    } else {
        formType.value = 'inquiry';
        inquiryTab.className = 'flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-active';
        bookingTab.className = 'flex-1 py-3 px-4 rounded-lg text-sm font-semibold transition-all tab-inactive';
        submitText.textContent = 'Send Inquiry';
    }
}
</script>
@endpush
