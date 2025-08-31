<?php

namespace App\Services;

use App\Models\SocialLink;
use Illuminate\Support\Facades\Cache;

class SocialLinkService
{
    const CACHE_TTL = 3600; // 1 hour
    const CACHE_KEY_ALL = 'social_links:all';
    const CACHE_KEY_ACTIVE = 'social_links:active';

    /**
     * Get all social links
     */
    public static function getAll()
    {
        return Cache::remember(self::CACHE_KEY_ALL, self::CACHE_TTL, function () {
            return SocialLink::ordered()->get();
        });
    }

    /**
     * Get active social links ordered
     */
    public static function getActive()
    {
        return Cache::remember(self::CACHE_KEY_ACTIVE, self::CACHE_TTL, function () {
            return SocialLink::active()->ordered()->get();
        });
    }

    /**
     * Clear all social link caches
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY_ALL);
        Cache::forget(self::CACHE_KEY_ACTIVE);
    }
}