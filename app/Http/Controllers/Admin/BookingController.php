<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\TrendingTrek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = BookTour::with(['trendingTrek.type', 'price']);

        // Filter by type (booking / inquiry)
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by trip
        if ($request->filled('trek_id')) {
            $query->where('trending_trek_id', $request->trek_id);
        }

        // Filter by date range (travel start date)
        if ($request->filled('date_from')) {
            $query->whereDate('start_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('start_date', '<=', $request->date_to);
        }

        // Search by reference, name, email, phone, country
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('reference_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        $stats = [
            'total'           => BookTour::count(),
            'pending'         => BookTour::whereIn('status', ['Pending', 'Under Review', 'New'])->count(),
            'confirmed'       => BookTour::where('status', 'Confirmed')->count(),
            'paid'            => BookTour::where('status', 'Paid')->count(),
            'cancelled'       => BookTour::where('status', 'Cancelled')->count(),
            'completed'       => BookTour::where('status', 'Completed')->count(),
            'total_travelers' => (int)BookTour::sum('guests'),
            'total_revenue'   => (float)BookTour::sum('total_amount'),
        ];

        $allTreks = TrendingTrek::orderBy('title')->get(['id', 'title']);

        return view('admin.bookings.index', compact('bookings', 'stats', 'allTreks'));
    }

    public function show(BookTour $booking)
    {
        $booking->load(['trendingTrek.type', 'price']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, BookTour $booking)
    {
        $validated = $request->validate([
            'status'         => 'required|in:' . implode(',', BookTour::STATUSES),
            'internal_notes' => 'nullable|string|max:5000',
            'total_amount'   => 'nullable|numeric|min:0',
        ]);

        $booking->update($validated);

        return redirect()->back()->with('success', 'Booking #' . $booking->reference_code . ' updated successfully!');
    }

    public function destroy(BookTour $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully');
    }

    public function export(Request $request)
    {
        $query = BookTour::with(['trendingTrek']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('trek_id')) {
            $query->where('trending_trek_id', $request->trek_id);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('start_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('start_date', '<=', $request->date_to);
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();

        $csv = "Ref Code,Type,Customer Name,Email,Phone,Country,Trip,Travel Date,Adults,Children,Total Travelers,Package Tier,Total USD,Status,Booked On\n";

        foreach ($bookings as $b) {
            $csv .= implode(',', [
                $b->reference_code,
                $b->type,
                '"' . str_replace('"', '""', $b->name) . '"',
                $b->email,
                $b->phone,
                '"' . ($b->country ?? '') . '"',
                '"' . ($b->trendingTrek?->title ?? 'Custom Tour') . '"',
                $b->start_date?->format('Y-m-d') ?? 'Flexible',
                $b->adults ?? 1,
                $b->children ?? 0,
                $b->guests ?? 1,
                $b->package_tier ?? 'Standard',
                number_format($b->total_amount ?? 0, 2, '.', ''),
                $b->status,
                $b->created_at->format('Y-m-d H:i'),
            ]) . "\n";
        }

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="kce-bookings-' . now()->format('Y-m-d') . '.csv"',
        ]);
    }
}
