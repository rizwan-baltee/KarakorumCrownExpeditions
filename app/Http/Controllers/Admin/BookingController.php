<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = BookTour::with(['trendingTrek', 'price']);

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by name, email, or phone
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        $stats = [
            'total'      => BookTour::count(),
            'bookings'   => BookTour::where('type', 'booking')->count(),
            'inquiries'  => BookTour::where('type', 'inquiry')->count(),
            'new'        => BookTour::where('status', 'New')->count(),
            'contacted'  => BookTour::where('status', 'Contacted')->count(),
            'confirmed'  => BookTour::where('status', 'Confirmed')->count(),
            'pending'    => BookTour::where('status', 'Pending Payment')->count(),
            'completed'  => BookTour::where('status', 'Completed')->count(),
            'cancelled'  => BookTour::where('status', 'Cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'stats'));
    }

    public function show(BookTour $booking)
    {
        $booking->load(['trendingTrek.type', 'price']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, BookTour $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', BookTour::STATUSES),
        ]);

        $booking->update($validated);

        return redirect()->back()->with('success', 'Status updated to "' . $validated['status'] . '"');
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

        $bookings = $query->orderBy('created_at', 'desc')->get();

        $csv = "ID,Type,Name,Email,Phone,Country,Trek,Start Date,End Date,Guests,Status,Created At\n";

        foreach ($bookings as $b) {
            $csv .= implode(',', [
                $b->id,
                $b->type,
                '"' . str_replace('"', '""', $b->name) . '"',
                $b->email,
                $b->phone,
                '"' . ($b->country ?? '') . '"',
                '"' . ($b->trendingTrek?->title ?? 'Custom Tour') . '"',
                $b->start_date?->format('Y-m-d') ?? '',
                $b->end_date?->format('Y-m-d') ?? '',
                $b->guests,
                $b->status,
                $b->created_at->format('Y-m-d H:i:s'),
            ]) . "\n";
        }

        return Response::make($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="bookings-' . now()->format('Y-m-d') . '.csv"',
        ]);
    }
}
