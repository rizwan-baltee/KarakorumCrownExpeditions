<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class TrendingTrek extends Model
{
    protected $fillable = [
        'type_id',
        'title',
        'slug',
        'description',
        'overview',
        'location',
        'duration_days',
        'difficulty_level',
        'height_meters',
        'min_age',
        'max_guests',
        'languages_support',
        'is_trending',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'is_trending' => 'boolean',
        'is_active' => 'boolean',
        'height_meters' => 'decimal:2',
    ];

    // ========== RELATIONSHIPS ==========
    
    /**
     * Trek belongs to a Type
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    
    /**
     * Trek ki sari images/photos
     * One Trek -> Many Gallery Images
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class)->orderBy('sort_order');
    }

    /**
     * Trek ki sari pricing (different group sizes ke liye)
     * One Trek -> Many Prices
     */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class);
    }

    /**
     * Trek ki sari bookings
     * One Trek -> Many Book Tours
     */
    public function bookTours(): HasMany
    {
        return $this->hasMany(BookTour::class);
    }

    /**
     * Indirect: Trek -> Prices -> BookTours
     * Trek ki through prices ki bookings
     */
    public function allBookingsThroughPrices(): HasManyThrough
    {
        return $this->hasManyThrough(BookTour::class, Price::class);
    }

    // ========== HELPER METHODS ==========
    
    /**
     * Featured/main image get karna
     */
    public function getFeaturedImageAttribute()
    {
        return $this->galleries()->where('is_featured', true)->first();
    }

    /**
     * Sirf available prices
     */
    public function getAvailablePricesAttribute()
    {
        return $this->prices()->where('availability', 'Available')->get();
    }

    /**
     * Confirmed bookings count
     */
    public function getConfirmedBookingsCountAttribute()
    {
        return $this->bookTours()->where('status', 'Confirmed')->count();
    }

    /**
     * Pending bookings
     */
    public function pendingBookings()
    {
        return $this->bookTours()->where('status', 'Pending')->get();
    }
}