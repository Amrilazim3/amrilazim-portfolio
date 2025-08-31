<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon_type',
        'icon_content',
        'order_index',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order_index' => 'integer',
    ];

    /**
     * Scope to get only active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order services by their order index
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index');
    }

    /**
     * Get the icon content formatted for display
     */
    public function getFormattedIconAttribute()
    {
        if ($this->icon_type === 'svg') {
            return $this->icon_content;
        }

        return $this->icon_content; // For CSS classes
    }

    /**
     * Check if the service has an icon
     */
    public function hasIcon(): bool
    {
        return !empty($this->icon_content);
    }
}
