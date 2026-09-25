<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Models\TrendingTrek;
use App\Models\Type;
use App\Mail\BookingReceived;
use App\Mail\BookingConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Show multi-step booking form (optionally pre-filled with a trek)
     */
    public function create(Request $request)
    {
        $treks = TrendingTrek::where('is_active', true)
            ->with(['type', 'galleries' => fn($q) => $q->orderBy('sort_order'), 'prices'])
            ->orderBy('priority', 'desc')
            ->orderBy('title')
            ->get();

        $selectedTrek = null;
        if ($request->filled('trek')) {
            $selectedTrek = TrendingTrek::where('slug', $request->trek)
                ->orWhere('id', $request->trek)
                ->with(['type', 'galleries', 'prices'])
                ->first();
        }

        // Lightweight JSON representation for real-time frontend switching & dynamic pricing
        $treksData = $treks->map(function ($t) {
            $basePrice = $t->calculated_starting_price ?: 2499;
            return [
                'id' => $t->id,
                'title' => $t->title,
                'slug' => $t->slug,
                'duration_days' => $t->duration_days,
                'difficulty_label' => $t->difficulty_label,
                'difficulty_level' => $t->difficulty_level,
                'location' => $t->location,
                'category' => $t->type?->name ?? 'Experience',
                'base_price' => (float)$basePrice,
                'image_url' => $t->primary_image_url,
                'starting_point' => $t->starting_point ?: 'Islamabad',
                'ending_point' => $t->ending_point ?: 'Skardu',
                'best_season' => $t->best_season ?: 'June to September',
                'departures' => $t->prices->whereNotNull('start_date')->map(function ($p) {
                    return [
                        'id' => $p->id,
                        'start_date' => $p->start_date ? $p->start_date->format('Y-m-d') : null,
                        'end_date' => $p->end_date ? $p->end_date->format('Y-m-d') : null,
                        'formatted_dates' => $p->start_date ? $p->start_date->format('d M Y') . ($p->end_date ? ' → ' . $p->end_date->format('d M Y') : '') : 'TBD',
                        'price' => (float)$p->price_usd,
                        'group_type' => $p->group_type,
                        'availability' => $p->availability,
                    ];
                })->values(),
            ];
        });

        $preselectedTier = strtolower($request->query('tier', 'standard'));
        if (!in_array($preselectedTier, ['standard', 'premium', 'private'])) {
            $preselectedTier = 'standard';
        }

        $preselectedDate = $request->query('start_date', '');
        $preselectedPriceId = $request->query('price_id', '');

        return view('booking.create', compact(
            'treks',
            'selectedTrek',
            'treksData',
            'preselectedTier',
            'preselectedDate',
            'preselectedPriceId'
        ));
    }

    /**
     * Public booking tracker form.
     */
    public function track()
    {
        return view('booking.track');
    }

    /**
     * Lookup booking by reference code and email.
     */
    public function lookup(Request $request)
    {
        $validated = $request->validate([
            'reference_code' => 'required|string|max:40',
            'email' => 'required|email|max:255',
        ]);

        $booking = BookTour::with(['trendingTrek.type', 'price'])
            ->where('reference_code', strtoupper(trim($validated['reference_code'])))
            ->where('email', $validated['email'])
            ->first();

        if (!$booking) {
            return back()->withInput()->with('error', 'No booking found matching that reference code and email address.');
        }

        return view('booking.track-result', compact('booking'));
    }

    /**
     * Store booking / inquiry submission
     */
    public function store(Request $request)
    {
        // Normalize aliases
        if (!$request->filled('type')) {
            $request->merge(['type' => 'booking']);
        }
        if ($request->filled('trek_id') && !$request->filled('trending_trek_id')) {
            $request->merge(['trending_trek_id' => $request->input('trek_id')]);
        }
        if ($request->filled('travel_date') && !$request->filled('start_date')) {
            $request->merge(['start_date' => $request->input('travel_date')]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:100',
            'trending_trek_id' => 'nullable|exists:trending_treks,id',
            'price_id' => 'nullable|exists:prices,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'adults' => 'nullable|integer|min:1|max:100',
            'children' => 'nullable|integer|min:0|max:100',
            'guests' => 'nullable|integer|min:1|max:100',
            'package_tier' => 'nullable|string|max:50',
            'trip_type' => 'nullable|string|in:Group,Private',
            'selected_addons' => 'nullable|array',
            'dietary_requirements' => 'nullable|string|max:1000',
            'emergency_contact' => 'nullable|string|max:255',
            'special_requirements' => 'nullable|string|max:2000',
            'notes' => 'nullable|string|max:2000',
            'total_amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:3',
            'type' => 'required|in:booking,inquiry',
        ]);

        $adults = (int)($validated['adults'] ?? 1);
        $children = (int)($validated['children'] ?? 0);
        $totalGuests = max(1, $adults + $children);

        $validated['adults'] = $adults;
        $validated['children'] = $children;
        $validated['guests'] = $totalGuests;
        $validated['status'] = BookTour::STATUS_PENDING;
        $validated['currency'] = $validated['currency'] ?? 'USD';
        $validated['package_tier'] = $validated['package_tier'] ?? 'Standard';
        $validated['trip_type'] = $validated['trip_type'] ?? ($validated['package_tier'] === 'Private' ? 'Private' : 'Group');

        // Backend pricing fallback calculation if total_amount was empty or 0
        if ((empty($validated['total_amount']) || (float)$validated['total_amount'] <= 0) && !empty($validated['trending_trek_id'])) {
            $trek = TrendingTrek::find($validated['trending_trek_id']);
            if ($trek) {
                $base = $trek->calculated_starting_price;
                $tier = strtolower($validated['package_tier']);
                $multiplier = match($tier) {
                    'premium' => 1.35,
                    'private' => 1.65,
                    default => 1.0,
                };
                $adultRate = $base * $multiplier;
                $childRate = $adultRate * 0.75;
                $addonsTotal = 0;
                if (!empty($validated['selected_addons']) && is_array($validated['selected_addons'])) {
                    foreach ($validated['selected_addons'] as $addon) {
                        if (preg_match('/\$(\d+)/', (string)$addon, $m)) {
                            $addonsTotal += (float)$m[1];
                        }
                    }
                }
                $validated['total_amount'] = ($adultRate * $adults) + ($childRate * $children) + $addonsTotal;
            }
        }

        if ($validated['type'] === 'inquiry') {
            $validated['status'] = BookTour::STATUS_PENDING;
        }

        $booking = BookTour::create($validated);

        // Send notification emails
        try {
            $adminEmail = config('mail.admin_email', env('MAIL_ADMIN_ADDRESS', 'karakorumcrownexpeditions@gmail.com'));

            if (class_exists(BookingReceived::class)) {
                Mail::to($adminEmail)->send(new BookingReceived($booking));
            }

            if (class_exists(BookingConfirmed::class)) {
                Mail::to($booking->email)->send(new BookingConfirmed($booking));
            }
        } catch (\Exception $e) {
            Log::error('Booking email notification failed: ' . $e->getMessage());
        }

        return redirect()->route('booking.thankyou', $booking->id)
            ->with('booking_id', $booking->id);
    }

    /**
     * Booking confirmation page
     */
    public function thankyou($id)
    {
        $booking = BookTour::with(['trendingTrek.type', 'price'])->findOrFail($id);
        return view('booking.thankyou', compact('booking'));
    }

    /**
     * Downloadable / Printable booking summary voucher
     */
    public function download($id)
    {
        $booking = BookTour::with(['trendingTrek.type', 'price'])->findOrFail($id);
        return view('booking.download', compact('booking'));
    }
}
