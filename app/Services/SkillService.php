<?php

namespace App\Services;

use App\Models\Skill;
use Illuminate\Support\Facades\Cache;

class SkillService
{
    const CACHE_TTL = 3600; // 1 hour
    const CACHE_KEY = 'skills:all';

    /**
     * Get all skills with caching
     */
    public static function getAll()
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return Skill::all();
        });
    }

    /**
     * Clear skills cache
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}