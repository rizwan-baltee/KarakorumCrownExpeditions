<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get all treks of this type
     */
    public function trendingTreks(): HasMany
    {
        return $this->hasMany(TrendingTrek::class);
    }

    /**
     * Get active treks of this type
     */
    public function activeTreks()
    {
        return $this->trendingTreks()->where('is_active', true);
    }
}
