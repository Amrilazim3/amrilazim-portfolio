<?php

namespace App\Services;

use App\Models\Certification;
use Illuminate\Support\Facades\Cache;

class CertificationService
{
    const CACHE_TTL = 3600; // 1 hour
    const CACHE_KEY_ALL = 'certifications:all';
    const CACHE_KEY_FEATURED = 'certifications:featured';
    const CACHE_KEY_COMPLETED = 'certifications:completed';

    /**
     * Get all certifications
     */
    public static function getAll()
    {
        return Cache::remember(self::CACHE_KEY_ALL, self::CACHE_TTL, function () {
            return Certification::all();
        });
    }

    /**
     * Get featured certifications
     */
    public static function getFeatured()
    {
        return Cache::remember(self::CACHE_KEY_FEATURED, self::CACHE_TTL, function () {
            return Certification::featured()->get();
        });
    }

    /**
     * Get completed certifications
     */
    public static function getCompleted()
    {
        return Cache::remember(self::CACHE_KEY_COMPLETED, self::CACHE_TTL, function () {
            return Certification::completed()->get();
        });
    }

    /**
     * Clear all certification caches
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_ALL);
        Cache::forget(self::CACHE_KEY_FEATURED);
        Cache::forget(self::CACHE_KEY_COMPLETED);
    }
}