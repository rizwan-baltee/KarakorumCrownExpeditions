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
        'starting_price',
        'min_age',
        'max_guests',
        'languages_support',
        'is_trending',
        'is_active',
        'priority',
        'distance',
        'best_season',
        'starting_point',
        'ending_point',
        'accommodation_type',
        'transport_type',
        'included',
        'excluded',
        'packing_list',
        'itinerary',
        'faqs',
    ];

    protected $casts = [
        'is_trending' => 'boolean',
        'is_active' => 'boolean',
        'height_meters' => 'decimal:2',
        'starting_price' => 'decimal:2',
        'included' => 'array',
        'excluded' => 'array',
        'packing_list' => 'array',
        'itinerary' => 'array',
        'faqs' => 'array',
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
     * Get calculated starting price in USD
     */
    public function getCalculatedStartingPriceAttribute(): ?float
    {
        if (!empty($this->starting_price) && (float)$this->starting_price > 0) {
            return (float)$this->starting_price;
        }

        $minPrice = $this->prices()->where('price_usd', '>', 0)->min('price_usd');
        if ($minPrice !== null && (float)$minPrice > 0) {
            return (float)$minPrice;
        }

        return null;
    }

    /**
     * Get formatted starting price string e.g. "$2,499"
     */
    public function getStartingPriceFormattedAttribute(): string
    {
        $price = $this->calculated_starting_price;
        if ($price !== null && $price > 0) {
            return '$' . number_format($price, 0);
        }
        return 'Custom Quote';
    }

    /**
     * Primary image URL fallback
     */
    public function getPrimaryImageUrlAttribute(): string
    {
        $featured = $this->galleries->where('is_featured', true)->first();
        if ($featured && !empty($featured->full_image_url)) {
            return $featured->full_image_url;
        }

        $first = $this->galleries->first();
        if ($first && !empty($first->full_image_url)) {
            return $first->full_image_url;
        }

        return asset('assets/Front-banner-k2.webp');
    }

    /**
     * Human readable difficulty label
     */
    public function getDifficultyLabelAttribute(): string
    {
        return match((int)$this->difficulty_level) {
            1 => 'Easy / Leisure',
            2 => 'Moderate',
            3 => 'Challenging',
            4 => 'Strenuous',
            5 => 'Technical / Extreme',
            default => 'Moderate',
        };
    }

    public function getDifficultyBadgeColorAttribute(): string
    {
        return match((int)$this->difficulty_level) {
            1 => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            2 => 'bg-blue-100 text-blue-800 border-blue-200',
            3 => 'bg-amber-100 text-amber-800 border-amber-200',
            4 => 'bg-orange-100 text-orange-800 border-orange-200',
            5 => 'bg-red-100 text-red-800 border-red-200',
            default => 'bg-slate-100 text-slate-800 border-slate-200',
        };
    }

    public function getCategoryNameAttribute(): string
    {
        return $this->type?->name ?? 'Experience';
    }

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