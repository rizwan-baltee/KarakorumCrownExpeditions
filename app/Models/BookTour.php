<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BookTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_code',
        'trending_trek_id',
        'price_id',
        'name',
        'email',
        'phone',
        'country',
        'start_date',
        'end_date',
        'guests',
        'comment',
        'special_requirements',
        'notes',
        'status',
        'type',
        'total_amount',
        'currency',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    protected static function booted(): void
    {
        static::creating(function (BookTour $booking) {
            if (empty($booking->reference_code)) {
                $booking->reference_code = static::generateUniqueReferenceCode();
            }
        });
    }

    // All valid statuses
    const STATUSES = [
        'New',
        'Contacted',
        'Confirmed',
        'Pending Payment',
        'Completed',
        'Cancelled',
    ];

    // ========== RELATIONSHIPS ==========

    public function trendingTrek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class);
    }

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    // ========== SCOPES ==========

    public function scopeBookings($query)
    {
        return $query->where('type', 'booking');
    }

    public function scopeInquiries($query)
    {
        return $query->where('type', 'inquiry');
    }

    // ========== HELPERS ==========

    public function getFormattedTotalAttribute()
    {
        return $this->currency . ' ' . number_format($this->total_amount, 2);
    }

    public function isBooking(): bool
    {
        return $this->type === 'booking';
    }

    public function isInquiry(): bool
    {
        return $this->type === 'inquiry';
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'New' => 'bg-blue-100 text-blue-800',
            'Contacted' => 'bg-indigo-100 text-indigo-800',
            'Confirmed' => 'bg-green-100 text-green-800',
            'Pending Payment' => 'bg-amber-100 text-amber-800',
            'Completed' => 'bg-emerald-100 text-emerald-800',
            'Cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public static function generateUniqueReferenceCode(): string
    {
        do {
            $reference = 'DGH-' . now()->format('Y') . '-' . Str::upper(Str::random(6));
        } while (static::where('reference_code', $reference)->exists());

        return $reference;
    }
}