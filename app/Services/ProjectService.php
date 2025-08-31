<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class ProjectService
{
    const CACHE_TTL = 3600; // 1 hour
    const CACHE_KEY_ALL = 'projects:all';
    const CACHE_KEY_FEATURED = 'projects:featured';

    /**
     * Get all projects with skill relationship
     */
    public static function getAll()
    {
        return Cache::remember(self::CACHE_KEY_ALL, self::CACHE_TTL, function () {
            return Project::with('skill')->get();
        });
    }

    /**
     * Get featured projects
     */
    public static function getFeatured()
    {
        return Cache::remember(self::CACHE_KEY_FEATURED, self::CACHE_TTL, function () {
            return Project::featured()->with('skill')->get();
        });
    }

    /**
     * Clear all project caches
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_ALL);
        Cache::forget(self::CACHE_KEY_FEATURED);
    }
}