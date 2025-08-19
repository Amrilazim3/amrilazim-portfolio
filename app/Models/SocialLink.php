<?php

namespace App\Models;

use App\Traits\ClearsSocialLinkCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory, ClearsSocialLinkCache;

    protected $fillable = [
        'platform',
        'url',
        'icon_svg',
        'order_index',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order_index' => 'integer',
    ];

    /**
     * Scope to get only active social links
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order social links by their order index
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index');
    }

    /**
     * Get the platform name formatted for display
     */
    public function getFormattedPlatformAttribute(): string
    {
        return ucfirst(strtolower($this->platform));
    }

    /**
     * Check if the social link has an icon
     */
    public function hasIcon(): bool
    {
        return !empty($this->icon_svg);
    }

    /**
     * Get the icon SVG content
     */
    public function getIconSvgAttribute($value)
    {
        return $value;
    }

    /**
     * Validate URL format
     */
    public function isValidUrl(): bool
    {
        return filter_var($this->url, FILTER_VALIDATE_URL) !== false;
    }
}
