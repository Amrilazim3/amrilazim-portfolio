<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'skill_id', 
        'name', 
        'image', 
        'project_url',
        'type',
        'detailed_description',
        'technologies',
        'features',
        'challenge',
        'solution',
        'duration',
        'outcome',
        'github_url',
        'is_featured',
        'sort_order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'features' => 'array',
        'is_featured' => 'boolean',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    // Scope for featured projects
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope by project type
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Default ordering by sort_order and created_at
    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($builder) {
            $builder->orderBy('sort_order')->orderBy('created_at', 'desc');
        });
    }
}
