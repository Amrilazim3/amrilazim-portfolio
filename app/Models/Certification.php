<?php

namespace App\Models;

use App\Traits\ClearsCertificationCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory, ClearsCertificationCache;

    protected $fillable = [
        'title',
        'platform',
        'instructor',
        'date',
        'image_url',
        'description',
        'course_url',
        'duration',
        'status',
        'skills',
        'sort_order',
        'is_featured',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_featured' => 'boolean',
    ];

    // Scope for featured certifications
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for completed certifications
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Default ordering by sort_order and created_at
    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($builder) {
            $builder->orderBy('sort_order')->orderBy('created_at', 'desc');
        });
    }
}
