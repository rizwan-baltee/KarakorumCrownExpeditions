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
     * Show booking form (optionally pre-filled with a trek)
     */
    public function create(Request $request)
    {
        $treks = TrendingTrek::where('is_active', true)
            ->with('type')
            ->orderBy('title')
            ->get();

        $selectedTrek = null;
        if ($request->filled('trek')) {
            $selectedTrek = TrendingTrek::where('slug', $request->trek)
                ->orWhere('id', $request->trek)
                ->first();
        }

        return view('booking.create', compact('treks', 'selectedTrek'));
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

        $booking = BookTour::with(['trendingTrek', 'price'])
            ->where('reference_code', strtoupper(trim($validated['reference_code'])))
            ->where('email', $validated['email'])
            ->first();

        if (!$booking) {
            return back()->withInput()->with('error', 'No booking found for that reference number and email.');
        }

        return view('booking.track-result', compact('booking'));
    }

    /**
     * Store booking / inquiry submission
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'country' => 'required|string|max:100',
            'trending_trek_id' => 'nullable|exists:trending_treks,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'guests' => 'required|integer|min:1|max:100',
            'special_requirements' => 'nullable|string|max:2000',
            'notes' => 'nullable|string|max:2000',
            'type' => 'required|in:booking,inquiry',
        ]);

        $validated['status'] = 'New';
        $validated['type'] = $validated['type'] === 'inquiry' ? 'inquiry' : 'booking';
        $validated['guests'] = $validated['guests'] ?? 1;

        if ($validated['type'] === 'inquiry') {
            $validated['status'] = 'New';
            $validated['start_date'] = null;
            $validated['end_date'] = null;
        }

        $booking = BookTour::create($validated);

        // Send emails
        try {
            $adminEmail = config('mail.admin_email', env('MAIL_ADMIN_ADDRESS', 'info@discoverghanche.com'));

            Mail::to($adminEmail)->send(new BookingReceived($booking));

            // Customer confirmation email
            Mail::to($booking->email)->send(new BookingConfirmed($booking));
        } catch (\Exception $e) {
            // Don't break the user flow if email fails
            Log::error('Booking email failed: ' . $e->getMessage());
        }

        return redirect()->route('booking.thankyou', $booking->id)
            ->with('booking_id', $booking->id);
    }

    /**
     * Thank you page
     */
    public function thankyou($id)
    {
        $booking = BookTour::with('trendingTrek')->findOrFail($id);
        return view('booking.thankyou', compact('booking'));
    }

    /**
     * Download / Print booking confirmation
     */
    public function download($id)
    {
        $booking = BookTour::with('trendingTrek')->findOrFail($id);
        return view('booking.download', compact('booking'));
    }
}
