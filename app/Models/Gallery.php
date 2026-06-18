<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    protected $fillable = [
        'trending_trek_id',
        'image_path',
        'image_url',
        'title',
        'description',
        'sort_order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    // ========== RELATIONSHIPS ==========
    
    /**
     * Image kis trek ki hai
     * Many Gallery Images -> One Trek
     */
    public function trendingTrek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class);
    }

    // Alternatively you can use 'trek()' name also
    public function trek(): BelongsTo
    {
        return $this->belongsTo(TrendingTrek::class, 'trending_trek_id');
    }

    // ========== HELPER METHODS ==========
    
    /**
     * Full image URL return kare
     */
    public function getFullImageUrlAttribute()
    {
        return $this->image_url ?? asset('storage/' . $this->image_path);
    }

    /**
     * Check if this is featured image
     */
    public function isFeatured(): bool
    {
        return $this->is_featured === true;
    }
}