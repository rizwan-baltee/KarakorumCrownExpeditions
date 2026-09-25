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
        'adults',
        'children',
        'package_tier',
        'trip_type',
        'selected_addons',
        'comment',
        'special_requirements',
        'dietary_requirements',
        'emergency_contact',
        'notes',
        'internal_notes',
        'status',
        'type',
        'total_amount',
        'currency',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'total_amount' => 'decimal:2',
        'selected_addons' => 'array',
        'adults' => 'integer',
        'children' => 'integer',
        'guests' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (BookTour $booking) {
            if (empty($booking->reference_code)) {
                $booking->reference_code = static::generateUniqueReferenceCode();
            }
        });
    }

    // Individual Status Constants
    const STATUS_PENDING = 'Pending';
    const STATUS_UNDER_REVIEW = 'Under Review';
    const STATUS_CONFIRMED = 'Confirmed';
    const STATUS_PAYMENT_PENDING = 'Payment Pending';
    const STATUS_PAID = 'Paid';
    const STATUS_CANCELLED = 'Cancelled';
    const STATUS_COMPLETED = 'Completed';

    // All valid travel booking statuses
    const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_UNDER_REVIEW,
        self::STATUS_CONFIRMED,
        self::STATUS_PAYMENT_PENDING,
        self::STATUS_PAID,
        self::STATUS_CANCELLED,
        self::STATUS_COMPLETED,
    ];

    // ========== RELATIONSHIPS ==========

    public function trendingTrek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class);
    }

    public function trek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class, 'trending_trek_id');
    }

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    public function getReferenceAttribute()
    {
        return $this->reference_code;
    }

    public function getTravelersCountAttribute()
    {
        return $this->guests ?: (($this->adults ?? 0) + ($this->children ?? 0));
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
        $curr = $this->currency ?: 'USD';
        return $curr . ' ' . number_format($this->total_amount ?? 0, 2);
    }

    public function getTotalPriceAttribute()
    {
        return $this->total_amount;
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
            'Pending' => 'bg-amber-100 text-amber-800 border border-amber-200',
            'Under Review' => 'bg-blue-100 text-blue-800 border border-blue-200',
            'Confirmed' => 'bg-emerald-100 text-emerald-800 border border-emerald-200',
            'Payment Pending' => 'bg-orange-100 text-orange-800 border border-orange-200',
            'Paid' => 'bg-green-100 text-green-800 border border-green-200',
            'Cancelled' => 'bg-red-100 text-red-800 border border-red-200',
            'Completed' => 'bg-purple-100 text-purple-800 border border-purple-200',
            default => 'bg-gray-100 text-gray-800 border border-gray-200',
        };
    }

    public static function generateUniqueReferenceCode(): string
    {
        do {
            $reference = 'KCE-' . now()->format('Y') . '-' . Str::upper(Str::random(6));
        } while (static::where('reference_code', $reference)->exists());

        return $reference;
    }
}