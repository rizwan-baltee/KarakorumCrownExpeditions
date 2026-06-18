<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Price extends Model
{
    protected $fillable = [
        'trending_trek_id',
        'group_type',
        'min_persons',
        'max_persons',
        'price_usd',
        'currency',
        'start_date',
        'end_date',
        'availability',
        'notes',
    ];

    protected $casts = [
        'price_usd' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // ========== RELATIONSHIPS ==========
    
    /**
     * Price kis trek ki hai
     * Many Prices -> One Trek
     */
    public function trendingTrek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class);
    }

    // Alternative name
    public function trek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class, 'trending_trek_id');
    }

    /**
     * Is price se kitni bookings hui hain
     * One Price -> Many Book Tours
     */
    public function bookTours(): HasMany
    {
        return $this->hasMany(BookTour::class);
    }

    // Alternative name
    public function bookings(): HasMany
    {
        return $this->hasMany(BookTour::class);
    }

    // ========== HELPER METHODS ==========
    
    /**
     * Formatted price with currency
     */
    public function getFormattedPriceAttribute()
    {
        return $this->currency . ' ' . number_format($this->price_usd, 2);
    }

    /**
     * Check if price is available
     */
    public function isAvailable(): bool
    {
        return $this->availability === 'Available';
    }

    /**
     * Confirmed bookings for this price
     */
    public function confirmedBookings()
    {
        return $this->bookTours()->where('status', 'Confirmed')->get();
    }

    /**
     * Total confirmed bookings count
     */
    public function getConfirmedBookingsCountAttribute()
    {
        return $this->bookTours()->where('status', 'Confirmed')->count();
    }
}